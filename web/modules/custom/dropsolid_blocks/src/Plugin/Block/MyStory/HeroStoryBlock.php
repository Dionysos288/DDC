<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\MyStory;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_my_story_hero",
  admin_label: new TranslatableMarkup("My Story Hero Block"),
  category: new TranslatableMarkup("DDC My Story")
)]
class HeroStoryBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'description' => [
        'value' => 'From developer to digital freedom advocate, my mission has always been clear: helping organizations own their digital experiences and thrive in an open ecosystem.',
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
      '#theme' => 'dropsolid_my_story_hero_block',
      '#content' => [
        'description' => $description,
      ],
    ];
  }
} 