<?php

declare(strict_types=1);

namespace Drupal\ssch;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a class to define template preprocessors.
 *
 * @internal
 */
class TemplatePreprocess implements ContainerInjectionInterface {

  /**
   * Constructs a TemplatePreprocess instance.
   *
   * @param \Drupal\ssch\Service\ServerSidedCodeHighlightingServiceInterface $highlighter
   *   Service for handling server sided code highlighting.
   */
  final public function __construct(
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
   * Prepares variables for ssch server sided code highlighting templates.
   *
   * Default template: ssch-server-sided-code-highlighting.html.twig.
   *
   * @param array $variables
   *   An associative array containing:
   *   - code: the code snippet.
   *   - lines_limit: the number of code lines that should be shown.
   *   - language: the programming language the code snippet is written in.
   *   - display_language: indicates whether to display the programming
   *     language.
   *   - style: the stylesheet of the highlight.php package to apply.
   */
  public function templatePreprocessSschServerSidedCodeHighlighting(array &$variables): void {
    if ($highlighted_code = $this->highlighter->highlight($variables['code'], $variables['language'], $variables['lines_limit'], $variables['ellipsis'])) {
      // Add the HTML generated by the code highlighting library and include the
      // programming it determined.
      $variables['highlighted'] = [
        'code' => $highlighted_code->value,
        'language' => $highlighted_code->language,
      ];

      // If set, attach the library to load the stylesheets for the actual
      // proper highlighting. Otherwise, the syntax highlighting styling rules
      // are/should be supplied by the (frontend) theme itself.
      if (!empty($variables['style'])) {
        $variables['#attached']['library'][] = 'ssch/style.' . $variables['style'];
      }
    }
  }

}
