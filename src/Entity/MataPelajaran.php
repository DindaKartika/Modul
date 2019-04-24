<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Mata Pelajaran entity.
 * 
 * @ingroup hello_world
 * 
 * @ContentEntityType(
 *   id = "mata_pelajaran",
 *   label = @Translation("Mata Pelajaran"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\MataPelajaranViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\MataPelajaranListBuilder",
 *      "access" = "Drupal\Core\Entity\MataPelajaranAccessControlHandler",
 *      "views_data" = "Drupal\views\MataPelajaranViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\MataPelajaranForm",
 *          "add" = "Drupal\Core\Entity\MataPelajaranForm",
 *          "edit" = "Drupal\Core\Entity\MataPelajaranForm",
 *          "delete" = "Drupal\Core\Entity\MataPelajaranDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "mata_pelajaran",
 *   entity_keys = {
 *      "id" = "id",
 *      "mata_pelajaran" = "mata_pelajaran",
 *      "jadwal_dimulai" = "jadwal_dimulai",
 *      "jadwal_selesai" = "jadwal_selesai",
 *   },
 *   links = {
 *   },
 * )
 */
class MataPelajaran extends ContentEntityBase implements ContentEntityInterface {

    /**
     * {@inheritdoc}
     */
    public static function BaseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('ID Mata Pelajaran'))
            ->setReadOnly(TRUE);
        $fields['mata_pelajaran'] = BaseFieldDefinition::create('string')
            ->setLabel(t('mata_pelajaran'))
            ->setDescription(t('nama mata pelajaran'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 100,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -4,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string_textfield',
                'weight' => -4,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['jadwal_dimulai'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('jadwal_dimulai'))
            ->setDescription(t('waktu mata pelajaran dimulai'))
            ->setRevisionable(TRUE)
            ->setSettings([
                'datetime_type' =>'date'
            ])
            ->setDefaultValue('')
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'datetime_default',
                'settings' => [
                    'format_type' => 'medium'
                ],
                'weight' => -3,
            ])
            ->setDisplayOptions('form', [
                'type' => 'datetime_default',
                'weight' => -3,
            ])
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['jadwal_selesai'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('jadwal_selesai'))
            ->setDescription(t('waktu mata pelajaran diakhiri'))
            ->setRevisionable(TRUE)
            ->setSettings([
                'datetime_type' =>'date'
            ])
            ->setDefaultValue('')
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'datetime_default',
                'settings' => [
                    'format_type' => 'medium',
                ],
                'weight' => -2,
            ])
            ->setDisplayOptions('form', [
                'type' => 'datetime_default',
                'weight' => -2,
            ])
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        return $fields;
    }
}
?>