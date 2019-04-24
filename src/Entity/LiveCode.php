<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\FIeld\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Live Code entity.
 * 
 * @ingroup hello_world
 * 
 * @ContentEntityType(
 *   id = "live_code",
 *   label = @Translation("Live Code"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\LiveCodeViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\LiveCodeListBuilder",
 *      "access" = "Drupal\Core\Entity\LiveCodeAccessControlHandler",
 *      "views_data" = "Drupal\views\LiveCodeViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\LiveCodeForm",
 *          "add" = "Drupal\Core\Entity\LiveCodeForm",
 *          "edit" = "Drupal\Core\Entity\LiveCodeForm",
 *          "delete" = "Drupal\Core\Entity\LiveCodeDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "live_code",
 *   entity_keys = {
 *      "id" = "id",
 *      "nama_live_code" = "nama_live_code",
 *      "banyak_soal" = "banyak_soal",
 *      "bobot_nilai" = "bobot_nilai",
 *      "tanggal_pelaksanaan" = "tanggal_pelaksanaan",
 *      "mata_pelajaran" = "mata_pelajaran",
 *   },
 *   links = {
 *   },
 * )
 */
class LiveCode extends ContentEntityBase implements ContentEntityInterface {

    /**
     * {@inheritdoc}
     */
    public static function BaseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('id live code'))
            ->setReadOnly(TRUE);
        $fields['nama_live_code'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nama_live_code'))
            ->setDescription(t('nama live code'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -6,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string_textfield',
                'weight' => -6,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['banyak soal'] = BaseFieldDefinition::create('string')
            ->setLabel(t('banyak_soal'))
            ->setDescription(t('banyak soal live code'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 3,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string_textfield',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['bobot_nilai'] = BaseFieldDefinition::create('string')
            ->setLabel(t('bobot_nilai'))
            ->setDescription(t('bobot nilai live code'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 4,
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
        $fields['tanggal_pelaksanaan'] = BaseFieldDefinition::create('datetime')
            ->setLabel(t('tanggal_pelaksanaan'))
            ->setDescription(t('tanggal pelaksanaan live code'))
            ->setRevisionable(TRUE)
            ->setSettings([
                'datetime_type' => 'date'
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
        $fields['mata_pelajaran'] = BaseFieldDefinition::create('entity_reference')
            ->setLabel(t('mata_pelajaran'))
            ->setDescription(t('mata pelajaran live code'))
            ->setRevisionable(TRUE)
            ->setSetting('target_type', 'mata_pelajaran')
            ->setSetting('handler', 'default')
            ->setDisplayOptions('view', [
                'label' => 'hidden',
                'type' => 'author',
                'weight' => -2,
            ])
            ->setDisplayOptions('form', [
                'type' => 'entity_reference_autocomplete',
                'weight' => 5,
                'settings' => [
                    'match_operator' => 'CONTAINS',
                    'size' => 60,
                    'autocomplete_type' => 'tags',
                    'placeholder' => '',
                ],
            ])
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        return $fields;
    }
}
?>