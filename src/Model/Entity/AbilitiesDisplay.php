<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AbilitiesDisplay Entity.
 *
 * @property float $id
 * @property int $ability_id
 * @property \App\Model\Entity\Ability $ability
 * @property int $display_id
 * @property \App\Model\Entity\Display $display
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class AbilitiesDisplay extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
