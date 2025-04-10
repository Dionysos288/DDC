<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\General;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_newsletter",
  admin_label: new TranslatableMarkup("Newsletter Block"),
  category: new TranslatableMarkup("DDC General")
)]
class NewsletterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'dropsolid_newsletter_block',
      '#base_path' => base_path(),
      '#directory' => \Drupal::service('extension.list.theme')->getPath('olivero_sub'),
    ];
  }
} 