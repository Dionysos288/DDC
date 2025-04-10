<?php

namespace Drupal\dropsolid_migrate\Commands;

use Drush\Commands\DrushCommands;
use Drupal\Core\Database\Database;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\RevisionableStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Drush commands for Dropsolid migrations.
 */
class DropsolidMigrateCommands extends DrushCommands {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new DropsolidMigrateCommands object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Convert img tags to drupal-media tags in blog content.
   *
   * @command dropsolid:convert-images
   * @aliases dci
   */
  public function convertImages() {
    $node_storage = $this->entityTypeManager->getStorage('node');
    $media_storage = $this->entityTypeManager->getStorage('media');
    
    // Load all blog nodes
    $nids = $node_storage->getQuery()
      ->condition('type', 'blog')
      ->execute();
    
    $nodes = $node_storage->loadMultiple($nids);
    
    foreach ($nodes as $node) {
      $content = $node->get('field_content')->value;
      
      if (empty($content)) {
        continue;
      }
      
      $content = preg_replace_callback('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', function ($matches) use ($media_storage) {
        $filename = basename($matches[1]);
        
        // Find the file ID
        $fid = Database::getConnection()
          ->select('file_managed', 'f')
          ->fields('f', ['fid'])
          ->condition('filename', $filename)
          ->execute()
          ->fetchField();
        
        if ($fid) {
          // Find the media entity that uses this file
          $media = Database::getConnection()
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
      }, $content);
      
      $node->set('field_content', [
        'value' => $content,
        'format' => 'content',
      ]);
      $node->save();
    }
    
    $this->output()->writeln('Image conversion complete.');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

} 