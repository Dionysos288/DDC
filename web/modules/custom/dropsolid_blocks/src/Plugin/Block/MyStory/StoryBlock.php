<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\MyStory;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\filter\Entity\FilterFormat;


#[Block(
  id: "ddc_my_story",
  admin_label: new TranslatableMarkup("My Story Block"),
  category: new TranslatableMarkup("DDC My Story")
)]
class StoryBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $format = FilterFormat::load('basic_html') ? 'basic_html' : 'plain_text';
    
    return [
      'subheader' => 'My Story',
      'title' => 'The story behind Dominique',
      'description' => [
        'value' => 'From a passionate Drupal developer to co-founding Dropsolid, my journey is driven by the belief in digital freedom through open-source technology. Here\'s how it all started',
        'format' => $format,
      ],
      'timeline_items' => [
        [
          'year' => '2007',
          'title' => 'The Start Of My Career',
          'description' => 'I started my journey in 2007 as a Drupal developer, at a time when the internet was rapidly evolving from static websites to meaningful digital experiences. It became clear to me early on that digital experiences were more than just tools—they were the foundation of engagement, brand identity, and customer loyalty.',
          'image' => 'images/my-story/drupal-logo.png',
        ],
        [
          'year' => '2013',
          'title' => 'The Birth of Dropsolid',
          'description' => 'Founded Dropsolid with a mission to bring digital freedom to businesses. Built an open digital experience platform (DXP) based on Drupal. Helped businesses take ownership of their digital presence and move away from restrictive agency models.',
          'image' => 'images/my-story/dropsolid-logo.png',
        ],
        [
          'year' => '2017',
          'title' => 'Scaling Up & Expanding Horizons',
          'description' => 'Launched Dropsolid Cloud, making it easier for companies to manage their own Drupal environments. Expanded the team and expertise in Mautic, Unomi, and AI-driven personalization. Helped mid-sized enterprises embrace open-source digital experiences.',
          'image' => 'images/my-story/team-meeting.png',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['subheader'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subheader'),
      '#default_value' => $this->configuration['subheader'],
      '#required' => TRUE,
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $this->configuration['title'],
      '#required' => TRUE,
    ];

    $form['description'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#default_value' => $this->configuration['description']['value'] ?? '',
      '#format' => $this->configuration['description']['format'] ?? 'basic_html',
      '#required' => TRUE,
    ];

    $form['timeline_items'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Timeline Items'),
      '#tree' => TRUE,
    ];

    $timeline_items = array_values($this->configuration['timeline_items']);
    for ($i = 0; $i < 3; $i++) {
      $item = $timeline_items[$i] ?? [];
      
      $form['timeline_items'][$i] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Timeline Item @num', ['@num' => $i + 1]),
      ];

      $form['timeline_items'][$i]['year'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Year'),
        '#default_value' => $item['year'] ?? '',
        '#required' => TRUE,
      ];

      $form['timeline_items'][$i]['title'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Title'),
        '#default_value' => $item['title'] ?? '',
        '#required' => TRUE,
      ];

      $form['timeline_items'][$i]['description'] = [
        '#type' => 'textarea',
        '#title' => $this->t('Description'),
        '#default_value' => $item['description'] ?? '',
        '#required' => TRUE,
      ];

      $form['timeline_items'][$i]['image'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Image Path'),
        '#default_value' => $item['image'] ?? '',
        '#description' => $this->t('Path to the image relative to theme directory'),
        '#required' => TRUE,
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['subheader'] = $form_state->getValue('subheader');
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['description'] = $form_state->getValue('description');
    
    $timeline_items = array_values(array_slice($form_state->getValue('timeline_items'), 0, 3));
    $this->configuration['timeline_items'] = $timeline_items;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $timeline_items = array_values(array_slice($this->configuration['timeline_items'], 0, 3));
    
    return [
      '#theme' => 'dropsolid_my_story_block',
      '#content' => [
        'subheader' => $this->configuration['subheader'],
        'title' => $this->configuration['title'],
        'description' => $this->configuration['description']['value'],
        'timeline_items' => $timeline_items,
      ],
      '#base_path' => base_path(),
      '#directory' => \Drupal::service('extension.list.theme')->getPath('olivero_sub'),
    ];
  }
} 