<?php

namespace Drupal\dropsolid_blocks\Plugin\Block\Blog;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;

/**
 * Provides a 'Blog Hero Layout' block.
 *
 * @Block(
 *   id = "dropsolid_blog_hero_layout_block",
 *   admin_label = @Translation("Blog Hero Layout"),
 *   category = @Translation("DDC Blog")
 * )
 */

class BlogHeroBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The file URL generator service.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGenerator;

  /**
   * Constructs a new BlogHeroBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $file_url_generator
   *   The file URL generator service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager, FileUrlGeneratorInterface $file_url_generator) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->fileUrlGenerator = $file_url_generator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('file_url_generator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'featured_blog' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $node_storage = $this->entityTypeManager->getStorage('node');
    $nids = $node_storage->getQuery()
      ->condition('type', 'blog')
      ->condition('status', 1)
      ->sort('created', 'DESC')
      ->accessCheck(TRUE)
      ->execute();
    
    $nodes = $node_storage->loadMultiple($nids);
    
    $options = ['' => $this->t('- Select a blog post -')];
    foreach ($nodes as $node) {
      $options[$node->id()] = $node->getTitle();
    }

    $form['featured_blog'] = [
      '#type' => 'select',
      '#title' => $this->t('Featured Blog Post'),
      '#description' => $this->t('Select the blog post to feature in the hero section.'),
      '#options' => $options,
      '#default_value' => $config['featured_blog'],
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['featured_blog'] = $form_state->getValue('featured_blog');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $config = $this->getConfiguration();
    
    if (empty($config['featured_blog'])) {
      return $build;
    }
    
    $node_storage = $this->entityTypeManager->getStorage('node');
    $featured_node = $node_storage->load($config['featured_blog']);
    
    if (!$featured_node) {
      return $build;
    }
    
    $featured_image = NULL;
    $featured_image_alt = '';
    if ($featured_node->hasField('field_featured_image') && !$featured_node->get('field_featured_image')->isEmpty()) {
      $media = $featured_node->get('field_featured_image')->entity;
      if ($media && $media->hasField('field_media_image') && !$media->get('field_media_image')->isEmpty()) {
        $file = $media->get('field_media_image')->entity;
        if ($file) {
          $featured_image = $file->getFileUri();
          $featured_image_alt = $media->get('field_media_image')->alt ?: $featured_node->getTitle();
        }
      }
    }
    
    $tags = [];
    if ($featured_node->hasField('field_tags') && !$featured_node->get('field_tags')->isEmpty()) {
      foreach ($featured_node->get('field_tags')->referencedEntities() as $tag) {
        $tags[] = $tag->label();
      }
    }
    
    $description = '';
    if ($featured_node->hasField('field_description') && !$featured_node->get('field_description')->isEmpty()) {
      $description = $featured_node->get('field_description')->value;
    } elseif ($featured_node->hasField('body') && !$featured_node->get('body')->isEmpty()) {
      $description = $featured_node->get('body')->summary;
      if (empty($description)) {
        $description = text_summary($featured_node->get('body')->value, 'plain_text', 200);
      }
    }
    
    $featured_blog = [
      'title' => $featured_node->getTitle(),
      'url' => $featured_node->toUrl()->toString(),
      'id' => $featured_node->id(),
      'image' => $featured_image ? $this->fileUrlGenerator->generateAbsoluteString($featured_image) : NULL,
      'image_alt' => $featured_image_alt,
      'author' => $featured_node->getOwner()->getDisplayName(),
      'date' => \Drupal::service('date.formatter')->format($featured_node->getCreatedTime(), 'custom', 'M d, Y'),
      'tags' => $tags,
      'description' => $description,
    ];
    
    $build = [
      '#theme' => 'dropsolid_blog_hero_layout_block',
      '#featured_blog' => $featured_blog,
      '#directory' => \Drupal::theme()->getActiveTheme()->getPath(),
      '#attached' => [
        'library' => [
          'dropsolid_blocks/blog_hero',
        ],
      ],
    ];
    
    return $build;
  }

} 