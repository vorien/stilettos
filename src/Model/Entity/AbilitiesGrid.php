<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AbilitiesGrid Entity.
 *
 * @property float $abilities_id
 * @property string $abilities_name
 * @property string $abilities_type
 * @property string $abilities_duration
 * @property string $abilities_target
 * @property string $abilities_has_range
 * @property string $abilities_use_end
 * @property int $abilities_maneuver_id
 * @property int $abilities_power_id
 * @property float $displays_id
 * @property string $displays_name
 * @property bool $displays_power
 * @property float $modifiers_id
 * @property string $modifiers_name
 * @property int $modifiers_locklevel
 * @property bool $modifiers_required
 * @property int $modifiers_display_id
 * @property int $modifiers_display_order
 * @property int $modifiers_modifier_class_id
 * @property int $modifiers_modifier_type_id
 * @property float $modifier_classes_id
 * @property string $modifier_classes_name
 * @property int $modifier_classes_display_order
 * @property float $modifier_types_id
 * @property string $modifier_types_name
 * @property float $modifier_values_id
 * @property string $modifier_values_name
 * @property int $modifier_values_locklevel
 * @property float $modifier_values_value
 * @property bool $modifier_values_required
 * @property int $modifier_values_modifier_id
 * @property \Abilities\Model\Entity\Maneuver $maneuver
 * @property \Abilities\Model\Entity\Power $power
 * @property \Modifiers\Model\Entity\Display $display
 * @property \Modifiers\Model\Entity\ModifierClass $modifier_class
 * @property \Modifiers\Model\Entity\ModifierType $modifier_type
 * @property \ModifierValues\Model\Entity\Modifier $modifier
 */
class AbilitiesGrid extends Entity
{

}
