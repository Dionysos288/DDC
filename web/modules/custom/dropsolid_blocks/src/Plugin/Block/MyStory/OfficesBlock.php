<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\MyStory;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;


#[Block(
  id: "ddc_my_story_offices",
  admin_label: new TranslatableMarkup("My Story Offices Block"),
  category: new TranslatableMarkup("DDC My Story")
)]
class OfficesBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'dropsolid_my_story_offices_block',
    ];
  }
} 