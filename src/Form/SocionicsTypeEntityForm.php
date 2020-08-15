<?php

namespace Drupal\socion\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\socion\SocionTrait;

/**
 * Form controller for Socionics type entity edit forms.
 *
 * @ingroup socion
 */
class SocionicsTypeEntityForm extends ContentEntityForm {

  use SocionTrait;
  /**
   * The current user account.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $account;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    $instance = parent::create($container);
    $instance->account = $container->get('current_user');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var \Drupal\socion\Entity\SocionicsTypeEntity $entity */

    $form['#attached']['library'][] = 'socion/socion_chart';
    $form['#attached']['library'][] = 'socion/socion_chart_plugin';


    $form['chart'] = [
      '#type' => 'chartjs_api',
      '#id' => 'socio_chart',
      '#graph_type' => 'bar',
      '#plugins' => ['socion_chart_plugin'],
      '#data' => [
        'labels' => array_values($this->getSociotypes()),
        'datasets' => [
          [
            'label' => 'Sociotypes',
            'data' => [12,12,12,180, 12,12,12,12,12,12,12,21,21,12,12,12],
            'backgroundColor' => ['#00557f', '#00557f', '#00557f'],
            'hoverBackgroundColor' => ['#004060', '#004060', '#004060'],
          ]
        ],
      ],
    ];
    $form = parent::buildForm($form, $form_state);
    $this->getAspectsFields($form);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Socionics type entity.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Socionics type entity.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.socionics_type_entity.canonical', ['socionics_type_entity' => $entity->id()]);
  }

  protected function getAspectsFields(array &$form){
    $i = 0;
    foreach ($form as $key => &$form_element ){

      if(substr( $key , 0 , strlen("field_")) == "field_"){
        $form["$key"]["#attributes"]["id"][] = "aspect-".$i;
        $i++;
      }
    }
  }
}
