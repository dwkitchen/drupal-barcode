<?php
/**
 * @file
 * Contains \Drupal\barcode\Plugin\Barcode\BarcodeType\EAN.
 */

namespace Drupal\barcode\Plugin\Barcode\BarcodeType;

use Drupal\barcode\BarcodeTypeBase;

/**
 * Provides a 'EAN' barcode type.
 *
 * @BarcodeType(
 *   id = "ean",
 *   name = @Translation("EAN"),
 * )
 */
class EAN extends BarcodeTypeBase {

  /**
   * {@inheritdoc}
   */
  public function generateImage($barcode, $settings) {
    return array();
  }
}