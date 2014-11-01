<?php
/**
 * @file
 * Provides Drupal\barcode\BarcodeTypeBase.
 */

namespace Drupal\barcode;

use Drupal\Component\Plugin\PluginBase;

class BarcodeTypeBase extends PluginBase implements BarcodeTypeInterface {

  public function getName() {
    return $this->pluginDefinition['name'];
  }

  public function getImage() {

  }

  private function generateImage() {}

  public function checkDigit() {}
}
