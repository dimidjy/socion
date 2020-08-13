<?php

namespace Drupal\socion\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SocionicsTypeEntityTypeForm.
 */
class SocionicsTypeEntityTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $socionics_type_entity_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $socionics_type_entity_type->label(),
      '#description' => $this->t("Label for the Socionics type entity type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $socionics_type_entity_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\socion\Entity\SocionicsTypeEntityType::load',
      ],
      '#disabled' => !$socionics_type_entity_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $socionics_type_entity_type = $this->entity;
    $status = $socionics_type_entity_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Socionics type entity type.', [
          '%label' => $socionics_type_entity_type->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Socionics type entity type.', [
          '%label' => $socionics_type_entity_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($socionics_type_entity_type->toUrl('collection'));
  }

}
