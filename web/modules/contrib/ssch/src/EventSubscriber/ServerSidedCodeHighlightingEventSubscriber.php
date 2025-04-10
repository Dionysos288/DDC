<?php

namespace Drupal\ssch\EventSubscriber;

use Drupal\vendor_stream_wrapper\Event\VendorStreamWrapperCollectSafeListRegexPatternsEvent;
use Drupal\vendor_stream_wrapper\Event\VendorStreamWrapperEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Provides safe-list patterns for vendor library highlight files.
 */
class ServerSidedCodeHighlightingEventSubscriber implements EventSubscriberInterface {

  /**
   * Sets the patterns for vendor files that should be publicly available.
   *
   * @param \Drupal\vendor_stream_wrapper\Event\VendorStreamWrapperCollectSafeListRegexPatternsEvent $event
   *   The event object storing the patterns for files/directories of the vendor
   *   directory that should be publicly accessible.
   */
  public function setSafeListRegexPatterns(VendorStreamWrapperCollectSafeListRegexPatternsEvent $event): void {
    $event->getVendorStreamWrapperManager()->addSafeListRegexPatterns([
      '/^scrivo\/highlight\.php\/styles\/.*\.(css|png|jpg)$/',
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      VendorStreamWrapperEvents::COLLECT_SAFE_LIST_REGEX_PATTERNS => 'setSafeListRegexPatterns',
    ];
  }

}
