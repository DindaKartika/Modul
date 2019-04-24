<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Direksi entity.
 *
 * @ingroup hello_world
 *
 * @ContentEntityType(
 *   id = "direksis",
 *   label = @Translation("Direksis"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\DireksisViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\DireksisListBuilder",
 *      "access" = "Drupal\Core\Entity\DireksisAccessControlHandler",
 *      "views_data" = "Drupal\views\DireksisViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\DireksisForm",
 *          "add" = "Drupal\Core\Entity\DireksisForm",
 *          "edit" = "Drupal\Core\Entity\DireksisForm",
 *          "delete" = "Drupal\Core\Entity\DireksisDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "direksis",
 *   entity_keys = {
 *     "id" = "id",
 *     "nama_lengkap" = "nama_lengkap",
 *     "telepon" = "telepon",
 *     "jabatan" = "jabatan",
 *   },
 *  links = { 
 *  },
 * )
 */
class Direksis extends ContentEntityBase implements ContentEntityInterface {

    /**
     * {@inheritdoc}
     */
    public static function BaseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('ID Direksi'))
            ->setReadOnly(TRUE);
        $fields['nama_lengkap'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nama_lengkap'))
            ->setDescription(t('Nama Lengkap Direksi'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
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
?>