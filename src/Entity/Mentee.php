<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Mentee entity.
 * 
 * @ingroup hello_world
 * 
 * @ContentEntityType(
 *   id = "mentee",
 *   label = @Translation("Mentee"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\MenteeViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\MenteeListBuilder",
 *      "access" = "Drupal\Core\Entity\MenteeAccessControlHandler",
 *      "views_data" = "Drupal\views\MenteeViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\MenteeForm",
 *          "add" = "Drupal\Core\Entity\MenteeForm",
 *          "edit" = "Drupal\Core\Entity\MenteeForm",
 *          "delete" = "Drupal\Core\Entity\MenteeDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "mentee",
 *   entity_keys = {
 *      "id" = "id",
 *      "label" = "name",
 *      "uuid" = "uuid",
 *      "uid" = "user_id",
 *      "langcode" = "langcode",
 *      "status" = "status",
 *   },
 *   links = { 
 *   },
 * )
 */
class Mentee extends ContentEntityBase implements ContentEntityInterface {

    /**
     * {@inheritdoc}
     */
    public static function BaseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['id_mentee'] = BaseFieldDefinition::create('string')
            ->setLabel(t('ID'))
            ->setDescription(t('The id of mentee.'))
            // ->setReadOnly(TRUE);
            ->setSettings(array(
                'max_length' => 4,
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
        $fields['nama_lengkap'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nama_lengkap'))
            ->setDescription(t('nama lengkap mentee'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
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
        $fields['telepon'] = BaseFieldDefinition::create('string')
            ->setLabel(t('telepon'))
            ->setDescription(t('telepon mentee'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 25,
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
        $fields['absen'] = BaseFieldDefinition::create('string')
            ->setLabel(t('absen'))
            ->setDescription(t('absen mentee'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 3,
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
        $fields['nilai_rata2'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nilai_rata2'))
            ->setDescription(t('absen mentee'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 3,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -2,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string_textfield',
                'weight' => -2,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        return $fields;
    }
}
?>