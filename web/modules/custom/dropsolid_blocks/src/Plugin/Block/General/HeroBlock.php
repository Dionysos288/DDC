<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\General;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Url;


#[Block(
  id: "ddc_hero",
  admin_label: new TranslatableMarkup("Hero Block"),
  category: new TranslatableMarkup("DDC General")
)]
class HeroBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'title' => '',
      'subtitle' => '',
      'description' => [
        'value' => '',
        'format' => 'full_html',
      ],
      'image_path' => '',
      'image_position' => 'center',
      'socials' => TRUE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $this->configuration['title'],
      '#required' => TRUE,
    ];

    $form['subtitle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subtitle'),
      '#default_value' => $this->configuration['subtitle'],
      '#required' => FALSE,
    ];

    $form['description'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#default_value' => is_array($this->configuration['description']) ? $this->configuration['description']['value'] : $this->configuration['description'],
      '#format' => is_array($this->configuration['description']) ? $this->configuration['description']['format'] : 'full_html',
      '#required' => TRUE,
    ];

    $form['image_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Image Path'),
      '#default_value' => $this->configuration['image_path'],
      '#description' => $this->t('Enter the image path relative to theme directory (e.g., images/home/example.jpg)'),
      '#required' => TRUE,
    ];

    $form['image_position'] = [
      '#type' => 'select',
      '#title' => $this->t('Image Position'),
      '#options' => [
        'center' => $this->t('Center'),
        'left' => $this->t('Left'),
        'right' => $this->t('Right'),
      ],
      '#default_value' => $this->configuration['image_position'],
      '#description' => $this->t('Select the position of the image. Center is default.'),
    ];

    $form['socials'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Socials'),
      '#default_value' => $this->configuration['socials'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['subtitle'] = $form_state->getValue('subtitle');
    $this->configuration['description'] = $form_state->getValue('description');
    $this->configuration['image_path'] = $form_state->getValue('image_path');
    $this->configuration['image_position'] = $form_state->getValue('image_position');
    $this->configuration['socials'] = $form_state->getValue('socials');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $theme_path = \Drupal::service('extension.list.theme')->getPath('olivero_sub');

    $description = is_array($this->configuration['description']) 
      ? $this->configuration['description']['value'] 
      : $this->configuration['description'];

    return [
      '#theme' => 'dropsolid_hero_block',
      '#content' => [
        'title' => $this->configuration['title'],
        'subtitle' => $this->configuration['subtitle'],
        'description' => $description,
        'social_links' => [
          'twitter' => 'https://x.com/dominiquedc',
          'linkedin' => 'https://www.linkedin.com/in/dominiquedecooman/',
          'drupal' => 'https://www.drupal.org/user/199987',
        ],
        'image' => $this->configuration['image_path'],
        'image_position' => $this->configuration['image_position'],
        'socials' => $this->configuration['socials'],
      ],
      '#base_path' => base_path(),
      '#directory' => $theme_path,
      '#attached' => [
        'library' => ['olivero_sub/hero'],
      ],
    ];
  }
} 