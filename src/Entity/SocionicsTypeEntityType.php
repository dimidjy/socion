<?php

namespace Drupal\socion\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Socionics type entity type entity.
 *
 * @ConfigEntityType(
 *   id = "socionics_type_entity_type",
 *   label = @Translation("Socionics type entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\socion\SocionicsTypeEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\socion\Form\SocionicsTypeEntityTypeForm",
 *       "edit" = "Drupal\socion\Form\SocionicsTypeEntityTypeForm",
 *       "delete" = "Drupal\socion\Form\SocionicsTypeEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\socion\SocionicsTypeEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "socionics_type_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "socionics_type_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/socionics_type_entity_type/{socionics_type_entity_type}",
 *     "add-form" = "/admin/structure/socionics_type_entity_type/add",
 *     "edit-form" = "/admin/structure/socionics_type_entity_type/{socionics_type_entity_type}/edit",
 *     "delete-form" = "/admin/structure/socionics_type_entity_type/{socionics_type_entity_type}/delete",
 *     "collection" = "/admin/structure/socionics_type_entity_type"
 *   }
 * )
 */
class SocionicsTypeEntityType extends ConfigEntityBundleBase implements SocionicsTypeEntityTypeInterface {

  /**
   * The Socionics type entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Socionics type entity type label.
   *
   * @var string
   */
  protected $label;

}
