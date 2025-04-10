<?php

declare(strict_types=1);

namespace Drupal\ssch\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextareaWidget;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'ssch_widget' widget.
 *
 * @FieldWidget(
 *   id = "ssch_widget",
 *   label = @Translation("Text area with programming language selection"),
 *   field_types = {
 *     "ssch",
 *   }
 * )
 */
class ServerSidedCodeHighlightingWidget extends StringTextareaWidget {

  /**
   * Constructs a ServerSidedCodeHighlightingWidget object.
   *
   * @param string $plugin_id
   *   The plugin_id for the widget.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the widget is associated.
   * @param array $settings
   *   The widget settings.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param \Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface $highlighter
   *   Service for handling server sided code highlighting.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    array $third_party_settings,
    protected ServerSidedCodeHighlightingServiceInterface $highlighter,
  ) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $third_party_settings);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): static {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['third_party_settings'],
      $container->get('ssch.server_sided_code_highlighting'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings(): array {
    return [
      'languages' => [],
      'default_language' => '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state): array {
    $form = parent::settingsForm($form, $form_state);

    // Get the available programming languages from the highlighting service and
    // present them in alphabetical order.
    $languages = $this->highlighter->getAvailableLanguages();
    asort($languages, SORT_NATURAL | SORT_FLAG_CASE);

    // Allow the user to limit the programming languages that are presented to
    // the user.
    $form['languages'] = [
      '#type' => 'select',
      '#title' => $this->t('Available programming languages'),
      '#description' => $this->t('Select the programming languages that that should be available to the content editor. If nothing is selected, all available programming languages will be available.'),
      '#options' => $languages,
      '#default_value' => $this->getSetting('languages'),
      '#multiple' => TRUE,
    ];

    // Allow the user to select the default programming language that should be
    // selection in the option list.
    // Note: that this shouldn't be stored as the default value, since it means
    // a database entry is necessary when only the programming language option
    // is selected for the field (i.e., the isEmpty() function should also
    // return false when only the programming language is selected).
    $form['default_language'] = [
      '#type' => 'select',
      '#title' => $this->t('Default programming language'),
      '#description' => $this->t('Select the programming language that should the default selection.'),
      '#options' => $languages,
      '#default_value' => $this->getSetting('default_language'),
    ];

    // Ensure that the selected default language is valid (i.e., the language is
    // also selected in the list of available options).
    $form['#element_validate'][] = [
      $this,
      'settingsFormDefaultLanguageValidate',
    ];

    return $form;
  }

  /**
   * Render API callback: Validates the selected default programming language.
   *
   * The indicated programming language that should be used as the default
   * selection for this widget of course should be part of the available
   * programming languages.
   *
   * This function is assigned as an #element_validate callback in
   * settingsForm().
   */
  public function settingsFormDefaultLanguageValidate(&$element, FormStateInterface $form_state): void {
    $values = $form_state->getValue($element['#parents']);

    // Raise an error, when programming languages are selected but the provided
    // default is not part of it.
    if (!empty($values['languages']) && !in_array($values['default_language'], $values['languages'], TRUE)) {
      $form_state->setError($element['default_language'], $this->t('The selected default language is currently not part of the selected values for the available programming languages.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary(): array {
    $summary = parent::settingsSummary();

    $default_language = $this->getSetting('default_language');

    if ($languages = $this->getSetting('languages')) {
      $languages = implode(', ', $languages);

      // Indicate with an * what the default programming language is (i.e., the
      // selected option when inserting a new value for this field).
      if ($default_language) {
        $languages = str_replace($default_language, $default_language . '*', $languages);
      }

      $summary[] = $this->t('Programming languages: @languages', ['@languages' => $languages]);
    }
    elseif ($default_language) {
      $summary[] = $this->t('All programming languages will be available, with @default_language as the default selected option', ['@default_language' => $default_language]);
    }
    else {
      $summary[] = $this->t('All programming languages will be available, no default language selected');
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state): array {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    // When no languages are selected, provide all available programming
    // languages, that can be used for highlighting, to the user.
    if ($languages = $this->getSetting('languages')) {
      // Ensure that the keys are the same as the value, since the key of the
      // selected element is returned to the form submission handler.
      $languages = array_combine($languages, $languages);
    }
    else {
      $languages = $this->highlighter->getAvailableLanguages();

      // Sort the list of programming languages alphabetically, to make it
      // easier for users to find their languages.
      asort($languages, SORT_NATURAL | SORT_FLAG_CASE);
    }

    // Allow the user to indicate the programming language of the code snippet.
    $element['language'] = [
      '#type' => 'select',
      '#title' => $this->t('Programming language'),
      '#options' => $languages,
      '#default_value' => $items[$delta]->language ?? $this->getSetting('default_language'),
      '#weight' => -10,
    ];

    return $element;
  }

}
