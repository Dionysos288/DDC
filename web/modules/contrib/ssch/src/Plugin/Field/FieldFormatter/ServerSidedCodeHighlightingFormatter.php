<?php

declare(strict_types=1);

namespace Drupal\ssch\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'ssch_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "ssch_formatter",
 *   label = @Translation("Default"),
 *   field_types = {
 *     "ssch",
 *   }
 * )
 */
class ServerSidedCodeHighlightingFormatter extends FormatterBase {

  /**
   * Constructs a ServerSidedCodeHighlightingFormatter instance.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
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
    $label,
    $view_mode,
    array $third_party_settings,
    protected ServerSidedCodeHighlightingServiceInterface $highlighter,
  ) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('ssch.server_sided_code_highlighting')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings(): array {
    return [
      'lines_limit' => 0,
      'ellipsis' => TRUE,
      'style' => '',
      'display_language' => FALSE,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state): array {
    $form = parent::settingsForm($form, $form_state);

    // The number of code lines to show can be controlled with this input field.
    $form['lines_limit'] = [
      '#type' => 'number',
      '#title' => $this->t('Limit source code lines'),
      '#description' => $this->t('Set the number of code lines that should be shown. In case the value is zero, all lines of the provided code snippet will be shown.'),
      '#min' => 0,
      '#default_value' => $this->getSetting('lines_limit'),
    ];

    // Provide a checkbox to indicate whether '...' should be replaced by the
    // HTML-symbol representing an ellipsis (i.e., &hellip;).
    $form['ellipsis'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Ellipsis'),
      '#description' => $this->t("Indicate whether '...' should be replaced by an ellipsis."),
      '#default_value' => $this->getSetting('ellipsis'),
    ];

    // Get the list of available stylesheets and sort them alphabetically.
    $stylesheets = $this->highlighter->getAvailableStyleSheets();
    asort($stylesheets, SORT_NATURAL | SORT_FLAG_CASE);

    // Let the user choose from the list of stylesheets containing the syntax
    // highlighting rules.
    $form['style'] = [
      '#type' => 'select',
      '#title' => $this->t('Stylesheet'),
      '#options' => $stylesheets,
      '#empty_option' => $this->t('- Frontend theme itself -'),
      '#empty_value' => '',
      '#default_value' => $this->getSetting('style'),
    ];

    // Provide a checkbox to indicate whether the programming language should be
    // displayed.
    $form['display_language'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Display programming language'),
      '#description' => $this->t('Indicate whether the programming language of the code snippet should be displayed.'),
      '#default_value' => $this->getSetting('display_language'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary(): array {
    $summary = parent::settingsSummary();

    // Display the number of code lines are shown.
    if ($lines_limit = $this->getSetting('lines_limit')) {
      $summary[] = $this->t('Only the first @limit lines of the code snippet are displayed.', ['@limit' => $lines_limit]);
    }
    else {
      $summary[] = $this->t('All code lines of the snippet are shown.');
    }

    // Indicate whether '...' are replaced by the ellipsis symbol.
    $summary[] = $this->getSetting('ellipsis') ?
      $this->t("Three dots (i.e., '...') are replaced by an ellipsis (i.e., '&hellip;').") :
      $this->t("Three dots (i.e., '...') are not replaced by an ellipsis (i.e., '&hellip;').");

    // Let the user know which stylesheet is used to create the syntax
    // highlighting.
    if ($style = $this->getSetting('style')) {
      $summary[] = $this->t('Syntax highlighting stylesheet: %style.', ['%style' => $style]);
    }
    else {
      $summary[] = $this->t('Syntax highlighting rules are supplied by the theme itself.');
    }

    // Indicate whether the programming language is shown.
    $summary[] = $this->getSetting('display_language') ?
      $this->t('The programming language is shown.') :
      $this->t('The programming language itself is not shown.');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    $elements = [];

    // Get the selected stylesheet that should be used for the syntax
    // highlighting.
    $style = $this->getSetting('style');

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'ssch_server_sided_code_highlighting',
        '#code' => $item->value,
        '#language' => $item->language,
        '#lines_limit' => $this->getSetting('lines_limit'),
        '#ellipsis' => $this->getSetting('ellipsis'),
        '#style' => $style,
        '#display_language' => $this->getSetting('display_language'),
      ];
    }

    return $elements;
  }

}
