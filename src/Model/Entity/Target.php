<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Target Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $sort_order
 * @property int $power_id
 * @property \App\Model\Entity\Power $power
 * @property int $parent_id
 * @property \App\Model\Entity\Target $parent_target
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\SavedValue[] $saved_values
 * @property \App\Model\Entity\Section[] $sections
 * @property \App\Model\Entity\Target[] $child_targets
 */
class Target extends Entity
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
