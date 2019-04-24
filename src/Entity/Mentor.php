<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Mentor entity.
 * 
 * @ingroup hello_world
 * 
 * @ContentEntityType(
 *   id = "mentor",
 *   label = @Translation("Mentor"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\MentorViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\MentorListBuilder",
 *      "access" = "Drupal\Core\Entity\MentorAccessControlHandler",
 *      "views_data" = "Drupal\views\MentorViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\MentorForm",
 *          "add" = "Drupal\Core\Entity\MentorForm",
 *          "edit" = "Drupal\Core\Entity\MentorForm",
 *          "delete" = "Drupal\Core\Entity\MentorDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "mentor",
 *   entity_keys = {
 *      "id" = "id",
 *      "nama_lengkap" = "nama_lengkap",
 *      "telepon" = "telepon",
 *      "mata_pelajaran" = "mata_pelajaran",
 *   },
 *   links = {
 *   },
 * )
 */
class Mentor extends ContentEntityBase implements ContentEntityInterface {

    public static function BaseFieldDefinition(EntityTypeInterface $entity_type) {
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('ID Mentor'))
            ->setReadOnly(TRUE);
        $fields['nama_lengkap'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nama_lengkap'))
            ->setDescription(t('nama lengkap mentor'))
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
            ->setDescription(t('telepon mentor'))
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
            ->setDisplayCOnfigurable('view', TRUE);
        $fields['mata_pelajaran'] = BaseFieldDefinition::create('entity_reference')
            ->setLabel(t('mata_pelajaran'))
            ->setDescription(t('mata pelajaran mentor'))
            ->setRevisionable(TRUE)
            ->setSetting('target_type', 'mata_pelajaran')
            ->setSetting('handler', 'default')
            ->setTranslatable(TRUE)
            ->setDisplayOptions('view', array(
                'label' => 'hidden',
                'type' => 'author',
                'weight' => -2,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'entity_reference_autocomplete',
                'weight' => 5,
                'settings' => [
                    'match_operator' => 'CONTAINS',
                    'size' => '60',
                    'autocomplete_type' => 'tags',
                    'placeholder' => '',
                ]
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        return $field;
    }
}
?>
