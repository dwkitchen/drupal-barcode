<?php

/**
 * @file
 * Contains \Drupal\barcode\BarcodeItemInterface.
 */

namespace Drupal\barcode;

use Drupal\Core\Field\FieldItemInterface;

/**
 * Defines an interface for the link field item.
 */
interface BarcodeItemInterface extends FieldItemInterface {

  /**
   * Get the barcode image file or generate it if it does not already exist..
   *
   * @param $settings array
   * @return mixed
   */
  public function getImage($settings);

}