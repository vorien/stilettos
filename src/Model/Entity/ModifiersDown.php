<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModifiersDown Entity.
 *
 * @property int $Modifiers__id
 * @property \App\Model\Entity\Modifiers $modifiers
 * @property string $Modifiers__name
 * @property float $Modifiers__lock_level_modifier
 * @property int $Modifiers__sort_order
 * @property int $Modifiers__display_id
 * @property \App\Model\Entity\ModifiersDisplay $modifiers_display
 * @property int $Modifiers__default_input_value
 * @property int $Modifiers__modifier_class_id
 * @property \App\Model\Entity\ModifiersModifierClass $modifiers_modifier_class
 * @property int $Modifiers__modifier_type_id
 * @property \App\Model\Entity\ModifiersModifierType $modifiers_modifier_type
 * @property int $ModifierClasses__id
 * @property \App\Model\Entity\ModifierClasses $modifier_classes
 * @property string $ModifierClasses__name
 * @property int $ModifierClasses__sort_order
 * @property int $ModifierTypes__id
 * @property \App\Model\Entity\ModifierTypes $modifier_types
 * @property string $ModifierTypes__name
 * @property int $Displays__id
 * @property \App\Model\Entity\Displays $displays
 * @property string $Displays__name
 * @property int $ModifierValues__id
 * @property \App\Model\Entity\ModifierValues $modifier_values
 * @property string $ModifierValues__name
 * @property int $ModifierValues__lock_level_requirement
 * @property float $ModifierValues__value
 * @property int $ModifierValues__is_default
 * @property int $ModifierValues__sort_order
 * @property int $ModifierValues__modifier_id
 * @property \App\Model\Entity\ModifierValuesModifier $modifier_values_modifier
 */
class ModifiersDown extends Entity
{

}
