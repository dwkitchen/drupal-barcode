<?php
/**
 * @file
 * Contains BarcodeTypeManager.
 */

namespace Drupal\barcode;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Barcode plugin manager.
 */
class BarcodeTypeManager extends DefaultPluginManager {

  /**
   * Constructs an BarcodeManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations,
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/BarcodeType', $namespaces, $module_handler, 'Drupal\barcode\BarcodeTypeInterface', 'Drupal\barcode\Annotation\BarcodeType');

    $this->alterInfo('barcode_type_info');
    $this->setCacheBackend($cache_backend, 'barcode_types');
  }
}