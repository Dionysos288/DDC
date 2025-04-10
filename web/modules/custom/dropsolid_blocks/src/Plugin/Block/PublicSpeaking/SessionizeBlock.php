<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\PublicSpeaking;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_sessionize",
  admin_label: new TranslatableMarkup("Sessionize Sessions"),
  category: new TranslatableMarkup("DDC Public Speaking")
)]
class SessionizeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'sessionize_id' => '3520309c-b365-4aa5-999f-c38fb771ad38',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['sessionize_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sessionize Speaker ID'),
      '#description' => $this->t('Enter your Sessionize speaker ID'),
      '#default_value' => $this->configuration['sessionize_id'],
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['sessionize_id'] = $form_state->getValue('sessionize_id');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $speakerId = $this->configuration['sessionize_id'];
    $url = "https://sessionize.com/api/speaker/sessions/{$speakerId}/0x0x3fb393x";
    
    return [
      '#theme' => 'dropsolid_sessionize_block',
      '#content' => [
        'sessionize_url' => $url,
      ],
      '#attached' => [
        'library' => ['dropsolid_blocks/sessionize'],
      ],
    ];
  }
} 