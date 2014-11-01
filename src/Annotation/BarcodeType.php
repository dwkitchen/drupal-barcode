<?php
/**
 * @file
 * Contains \Drupal\barcode\Annotation\BarcodeType.
 */

namespace Drupal\barcode\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a barcode item annotation object.
 *
 * Plugin Namespace: Plugin\barcode\BarcodeType
 *
 * @see \Drupal\barcode\Plugin\BarcodeTypeManager
 * @see plugin_api
 *
 * @Annotation
 */
class Barcode extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The name of the barcode.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

}