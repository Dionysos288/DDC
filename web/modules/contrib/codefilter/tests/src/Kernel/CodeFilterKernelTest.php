<?php

namespace Drupal\Tests\codefilter\Kernel;

use Drupal\filter\Entity\FilterFormat;
use Drupal\filter\FilterFormatInterface;
use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the codefilter plugin in combination with other filters.
 *
 * @group codefilter
 */
class CodeFilterKernelTest extends KernelTestBase {

  /**
   * The modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'system',
    'user',
    'filter',
    'codefilter',
  ];

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->entityTypeManager = $this->container->get('entity_type.manager');
  }

  /**
   * Tests the codefilter plugin in combination with other filters.
   */
  public function testCodeFilter() {
    $filters = [
      // The relative order of the HTML and linebreak filters is the same as in
      // the 'standard' profile's 'restricted_html' format: filter_html goes
      // before, so P and BR tags aren't allowed in the original text, only
      // those created by the filter_autop filter.
      'filter_html' => [],
      'codefilter' => [],
      'filter_autop' => [],
      'filter_htmlcorrector' => [],
    ];
    $this->createFormat('code', $filters);

    // Test <code> tags.
    $text = <<<'EOT'
    This code:

    <code>
    if ($value > 5 && $value < 4) {
      \Drupal::service('foo')->doThing();
    }
    </code>

    will do the thing.

    And now for something completely different.

    EOT;

    $expected_text = <<<'EOT'
    <p>This code:</p>
    <div class="codeblock"><code>if ($value &gt; 5 &amp;&amp; $value &lt; 4) {<br>&nbsp; \Drupal::service('foo')-&gt;doThing();<br>}</code></div>
    <p>will do the thing.</p>
    <p>And now for something completely different.</p>

    EOT;

    $filtered_text = check_markup($text, 'code');
    $this->assertSame($expected_text, (string) $filtered_text);

    // Test <?php tags.
    $text = <<<'EOT'
    This code:

    <?php
    if ($value > 5 && $value < 4) {
      \Drupal::service('foo')->doThing();
    }
    ?>

    will do the thing.

    And now for something completely different.

    EOT;

    // Expected text, with linebreaks ignored and real linebreaks represented by
    // the string '\n'.
    $expected_text = <<<'EOT'
    <p>This code:</p>\n
    <div class="codeblock"><code>
    <span style="color: #000000"><span style="color: #0000BB">&lt;?php<br>
    </span><span style="color: #007700">if (</span>
    <span style="color: #0000BB">$value </span><span style="color: #007700">&gt; </span><span style="color: #0000BB">5 </span>
    <span style="color: #007700">&amp;&amp; </span>
    <span style="color: #0000BB">$value </span><span style="color: #007700">&lt; </span><span style="color: #0000BB">4</span>
    <span style="color: #007700">) {<br>
    &nbsp; </span><span style="color: #0000BB">\Drupal</span><span style="color: #007700">::</span>
    <span style="color: #0000BB">service</span>
    <span style="color: #007700">(</span><span style="color: #DD0000">'foo'</span>
    <span style="color: #007700">)-&gt;</span><span style="color: #0000BB">doThing</span>
    <span style="color: #007700">();<br>
    }<br>
    </span>
    <span style="color: #0000BB">?&gt;</span>
    </span></code></div>\n
    <p>will do the thing.</p>\n
    <p>And now for something completely different.</p>\n

    EOT;

    $expected_text = $this->prepareExpectedText($expected_text);
    $filtered_text = check_markup($text, 'code');
    $this->assertSame($expected_text, (string) $filtered_text);

    // Test line breaks in code are handled correctly.
    $text = <<<'EOT'
    This code:

    <code>
    $one = 1;

    // Blank line.
    $two = 2;
    </code>

    will do the thing.

    EOT;

    $expected_text = <<<'EOT'
    <p>This code:</p>\n
    <div class="codeblock"><code>$one = 1;<br><br>// Blank line.<br>$two = 2;</code></div>\n
    <p>will do the thing.</p>\n
    EOT;

    $expected_text = $this->prepareExpectedText($expected_text);

    $filtered_text = check_markup($text, 'code');
    $this->assertSame($expected_text, (string) $filtered_text);
  }

  /**
   * Helper to make expected text earlier to read for DX.
   *
   * - Line break characters in the given text are removed.
   * - The sequence '\n' is replaced with a line break.
   *
   * @param string $text
   *
   * @return string
   */
  protected function prepareExpectedText(string $text): string {
    // Newlines are ignored.
    $text = str_replace("\n", '', $text);
    // The sequence '\n' is treated as a newline.
    $text = str_replace('\n', "\n", $text);

    return $text;
  }

  /**
   * Creates a format with the given filters.
   *
   * @param string $name
   *   The name of the format to create.
   * @param array $filters
   *   An array of filter definitions. Keys are filter plugin names, values are
   *   arrays of configuration. The 'status' and 'weight' keys should be omitted
   *   from the configuration, which means in many cases the value can merely be
   *   an empty array. The filters will be weighted according to their order in
   *   the given array.
   *
   * @return \Drupal\filter\FilterFormatInterface
   *   The saved format.
   */
  protected function createFormat(string $name, array $filters): FilterFormatInterface {
    foreach (array_keys($filters) as $index => $filter_id) {
      $filters[$filter_id]['weight'] = $index;
      $filters[$filter_id]['status'] = TRUE;
    }

    $format = FilterFormat::create([
      'format' => $name,
      'name' => $name,
      'weight' => 1,
      'filters' => $filters,
    ]);
    $format->save();

    return $format;
  }

}
