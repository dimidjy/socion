<?php

namespace Drupal\socion;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class SocionTrait.
 */
trait SocionTrait {

  use StringTranslationTrait;

  /**
   * Get orientation options.
   */
  public function getSociotypes() {
    return [
      $this->t('ILE')->render() => $this->t('Don')->render(),
      $this->t('LII')->render() => $this->t('Rob')->render(),
      $this->t('ESE')->render() => $this->t('Gygo')->render(),
      $this->t('SEI')->render() => $this->t('Dyma')->render(),
      $this->t('SLE')->render() => $this->t('Jukov')->render(),
      $this->t('LSI')->render() => $this->t('Max')->render(),
      $this->t('EIE')->render() => $this->t('Gam')->render(),
      $this->t('IEI')->render() => $this->t('Esen')->render(),
      $this->t('LIE')->render() => $this->t('Jack')->render(),
      $this->t('ILI')->render() => $this->t('Bal')->render(),
      $this->t('SEE')->render() => $this->t('Nap')->render(),
      $this->t('ESI')->render() => $this->t('Dray')->render(),
      $this->t('LSE')->render() => $this->t('Shtir')->render(),
      $this->t('EII')->render() => $this->t('Dost')->render(),
      $this->t('IEE')->render() => $this->t('Gek')->render(),
      $this->t('SLI')->render() => $this->t('Gab')->render(),
    ];


  }
}
