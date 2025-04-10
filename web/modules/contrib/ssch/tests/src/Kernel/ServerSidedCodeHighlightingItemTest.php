<?php

namespace Drupal\Tests\ssch\Kernel;

use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Tests\field\Kernel\FieldKernelTestBase;
use Drupal\entity_test\Entity\EntityTest;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;

/**
 * Tests the entity API for the ssch field type.
 *
 * @group ssch
 */
class ServerSidedCodeHighlightingItemTest extends FieldKernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['ssch'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    // Create a ssch field storage and field for validation.
    FieldStorageConfig::create([
      'field_name' => 'field_test',
      'entity_type' => 'entity_test',
      'type' => 'ssch',
    ])->save();
    FieldConfig::create([
      'entity_type' => 'entity_test',
      'field_name' => 'field_test',
      'bundle' => 'entity_test',
    ])->save();
  }

  /**
   * Tests using entity fields of the ssch field type.
   */
  public function testServerSidedCodeHighlightingItem(): void {
    $language = 'php';
    $code_snippet = '<?php phpinfo(); ?>';

    // Verify entity creation.
    $entity = EntityTest::create([
      'name' => $this->randomMachineName(),
      'field_test' => [
        'language' => $language,
        'value' => $code_snippet,
      ],
    ]);
    $entity->save();

    // Verify entity has been created properly.
    $id = $entity->id();
    $entity = EntityTest::load($id);
    $this->assertInstanceOf(FieldItemListInterface::class, $entity->get('field_test'));
    $this->assertInstanceOf(FieldItemInterface::class, $entity->get('field_test')->first());
    $this->assertEquals($entity->get('field_test')->first()->get('language')->getValue(), $language);
    $this->assertEquals($entity->get('field_test')->first()->get('value')->getValue(), $code_snippet);

    // Verify changing the field value.
    $new_language = 'json';
    $new_code_snippet = '{"test":"test"}';
    $entity->get('field_test')->first()->set('language', $new_language);
    $entity->get('field_test')->first()->set('value', $new_code_snippet);
    $this->assertEquals($entity->get('field_test')->first()->get('language')->getValue(), $new_language);
    $this->assertEquals($entity->get('field_test')->first()->get('value')->getValue(), $new_code_snippet);

    // Read changed entity and assert changed values.
    $entity->save();
    $entity = EntityTest::load($id);
    $this->assertEquals($entity->get('field_test')->first()->get('language')->getValue(), $new_language);
    $this->assertEquals($entity->get('field_test')->first()->get('value')->getValue(), $new_code_snippet);
  }

}
