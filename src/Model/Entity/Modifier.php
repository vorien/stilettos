<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modifier Entity.
 *
 * @property float $id
 * @property string $name
 * @property int $locklevel
 * @property bool $required
 * @property int $display_id
 * @property \App\Model\Entity\Display $display
 * @property int $modifier_class_id
 * @property \App\Model\Entity\ModifierClass $modifier_class
 * @property int $modifier_type_id
 * @property \App\Model\Entity\ModifierType $modifier_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ModifierValue[] $modifier_values
 */
class Modifier extends Entity
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
