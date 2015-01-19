<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\Field\FieldType\BarcodeItem.
 */

namespace Drupal\barcode\Plugin\Field\FieldType;

use Drupal\barcode\BarcodeItemInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'Barcode' field type.
 *
 * @FieldType(
 *   id = "barcode",
 *   label = @Translation("Barcode"),
 *   description = @Translation("Barcode of various types"),
 *   default_widget = "barcode_default",
 *   default_formatter = "barcode_default"
 * )
 */
class BarcodeItem extends FieldItemBase implements BarcodeItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
        'encoding' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Barcode'));
    $properties['encoding'] = DataDefinition::create('string')
      ->setLabel(t('Encoding'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints = parent::getConstraints();

    $max_length = 256;
    $constraints[] = $constraint_manager->create('ComplexData', array(
      'value' => array(
        'Length' => array(
          'max' => $max_length,
          'maxMessage' => t('%name: the barcode may not be longer than @max characters.', array('%name' => $this->getFieldDefinition()->getLabel(), '@max' => $max_length)),
        )
      ),
    ));

    return $constraints;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {
    $values['value'] = rand(pow(10, 8), pow(10, 9)-1);
    return $values;
  }

  /**
   * {@inheritdoc}
   */
  public function getImage($settings) {
    $filename = $this->fileName($settings);

    // If the file doesn't exist generate it.
    if (!file_exists($filename)) {
      $this->generateImage($settings);
    }

    // If the file still doesn't exist return false.
    if (!file_exists($filename)) {
      return FALSE;
    }

    // Return the filename
    return $filename;
  }

  protected function generateImage($settings) {
    $filename = $this->fileName($settings);
    $value = $this->get('value')->getValue();
    $encoding = $this->getValue('encoding')->getValue();

    $manager = \Drupal::service('plugin.manager.barcode.barcode_type');
    $barcodeType = $manager->get($encoding);

    $image = $barcodeType->generateImage($value, $settings);

    file_save_data($image, $filename);

  }

  protected function fileName($settings) {
    $value = $this->get('value')->getValue();
    $encoding = $this->getValue('encoding')->getValue();

    $name = md5($value);

    return $name . $encoding . '.' . $settings['image_format'];
  }
}
