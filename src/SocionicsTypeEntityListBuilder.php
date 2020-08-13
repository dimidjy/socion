<?php

namespace Drupal\socion;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Socionics type entity entities.
 *
 * @ingroup socion
 */
class SocionicsTypeEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Socionics type entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\socion\Entity\SocionicsTypeEntity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.socionics_type_entity.edit_form',
      ['socionics_type_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
