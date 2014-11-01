<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\Field\FieldWidget\BarcodeDefaultWidget.
 */

namespace Drupal\barcode\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextfieldWidget;
use Drupal\Core\Form\FormStateInterface;

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
  public static function defaultSettings() {
    return array(
      'placeholder' => '',
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element['placeholder'] = array(
      '#type' => 'textfield',
      '#title' => t('Placeholder'),
      '#default_value' => $this->getSetting('placeholder'),
      '#description' => t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expected format.'),
    );
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = $element + array(
        '#type' => 'textfield',
        '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
        '#placeholder' => $this->getSetting('placeholder'),
      );
    return $element;
  }
}
