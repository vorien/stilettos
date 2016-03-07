<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SavedSetting Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $base_cost
 * @property int $active_cost
 * @property int $endurance_cost
 * @property int $real_cost
 * @property int $penalty_cost
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\SavedValue[] $saved_values
 */
class SavedSetting extends Entity
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
