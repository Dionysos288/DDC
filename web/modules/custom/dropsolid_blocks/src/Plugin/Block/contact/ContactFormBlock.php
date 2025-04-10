<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\Contact;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Contact Form block.
 */
#[Block(
  id: "ddc_contact_form",
  admin_label: new TranslatableMarkup("Contact Form"),
  category: new TranslatableMarkup("DDC Contact")
)]
class ContactFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $webform = \Drupal::entityTypeManager()
      ->getStorage('webform')
      ->load('contact');

    if (!$webform) {
      return [];
    }

    return [
      '#theme' => 'dropsolid_contact_form_block',
      '#content' => [
        'form' => [
          '#type' => 'webform',
          '#webform' => $webform,
          '#default_data' => [],
        ],
      ],
      '#base_path' => base_path(),
      '#directory' => \Drupal::service('extension.list.theme')->getPath('olivero_sub'),
      '#attached' => [
        'library' => ['dropsolid_blocks/contact_form'],
      ],
    ];
  }
} 