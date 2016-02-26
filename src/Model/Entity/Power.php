<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Power Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $sort_order
 * @property int $lock_level
 * @property string $type
 * @property string $duration
 * @property string $target
 * @property string $has_range
 * @property string $use_end
 * @property int $maneuver_id
 * @property \App\Model\Entity\Maneuver $maneuver
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Target[] $targets
 */
class Power extends Entity
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
