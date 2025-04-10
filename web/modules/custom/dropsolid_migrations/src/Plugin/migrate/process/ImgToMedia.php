<?php

namespace Drupal\dropsolid_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Convert img tags to drupal-media tags.
 *
 * @MigrateProcessPlugin(
 *   id = "img_to_media"
 * )
 */
class ImgToMedia extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    if (empty($value)) {
      return $value;
    }

    return preg_replace_callback('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', function ($matches) {
      $filename = basename($matches[1]);
      
      // Get the file ID from file_managed
      $fid = \Drupal::database()
        ->select('file_managed', 'f')
        ->fields('f', ['fid'])
        ->condition('filename', $filename)
        ->execute()
        ->fetchField();
      
      if ($fid) {
        // Get the media entity that references this file
        $media = \Drupal::database()
          ->select('media_field_data', 'm')
          ->fields('m', ['uuid'])
          ->join('media__field_media_image', 'mi', 'm.mid = mi.entity_id')
          ->condition('mi.field_media_image_target_id', $fid)
          ->execute()
          ->fetchField();
        
        if ($media) {
          return '<drupal-media data-entity-type="media" data-entity-uuid="' . $media . '">&nbsp;</drupal-media>';
        }
      }
      
      return $matches[0];
    }, $value);
  }
} 