<?php

namespace Drupal\Tests\ssch\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\ssch\Service\ServerSidedCodeHighlightingService;
use Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Log\LoggerInterface;

/**
 * Tests the ServerSidedCodeHighlightingService class.
 *
 * @coversDefaultClass \Drupal\ssch\Service\ServerSidedCodeHighlightingService
 * @group ssch
 */
class ServerSidedCodeHighlightingServiceTest extends UnitTestCase {

  /**
   * Logger service.
   *
   * @var \Psr\Log\LoggerInterface|\Prophecy\Prophecy\ObjectProphecy
   */
  protected LoggerInterface|ObjectProphecy $logger;

  /**
   * Service for handling server sided code highlighting.
   *
   * @var \Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface
   */
  protected ServerSidedCodeHighlightingServiceInterface $highlighter;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    // Create mock of the logger service.
    $this->logger = $this->prophesize(LoggerInterface::class);

    // The code highlighting service that needs to be tested.
    $this->highlighter = new ServerSidedCodeHighlightingService($this->logger->reveal());
  }

  /**
   * Tests the basic working of the code highlighting functionality.
   *
   * @param string $code
   *   The code snippet for the test.
   * @param string|null $language
   *   The programming language for the test.
   *
   * @covers ::highlight
   * @dataProvider validCodeAndLanguageProvider
   */
  public function testHighlightWithValidCodeAndLanguage(string $code, ?string $language): void {
    $highlighted_code = $this->highlighter->highlight($code, $language);

    // Ensure that an object is returned and that the necessary values exist.
    $this->assertInstanceOf(\stdClass::class, $highlighted_code);
    $this->assertNotEmpty($highlighted_code->language);
    $this->assertNotEmpty($highlighted_code->value);
  }

  /**
   * Provides data to ensure correct basic working of the code highlighting.
   *
   * @return array
   *   Returns a list of test data of which each is an array containing the
   *   following elements:
   *     - code: A code snippet.
   *     - language: Programming language.
   */
  public static function validCodeAndLanguageProvider(): array {
    return [
      'without programming language' => ['<?php phpinfo(); ?>', NULL],
      'correct programming language' => ['<?php phpinfo(); ?>', 'php'],
      'wrong programming language' => ['<?php phpinfo(); ?>', 'yaml'],
    ];
  }

  /**
   * Tests the correct handling of invalid code snippet and language.
   *
   * @param string $code
   *   The code snippet for the test.
   * @param string|null $language
   *   The programming language for the test.
   *
   * @covers ::highlight
   * @dataProvider invalidCodeAndLanguageProvider
   */
  public function testHighlightWithInvalidCodeAndLanguage(string $code, ?string $language): void {
    // Since invalid input is provided, we expect that an exception is caught
    // and reported to the logger service.
    $this->logger->error(Argument::cetera())->shouldBeCalledOnce();

    $highlighted_code = $this->highlighter->highlight($code, $language);

    // When an error has occurred, we expect that no highlighted code is
    // provided.
    $this->assertEmpty($highlighted_code);
  }

  /**
   * Provides data to ensure correct handling of invalid input.
   *
   * @return array
   *   Returns a list of test data of which each is an array containing the
   *   following elements:
   *     - code: A code snippet.
   *     - language: Programming language.
   */
  public static function invalidCodeAndLanguageProvider(): array {
    return [
      'valid code non existing language' => [
        '<?php phpinfo(); ?>',
        '+non_existing_language+',
      ],
    ];
  }

  /**
   * Tests the correct working when highlighting a multiline code snippet.
   *
   * @param string $code
   *   The code snippet for the test.
   * @param string|null $language
   *   The programming language for the test.
   * @param int $lines_limit
   *   Maximum number of code lines.
   * @param int $expected
   *   The expected number of lines in the highlighted code fragment, including
   *   possibly a line for the ellipsis.
   *
   * @covers ::highlight
   * @dataProvider linesLimitProvider
   */
  public function testHighlightWithMultilineCodeSnippet(string $code, ?string $language, int $lines_limit, int $expected): void {
    $highlighted_code = $this->highlighter->highlight($code, $language, $lines_limit);

    // Ensure that an object is returned and that the necessary values exist.
    $this->assertInstanceOf(\stdClass::class, $highlighted_code);
    $this->assertNotEmpty($highlighted_code->language);
    $this->assertNotEmpty($highlighted_code->value);

    // Check whether the number lines in highlighted code fragment matches what
    // is expected.
    $this->assertEquals($expected, substr_count($highlighted_code->value, "\n"));
  }

  /**
   * Provides data to test out limiting the number highlighted code lines.
   *
   * @return array
   *   Returns a list of test data of which each is an array containing the
   *   following elements:
   *     - code: A code snippet.
   *     - language: Programming language.
   *     - lines_limit: Limit on the (maximum) number of code lines.
   *     - expected: The number of lines expected in the highlighted code
   *       snippet (including the ellipsis).
   */
  public static function linesLimitProvider(): array {
    return [
      'no limit (negative)' => ["<?php\n  phpinfo();\n?>\n", 'php', -1, 3],
      'no limit (zero)' => ["<?php\n  phpinfo();\n?>\n", 'php', 0, 3],
      'one code line' => ["<?php\n  phpinfo();\n?>\n", 'php', 1, 2],
      'two code lines' => ["<?php\n  phpinfo();\n?>\n", 'php', 2, 3],
      'equals number of lines' => ["<?php\n  phpinfo();\n?>\n", 'php', 3, 3],
      'more than number of lines' => ["<?php\n  phpinfo();\n?>\n", 'php', 4, 3],
    ];
  }

  /**
   * Tests that stylesheets are available and in the correct format.
   *
   * @covers ::getAvailableStyleSheets
   */
  public function testAvailableStyleSheetsAreProvidedInTheCorrectFormat(): void {
    $stylesheets = $this->highlighter->getAvailableStyleSheets();

    // Ensure that an array is provided that can be used as an options list.
    // Since the keys of an options list are stored in the database, it makes
    // sense to make them the same as the value.
    $this->assertNotEmpty($stylesheets);
    $this->assertIsArray($stylesheets);
    $this->assertContainsOnly('string', $stylesheets);
    $this->assertEquals(array_keys($stylesheets), array_values($stylesheets));
  }

  /**
   * Tests that programming languages are available and in the correct format.
   *
   * @covers ::getAvailableLanguages
   */
  public function testAvailableLanguagesAreProvidedInTheCorrectFormat(): void {
    $languages = $this->highlighter->getAvailableLanguages();

    // Ensure that an array is provided that can be used as an options list.
    // Since the keys of an options list are stored in the database, it makes
    // sense to make them the same as the value.
    $this->assertNotEmpty($languages);
    $this->assertIsArray($languages);
    $this->assertContainsOnly('string', $languages);
    $this->assertEquals(array_keys($languages), array_values($languages));
  }

}
