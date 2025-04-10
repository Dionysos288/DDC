<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\General;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_split_content",
  admin_label: new TranslatableMarkup("Split Content Block"),
  category: new TranslatableMarkup("DDC General")
)]
class SplitContentBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'title' => '',
      'title_highlight' => FALSE,
      'subtitle' => '',
      'description' => '',
      'image' => '',
      'image_alt' => '',
      'image_position' => 'left',
      'gradient' => FALSE,
      'background' => FALSE,
      'link_url' => '',
      'link_text' => '',
      'image_position_inner' => 'center',
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

    $form['title_highlight'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Highlight Title'),
      '#default_value' => $this->configuration['title_highlight'],
    ];

    $form['subtitle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subtitle'),
      '#default_value' => $this->configuration['subtitle'],
    ];

    $form['description'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#default_value' => $this->configuration['description'],
      '#format' => 'full_html',
      '#required' => TRUE,
    ];

    $form['image'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Image Path'),
      '#description' => $this->t('Path to the image relative to theme directory (e.g., images/home/example.jpg)'),
      '#default_value' => $this->configuration['image'],
      '#required' => TRUE,
    ];

    $form['image_alt'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Image Alt Text'),
      '#default_value' => $this->configuration['image_alt'],
      '#required' => TRUE,
    ];

    $form['image_position'] = [
      '#type' => 'select',
      '#title' => $this->t('Image Position'),
      '#options' => [
        'left' => $this->t('Left'),
        'right' => $this->t('Right'),
      ],
      '#default_value' => $this->configuration['image_position'],
    ];

    $form['gradient'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Gradient'),
      '#default_value' => $this->configuration['gradient'],
    ];

    $form['background'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Background'),
      '#default_value' => $this->configuration['background'],
    ];

    $form['link_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Link URL'),
      '#default_value' => $this->configuration['link_url'],
    ];

    $form['link_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Text'),
      '#default_value' => $this->configuration['link_text'],
    ];

    $form['image_position_inner'] = [
      '#type' => 'select',
      '#title' => $this->t('Image Position Inner'),
      '#options' => [
        'center' => $this->t('Center'),
        'left' => $this->t('Left'),
        'right' => $this->t('Right'),
      ],
      '#default_value' => $this->configuration['image_position_inner'],
      '#description' => $this->t('Select the position of the image within its container. Center is default.'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['title_highlight'] = $form_state->getValue('title_highlight');
    $this->configuration['subtitle'] = $form_state->getValue('subtitle');
    $this->configuration['description'] = $form_state->getValue('description')['value'];
    $this->configuration['image'] = $form_state->getValue('image');
    $this->configuration['image_alt'] = $form_state->getValue('image_alt');
    $this->configuration['image_position'] = $form_state->getValue('image_position');
    $this->configuration['gradient'] = $form_state->getValue('gradient');
    $this->configuration['background'] = $form_state->getValue('background');
    $this->configuration['link_url'] = $form_state->getValue('link_url');
    $this->configuration['link_text'] = $form_state->getValue('link_text');
    $this->configuration['image_position_inner'] = $form_state->getValue('image_position_inner');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $theme_path = \Drupal::service('extension.list.theme')->getPath('olivero_sub');

    return [
      '#theme' => 'dropsolid_split_content_block',
      '#content' => [
        'title' => $this->configuration['title'],
        'title_highlight' => $this->configuration['title_highlight'],
        'subtitle' => $this->configuration['subtitle'],
        'description' => $this->configuration['description'],
        'image' => $this->configuration['image'],
        'image_alt' => $this->configuration['image_alt'],
        'image_position' => $this->configuration['image_position'],
        'gradient' => $this->configuration['gradient'],
        'background' => $this->configuration['background'],
        'link_url' => $this->configuration['link_url'],
        'link_text' => $this->configuration['link_text'],
        'image_position_inner' => $this->configuration['image_position_inner'],
      ],
      '#base_path' => base_path(),
      '#directory' => $theme_path,
      '#attached' => [
        'library' => ['olivero_sub/split-content'],
      ],
    ];
  }
} 