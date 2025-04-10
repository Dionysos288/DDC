<?php

declare(strict_types=1);

namespace Drupal\ssch\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\StringLongItem;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Provides a field type of ssch.
 *
 * @FieldType(
 *   id = "ssch",
 *   label = @Translation("Code snippet (server sided code highlighting)"),
 *   description = @Translation("This field stores source code text and the programming language it's written in."),
 *   category = "plain_text",
 *   default_formatter = "ssch_formatter",
 *   default_widget = "ssch_widget",
 * )
 */
class ServerSidedCodeHighlightingItem extends StringLongItem {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition): array {
    $properties = parent::propertyDefinitions($field_definition);

    $properties['language'] = DataDefinition::create('string')
      ->setLabel(t('Programming language'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition): array {
    $schema = parent::schema($field_definition);

    $schema['columns']['language'] = [
      'type' => 'varchar',
      'length' => 255,
    ];

    $schema['indexes'] = [
      'language' => ['language'],
    ];

    return $schema;
  }

}
