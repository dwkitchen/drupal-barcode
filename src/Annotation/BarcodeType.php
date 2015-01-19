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
 * Plugin Namespace: Plugin\Barcode\BarcodeType
 *
 * @see \Drupal\barcode\BarcodeTypeManager
 * @see plugin_api
 *
 * @Annotation
 */
class BarcodeType extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The name of the barcode type.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

}