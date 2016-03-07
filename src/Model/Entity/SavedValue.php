<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SavedValue Entity.
 *
 * @property int $id
 * @property string $type
 * @property string $class
 * @property float $value
 * @property int $saved_setting_id
 * @property \App\Model\Entity\SavedSetting $saved_setting
 * @property int $modifiers_id
 * @property \App\Model\Entity\Modifier $modifier
 * @property float $modifier_values_id
 * @property \App\Model\Entity\ModifierValue $modifier_value
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class SavedValue extends Entity
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
