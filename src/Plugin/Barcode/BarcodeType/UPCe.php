<?php
/**
 * @file
 * Contains \Drupal\barcode\Plugin\Barcode\BarcodeType\UPCe.
 */

namespace Drupal\barcode\Plugin\Barcode\BarcodeType;

use Drupal\barcode\BarcodeTypeBase;

/**
 * Provides a 'UPCe' barcode type.
 *
 * @BarcodeType(
 *   id = "upce",
 *   name = @Translation("UPCe"),
 * )
 */
class UPCe extends BarcodeTypeBase {

  /**
   * {@inheritdoc}
   */
  public function getImage($barcode, $settings) {
    return array();
  }
}