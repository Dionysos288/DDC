<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\Contact;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_contact_hero",
  admin_label: new TranslatableMarkup("Contact Hero Block"),
  category: new TranslatableMarkup("DDC Contact")
)]
class HeroContactBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'description' => [
        'value' => 'I\'m always open to a conversation. Let\'s see if we can create something valuable together.',
        'format' => 'full_html',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['description'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#default_value' => is_array($this->configuration['description']) ? $this->configuration['description']['value'] : $this->configuration['description'],
      '#format' => is_array($this->configuration['description']) ? $this->configuration['description']['format'] : 'full_html',
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['description'] = $form_state->getValue('description');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $description = is_array($this->configuration['description']) 
      ? $this->configuration['description']['value'] 
      : $this->configuration['description'];

    return [
      '#theme' => 'dropsolid_contact_hero_block',
      '#content' => [
        'description' => $description,
      ],
    ];
  }
} 