<?php

namespace Drupal\socion\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Serialization\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class SociotypesDataController.
 */
class SociotypesDataController {

  /**
   * Callback for the API.
   */
  public function renderApi() {
    return new JsonResponse([
      'data' => $this->getResultsFromJson(),
      'method' => 'GET',
    ]);
  }

    /**
     * A helper function returning results.
     */
  public function getResultsFromJson() {
      $module_handler = \Drupal::service('module_handler');
      $module_path = $module_handler->getModule('socion')->getPath();
      $json_data_path = $module_path ."/json/sociotypes_data.json";

      $json_data_path = Json::decode(file_get_contents($json_data_path));

      return $json_data_path;
    }
}
