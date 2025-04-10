<?php

declare(strict_types=1);

namespace Drupal\ssch\Service;

/**
 * Class representing the service for handling server sided code highlighting.
 */
interface ServerSidedCodeHighlightingServiceInterface {

  /**
   * Perform highlighting of the provided code snippet.
   *
   * When no programming language is provided, the automatic language detection
   * mode is used to highlight the provided code fragment.
   *
   * @param string $code
   *   The code snippet.
   * @param string|null $language
   *   (optional) The programming language the code snippet is written in.
   * @param int $lines_limit
   *   (optional) The number of code lines to return, in case zero or negative
   *   number is provided all code lines will be provided.
   * @param bool $ellipsis
   *   (optional) Indicate whether '...' should be replaced by the ellipsis
   *   HTML symbol (i.e., '&hellip;').
   *
   * @return object|null
   *   Object containing the result of the code highlighting, with the property
   *   value escaped HTML of the provided code fragment and language the
   *   programming as determined by the highlighting library.
   */
  public function highlight(string $code, ?string $language, int $lines_limit = 0, bool $ellipsis = TRUE): ?object;

  /**
   * Provides a list the stylesheets that are supplied by highlighter.php.
   *
   * @return string[]
   *   Associative array containing the names of the available stylesheets, both
   *   for the key as the value.
   */
  public function getAvailableStyleSheets(): array;

  /**
   * Provides a list of programming languages that can be highlighted.
   *
   * @return string[]
   *   Associative array containing the names of the available programming
   *   languages, both for the key as the value.
   */
  public function getAvailableLanguages(): array;

}
