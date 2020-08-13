<?php

namespace Drupal\socion;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Socionics type entity entity.
 *
 * @see \Drupal\socion\Entity\SocionicsTypeEntity.
 */
class SocionicsTypeEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\socion\Entity\SocionicsTypeEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished socionics type entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published socionics type entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit socionics type entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete socionics type entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add socionics type entity entities');
  }


}
