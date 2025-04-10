<?php

declare(strict_types=1);

namespace Drupal\ssch\Service;

use Highlight\Highlighter;
use Psr\Log\LoggerInterface;
use function HighlightUtilities\getAvailableStyleSheets;
use function HighlightUtilities\splitCodeIntoArray;

/**
 * Class representing the service for handling server sided code highlighting.
 */
class ServerSidedCodeHighlightingService implements ServerSidedCodeHighlightingServiceInterface {

  /**
   * Object containing the highlighting functionality.
   *
   * @var \Highlight\Highlighter
   */
  protected Highlighter $highlighter;

  /**
   * Constructs a new ServerSidedCodeHighlightingService object.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger object, that writes to the specific channel of this module.
   */
  public function __construct(protected LoggerInterface $logger) {
    $this->highlighter = new Highlighter();
  }

  /**
   * {@inheritdoc}
   */
  public function highlight(string $code, ?string $language, int $lines_limit = 0, bool $ellipsis = TRUE): ?object {
    $highlighted = NULL;

    try {
      // First, trim the code fragment from non-necessary white characters at
      // the beginning and end.
      $code = trim($code);

      // When no language is provided, use the automatic language detection
      // mechanism.
      if (!empty($language)) {
        $highlighted = $this->highlighter->highlight($language, $code);
      }
      else {
        $highlighted = $this->highlighter->highlightAuto($code);
      }

      // Replace '...' with the ellipsis symbol.
      if ($ellipsis) {
        $highlighted->value = str_replace('<span class="hljs-string">...</span>', '<span class="hljs-ellipsis">&hellip;</span>', $highlighted->value);
      }

      // When a limited amount of code lines should be shown, split the
      // highlighted code fragment and limit the number of code lines.
      if ($lines_limit > 0) {
        $highlighted->value = $this->limitNumberOfCodeLines($highlighted->value, $lines_limit, $ellipsis);
      }

      // Ensure that a code fragment always ends with a new line character.
      $highlighted->value .= "\n";
    }
    catch (\DomainException $e) {
      $this->logger->error('The language to check is not available for the highlighter: @message', ['@message' => $e->getMessage()]);
    }
    catch (\Exception $e) {
      $this->logger->error('Invalid regular expression given in the used language file: @message', ['@message' => $e->getMessage()]);
    }

    return $highlighted;
  }

  /**
   * Trim the provided snippet to a certain number of code lines.
   *
   * @param string $code
   *   The code snippet.
   * @param int $lines_limit
   *   The maximum number of code lines that should be shown.
   * @param bool $ellipsis
   *   (optional) Indicate whether an ellipsis symbol or simply '...' should be
   *   shown to indicate a trimmed version of the code snippet.
   *
   * @return string
   *   String containing the snippet with limited number of code lines.
   */
  private function limitNumberOfCodeLines(string $code, int $lines_limit, bool $ellipsis = TRUE): string {
    $trimmed = '';

    try {
      // Use the utility function to split the code snippet into an array of
      // code lines.
      $split = splitCodeIntoArray($code);
      $split_count = count($split);

      // Make sure the trimmed version contains as maximum the provided limit of
      // source code lines.
      $trimmed = implode("\n", array_slice($split, 0, $lines_limit));

      // Add an ellipsis at the end to indicate a trimmed version of the code
      // snippet is shown.
      if ($split_count > $lines_limit) {
        $trimmed .= $ellipsis ?
          "\n<span class=\"hljs-string\">...</span>" :
          "\n<span class=\"hljs-ellipsis\">&hellip;</span>";
      }
    }
    catch (\Exception $e) {
      $this->logger->error('Exception occurred while splitting the code snippet: @message', ['@message' => $e->getMessage()]);
    }

    return $trimmed;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableStyleSheets(): array {
    $stylesheets = getAvailableStyleSheets();
    return array_combine($stylesheets, $stylesheets);
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableLanguages(): array {
    $languages = Highlighter::listBundledLanguages();
    return array_combine($languages, $languages);
  }

}
