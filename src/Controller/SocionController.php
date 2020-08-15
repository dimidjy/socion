<?php

namespace Drupal\socion\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SocionController.
 */
class SocionController extends ControllerBase {

  /**
   * Show.
   *
   * @return string
   *   Return Hello string.
   */
  public function show() {
    $elements = array();

    $elements[] = [
      '#type' => 'chartjs_api',
      '#id' => 'socio_chart',
      '#graph_type' => 'line'
    ];
    return $elements;
  }

}
