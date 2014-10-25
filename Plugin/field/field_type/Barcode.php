<?php

/**
 * @file
 * Contains \Drupal\barcode\Plugin\field\field_type\Barcode.
 */
 
 namespace Drupal\barcode\Plugin\field\field_type;
 
 use Drupal\field\Plugin\Type\FieldType\ConfigFieldItemBase;
 use Drupal\field\FieldInterface;
 
 /**
 * Plugin implementation of the 'Barcode' field type.
 *
 * @FieldType(
 *   id = "barcode",
 *   label = @Translation("Barcode"),
 *   description = @Translation("Barcode of various types"),
 *   default_widget = "string",
 *   default_formatter = "string"
 * )
 */
 class Barcode extends ConfigFieldItemBase {

 /**
   * {@inheritdoc}
   */
  public static function schema(FieldInterface $field) {
    return array(
      'columns' => array(
        'barcode' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => TRUE,
        ),
      ),
    );
  }
  
    /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('barcode')->getValue();
    return $value === NULL || $value === '';
  }
  
  /**
   * {@inheritdoc}
   */
  static $propertyDefinitions;
  /**
   * {@inheritdoc}
   */
  public function getPropertyDefinitions() {
    if (!isset(static::$propertyDefinitions)) {
      static::$propertyDefinitions['barcode'] = array(
        'type' => 'string',
        'label' => t('Barcode'),
      );
    }
    return static::$propertyDefinitions;
  }
}
