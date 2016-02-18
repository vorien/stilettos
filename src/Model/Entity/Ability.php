<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ability Entity.
 *
 * @property float $id
 * @property string $name
 * @property string $type
 * @property string $duration
 * @property string $target
 * @property string $has_range
 * @property string $use_end
 * @property int $maneuver_id
 * @property \App\Model\Entity\Maneuver $maneuver
 * @property int $power_id
 * @property \App\Model\Entity\Power $power
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Display[] $displays
 */
class Ability extends Entity
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
