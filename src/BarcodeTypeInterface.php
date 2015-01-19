<?php
/**
 * @file
 * Provides Drupal\barcode\BarcodeTypeInterface
 */

namespace Drupal\barcode;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Barcode Type plugins.
 */
interface BarcodeTypeInterface extends PluginInspectionInterface {

  /**
   * Return the name of the barcode type.
   *
   * @return string
   */
  public function getName();

  /**
   * Returns the image version of the barcode.
   *
   * @param $barcode string
   *  The text of the barcode
   * @param $settings array
   *  The image settings
   * @return file
   *  binary of the image
   */
  public function generateImage($barcode, $settings);


}