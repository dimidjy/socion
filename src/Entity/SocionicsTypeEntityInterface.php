<?php

namespace Drupal\socion\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Socionics type entity entities.
 *
 * @ingroup socion
 */
interface SocionicsTypeEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */
  
  /**
   * Gets the Socionics type entity name.
   *
   * @return string
   *   Name of the Socionics type entity.
   */
  public function getName();

  /**
   * Sets the Socionics type entity name.
   *
   * @param string $name
   *   The Socionics type entity name.
   *
   * @return \Drupal\socion\Entity\SocionicsTypeEntityInterface
   *   The called Socionics type entity entity.
   */
  public function setName($name);

  /**
   * Gets the Socionics type entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Socionics type entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Socionics type entity creation timestamp.
   *
   * @param int $timestamp
   *   The Socionics type entity creation timestamp.
   *
   * @return \Drupal\socion\Entity\SocionicsTypeEntityInterface
   *   The called Socionics type entity entity.
   */
  public function setCreatedTime($timestamp);

}
