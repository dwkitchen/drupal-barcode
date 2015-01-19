<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\field\formatter\BarcodeJSFormatter.
 */

namespace Drupal\barcode\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\barcode\BarcodeItemInterface;

/**
 * Plugin implementation of the 'barcode_default' formatter.
 *
 * @FieldFormatter(
 *   id = "barcode_js",
 *   label = @Translation("JS Image"),
 *   field_types = {
 *     "barcode",
 *   },
 * )
 */
class BarcodeJSFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'height' => '40',
      'scale' => '2',
      'bgcolor' => '#FFFFFF',
      'barcolor' => '#000000',
      'image_format' => 'png',
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements['height'] = array(
      '#title' => t('Height'),
      '#description' => t('Integer! in order to scan the printed barcode, the suggested height is 40'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('height'),
      '#size' => 2,
      '#required' => TRUE,
    );
    $elements['scale'] = array(
      '#title' => t('Scale'),
      '#description' => t('Float! in order to scan the printed barcode, the suggested height is 2.0'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('scale'),
      '#size' => 2,
      '#required' => TRUE,
    );
    $elements['bgcolor'] = array(
      '#title' => t('Background color'),
      '#description' => t('Hex value'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('bgcolor'),
      '#size' => 8,
      '#required' => TRUE,
    );
    $elements['barcolor'] = array(
      '#title' => t('Bar color'),
      '#description' => t('Hex value'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('barcolor'),
      '#size' => 8,
      '#required' => TRUE,
    );
    $elements['image_format'] = array(
      '#title' => t('Image format'),
      '#description' => t('The image format used for generated barcodes. Supported formats: png, gif, jpg.'),
      '#type' => 'select',
      '#default_value' => $this->getSetting('image_format'),
      '#options' => array('png' => 'png', 'jpg' => 'jpg', 'gif' => 'gif'),
      '#maxlength' => 4,
      '#required' => TRUE,
    );
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    $settings = $this->getSettings();
    $summary[] = t('Barcode image');
    $summary[] = t('Format: @format', array('@format' => $settings['image_format']));
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();
    $settings = $this->getSettings();
    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#type' => 'image',
        '#url' => $item->getImage($settings),
      );
    }

    return $elements;
  }

}
