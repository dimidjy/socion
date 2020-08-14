<?php

namespace Drupal\socion\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\NumericItemBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'socionics_aspect_field_type' field type.
 *
 * @FieldType(
 *   id = "socionics_aspect_field_type",
 *   label = @Translation("Aspect"),
 *   description = @Translation("Socionics aspect field type"),
 *   category = @Translation("Socionics"),
 *   default_widget = "socionics_aspect_field_widget",
 *   default_formatter = "socionics_aspect_field_formatter"
 * )
 */

class SocionicsAspectFieldType extends NumericItemBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return [
        'unsigned' => FALSE,
        'size' => 'big',
      ] + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
        'min' => '-100',
        'max' => '100',
        'prefix' => '',
        'suffix' => '',
      ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('integer')
      ->setLabel(t('Integer value'))
      ->addConstraint('Range', ['min' => -100, 'max' => 100])
      ->setRequired(FALSE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'int',
          // Expose the 'unsigned' setting in the field item schema.
          'unsigned' => $field_definition->getSetting('unsigned'),
          // Expose the 'size' setting in the field item schema. For instance,
          // supply 'big' as a value to produce a 'bigint' type.
          'size' => $field_definition->getSetting('size'),
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data) {
    $elements = [];

    $elements['max_length'] = [
      '#type' => 'number',
      '#title' => t('Maximum length'),
      '#default_value' => $this->getSetting('max_length'),
      '#required' => TRUE,
      '#description' => t('The maximum length of the field in characters.'),
      '#min' => -100,
      '#max' => 100,
      '#disabled' => $has_data,
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

}
