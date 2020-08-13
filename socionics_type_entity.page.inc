<?php

/**
 * @file
 * Contains socionics_type_entity.page.inc.
 *
 * Page callback for Socionics type entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Socionics type entity templates.
 *
 * Default template: socionics_type_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_socionics_type_entity(array &$variables) {
  // Fetch SocionicsTypeEntity Entity Object.
  $socionics_type_entity = $variables['elements']['#socionics_type_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
