<?php

namespace Drupal\socion\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Socionics type entity entities.
 */
class SocionicsTypeEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
