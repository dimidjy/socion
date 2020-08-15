<?php

namespace Drupal\socion\Plugin\Field\FieldFormatter;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'socionics_aspect_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "socionics_aspect_field_formatter",
 *   label = @Translation("Socionics aspect field formatter"),
 *   field_types = {
 *     "socionics_aspect_field_type"
 *   }
 * )
 */
class SocionicsAspectFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'addidtional_aspect' => false
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      'addidtional_aspect' => array(
        '#type' => 'checkbox',
        '#title' => t('It`s addidtional aspect'),
        '#default_value' => $this->getSetting('addidtional_aspect'),
      ),

    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();
    $summary[] = t('It`s addidtional aspect: @addidtional_aspect.', array('@addidtional_aspect' => $settings['addidtional_aspect']));
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = array();
    $settings = $this->getSettings();

    foreach ($items as $delta => $item) {
      $value = $item->value;
      // Render each element as markup.
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => new FormattableMarkup(
          '<div><p>@value</p></div>',
          [
            '@value' => $value,
          ]
        ),
      ];
    }

    return $element;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    return nl2br(Html::escape($item->value));
  }

}
