<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\field\formatter\BarcodeDefaultFormatter.
 */

namespace Drupal\barcode\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'barcode_default' formatter.
 *
 * @FieldFormatter(
 *   id = "barcode_default",
 *   label = @Translation("Default"),
 *   field_types = {
 *     "barcode",
 *   },
 * )
 */
class BarcodeDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#type' => 'text',
        '#text' => $item->value,
        '#langcode' => $item->getLangcode(),
      );
    }

    return $elements;
  }

}
