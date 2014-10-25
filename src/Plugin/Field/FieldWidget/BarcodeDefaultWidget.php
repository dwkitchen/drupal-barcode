<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\Field\FieldWidget\BarcodeDefaultWidget.
 */

namespace Drupal\barcode\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextfieldWidget;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Plugin implementation of the 'barcode' widget.
 *
 * @FieldWidget(
 *   id = "barcode_default",
 *   label = @Translation("Barcode"),
 *   field_types = {
 *     "barcode"
 *   },
 * )
 */
class BarcodeDefaultWidget extends StringTextfieldWidget {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $main_widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $element = $main_widget['value'];
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state) {
    return $element;
  }
}
