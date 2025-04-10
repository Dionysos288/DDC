<?php

declare(strict_types=1);

namespace Drupal\ssch;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a class to alter/define (dynamic) library definitions.
 *
 * @internal
 */
class DynamicLibraryDefinitions implements ContainerInjectionInterface {

  /**
   * Constructs a DynamicLibraryDefinitions instance.
   *
   * @param \Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface $highlighter
   *   Service for handling server sided code highlighting.
   */
  public function __construct(
    protected ServerSidedCodeHighlightingServiceInterface $highlighter,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('ssch.server_sided_code_highlighting'),
    );
  }

  /**
   * Add dynamic library definitions.
   *
   * Modules may implement this hook to add dynamic library definitions. Static
   * libraries, which do not depend on any runtime information, should be
   * declared in a modulename.libraries.yml file instead.
   *
   * @return array[]
   *   An array of library definitions to register, keyed by library ID. The
   *   library ID will be prefixed with the module name automatically.
   *
   * @see core.libraries.yml
   * @see hook_library_info_alter()
   */
  public function libraryInfoBuild(): array {
    $libraries = [];

    // Add for each of the stylesheets, supplied by the highlight.php package,
    // an entry in the Drupal's library.
    foreach ($this->highlighter->getAvailableStyleSheets() as $style) {
      $libraries['style.' . $style] = [
        'css' => [
          'theme' => [
            'vendor://scrivo/highlight.php/styles/' . $style . '.css' => [],
          ],
        ],
      ];
    }

    return $libraries;
  }

}
