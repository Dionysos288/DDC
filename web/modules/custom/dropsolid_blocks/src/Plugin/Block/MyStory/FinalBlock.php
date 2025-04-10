<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\MyStory;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_my_story_final",
  admin_label: new TranslatableMarkup("My Story Final Block"),
  category: new TranslatableMarkup("DDC My Story")
)]
class FinalBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'description' => [
        'value' => 'The world is changing rapidly, and digital experiences are more critical than ever. Organizations that take control of their digital presence will be the ones that thrive in the future.

At Dropsolid, we are committed to helping businesses take ownership of their digital future—whether it\'s through open-source platforms, AI-driven strategies, or cutting-edge digital experiences.

I invite you to join this journey. Whether you are a business leader, developer, marketer, or entrepreneur, we can work together to build a future where digital freedom is the standard.

Contact me if you are looking to:

- Build a scalable, open-source digital experience platform

- Use AI to enhance customer engagement without sacrificing control

- Take ownership of your organization\'s digital transformation

- Learn more about Drupal, AI, or digital business strategies',
        'format' => 'full_html',
      ],
      'subheader' => 'Let\'s shape the future of digital freedom together.',
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

    $form['subheader'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subheader'),
      '#default_value' => $this->configuration['subheader'],
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['description'] = $form_state->getValue('description');
    $this->configuration['subheader'] = $form_state->getValue('subheader');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $description = is_array($this->configuration['description']) 
      ? $this->configuration['description']['value'] 
      : $this->configuration['description'];

    return [
      '#theme' => 'dropsolid_my_story_final_block',
      '#content' => [
        'description' => $description,
        'subheader' => $this->configuration['subheader'],
      ],
    ];
  }
} 