<?php

namespace Drupal\alta\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Direksi entity.
 *
 * @ingroup alta
 *
 * @ContentEntityType(
 *   id = "direksi",
 *   label = @Translation("Direksi"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\alta\DireksiListBuilder",
 *     "views_data" = "Drupal\alta\Entity\DireksiViewsData",
 *     "translation" = "Drupal\alta\DireksiTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\alta\Form\DireksiForm",
 *       "add" = "Drupal\alta\Form\DireksiForm",
 *       "edit" = "Drupal\alta\Form\DireksiForm",
 *       "delete" = "Drupal\alta\Form\DireksiDeleteForm",
 *     },
 *     "access" = "Drupal\alta\DireksiAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\alta\DireksiHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "direksi_new",
 *   data_table = "direksi_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer direksi entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "telepon" = "telepon",
 *     "jabatan" = "jabatan",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/direksi/{direksi}",
 *     "add-form" = "/admin/structure/direksi/add",
 *     "edit-form" = "/admin/structure/direksi/{direksi}/edit",
 *     "delete-form" = "/admin/structure/direksi/{direksi}/delete",
 *     "collection" = "/admin/structure/direksi",
 *   },
 *   field_ui_base_route = "direksi.settings"
 * )
 */
class Direksi extends ContentEntityBase implements DireksiInterface {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTelepon() {
    return $this->get('telepon')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTelepon($telepon) {
    $this->set('telepon', $telepon);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getJabatan() {
    return $this->get('jabatan')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setJabatan($jabatan) {
    $this->set('jabatan', $jabatan);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('id direksi'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Direksi entity.'))
      ->setSettings([
        // 'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['telepon'] = BaseFieldDefinition::create('string')
      ->setLabel(t('telepon'))
      ->setDescription(t('Telepon direksi'))
      ->setSettings(array(
          'default_value' => '',
          'max_length' => 25,
          'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
          'label' => 'above',
          'type' => 'string',
          'weight' => -3,
      ))
      ->setDisplayOptions('form', array(
          'type' => 'string_textfield',
          'weight' => -3,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

  $fields['jabatan']=BaseFieldDefinition::create('string')
      ->setLabel(t('jabatan'))
      ->setDescription(t('Jabatan direksi'))
      ->setSettings(array(
          'default_value' => '',
          'max_length' => 50,
          'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
          'label' => 'above',
          'type' => 'string',
          'weight' => -2,
      ))
      ->setDisplayOptions('form', array(
          'type' => 'string_textfield',
          'weight' => -2
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
