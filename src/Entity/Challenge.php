<?php

namespace Drupal\hello_world\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Challenge entity.
 * 
 * @ingroup hello_world
 * 
 * @ContentEntityType(
 *   id = "challenge",
 *   label = @Translation("Challenge"),
 *   handlers = {
 *      "view_builder" = "Drupal\Core\Entity\ChallengeViewBuilder",
 *      "list_builder" = "Drupal\Core\Entity\ChallengeListBuilder",
 *      "access" = "Drupal\Core\Entity\ChallengeAccessControlHandler",
 *      "views_data" = "Drupal\views\ChallengeViewsData",
 *      "form" = {
 *          "default" = "Drupal\Core\Entity\ChallengeForm",
 *          "add" = "Drupal\Core\Entity\ChallengeForm",
 *          "edit" = "Drupal\Core\Entity\ChallengeForm",
 *          "delete" = "Drupal\Core\Entity\ChallengeDeleteForm",
 *      },
 *      "route_provider" = {
 *      },
 *   },
 *   base_table = "challenge",
 *   entity_keys = {
 *      "id" = "id",
 *      "nama_challenge" = "nama_challenge",
 *      "banyak_soal" = "banyak_soal",
 *      "bobot_nilai" = "bobot_nilai",
 *      "mata_pelajaran" = "mata_pelajaran",
 *   },
 *   links = {
 *   },
 * )
 */
class Challenge extends ContentEntityBase implements ContentEntityInterface {

    /**
     * {@inheritdoc}
     */
    public static function BaseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('ID Challenge'))
            ->setReadOnly(TRUE);
        $fields['nama_challenge'] = BaseFieldDefinition::create('string')
            ->setLabel(t('nama_challenge'))
            ->setDescription(t('nama challenge'))
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
        $fields['banyak_soal'] = BaseFieldDefinition::create('string')
            ->setLabel(t('banyak_soal'))
            ->setDescription(t('jumlah soal challenge'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 3,
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
            ->setDisplayConfigurable('form', TRUE);
        $fields['bobot_nilai'] = BaseFieldDefinition::create('string')
            ->setLabel(t('bobot_nilai'))
            ->setDescription(t('bobot nilai challenge'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 4,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -3,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -3,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['mata_pelajaran'] = BaseFieldDefinition::create('entity_reference')
            ->setLabel(t('mata_pelajaran'))
            ->setDescription(t('mata pelajaran challenge'))
            ->setRevisionable(TRUE)
            ->setSetting('target_type', 'mata_pelajaran')
            ->setSetting('handler', 'default')
            ->setTranslatable(TRUE)
            ->setDisplayOptions('view', array(
                'label' => 'hidden',
                'type' => 'author',
                'weight' => -2,
            ))
            ->setDisplayOptions('form', [
                'type' => 'entity_reference_autocomplete',
                'weight' => 5,
                'settings' => [
                    'match_operator' => 'CONTAINS',
                    'size' => '60',
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