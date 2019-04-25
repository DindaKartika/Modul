<?php

namespace Drupal\alta\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface for defining Direksi entities.
 *
 * @ingroup alta
 */
interface DireksiInterface extends ContentEntityInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Direksi name.
   *
   * @return string
   *   Name of the Direksi.
   */
  public function getName();

  /**
   * Sets the Direksi name.
   *
   * @param string $name
   *   The Direksi name.
   *
   * @return \Drupal\alta\Entity\DireksiInterface
   *   The called Direksi entity.
   */
  public function setName($name);

  /**
   * Gets the Telepon direksi.
   *
   * @return string
   *   Telepon direksi.
   */
  public function getTelepon();

  /**
   * Sets the Telepon direksi.
   *
   * @param string $telepon
   *   Telepon direksi.
   *
   * @return \Drupal\alta\Entity\DireksiInterface
   *   The called Direksi entity.
   */
  public function setTelepon($telepon);

  /**
   * Gets the Jabatan direksi.
   *
   * @return string
   *   Jabatan direksi.
   */
  public function getJabatan();

  /**
   * Sets the Jabatan direksi.
   *
   * @param string $name
   *   Jabatan direksi.
   *
   * @return \Drupal\alta\Entity\DireksiInterface
   *   The called Direksi entity.
   */
  public function setJabatan($jabatan);

}
