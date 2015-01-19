<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\Field\FieldWidget\BarcodeDefaultWidget.
 */

namespace Drupal\barcode\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
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
class BarcodeDefaultWidget extends WidgetBase {
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
  public function settingsSummary() {
    $summary = array();

    $placeholder = $this->getSetting('placeholder');
    if (!empty($placeholder)) {
      $summary[] = t('Placeholder: @placeholder', array('@placeholder' => $placeholder));
    }
    else {
      $summary[] = t('No placeholder');
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = array(
      '#type' => 'textfield',
      '#title' => $element['#title'],
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
      '#placeholder' => $this->getSetting('placeholder'),
    );
    $manager = \Drupal::service('plugin.manager.barcode.barcode_type');
    $encoding_options = $manager->listOptions();
    $element['encoding'] = array(
      '#type' => 'select',
      '#title' => $this->t('Encoding'),
      '#default_value' => isset($items[$delta]->encoding) ? $items[$delta]->encoding : NULL,
      '#options' => $encoding_options,
      '#title_display' => 'invisible'
    );
    return $element;
  }
}
