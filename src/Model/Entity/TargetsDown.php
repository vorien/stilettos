<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TargetsDown Entity.
 *
 * @property int $Targets__id
 * @property \App\Model\Entity\Targets $targets
 * @property string $Targets__name
 * @property int $Targets__sort_order
 * @property int $Targets__power_id
 * @property \App\Model\Entity\TargetsPower $targets_power
 * @property int $Targets__parent_id
 * @property \App\Model\Entity\TargetsParent $targets_parent
 * @property int $Targets__lft
 * @property int $Targets__rght
 * @property \Cake\I18n\Time $Targets__created
 * @property \Cake\I18n\Time $Targets__modified
 * @property int $Sections__id
 * @property \App\Model\Entity\Sections $sections
 * @property int $Sections__target_id
 * @property \App\Model\Entity\SectionsTarget $sections_target
 * @property int $Sections__section_type_id
 * @property \App\Model\Entity\SectionsSectionType $sections_section_type
 * @property int $Sections__modifier_id
 * @property \App\Model\Entity\SectionsModifier $sections_modifier
 * @property bool $Sections__active
 * @property \Cake\I18n\Time $Sections__created
 * @property \Cake\I18n\Time $Sections__modified
 * @property int $Modifiers__id
 * @property \App\Model\Entity\Modifiers $modifiers
 * @property string $Modifiers__name
 * @property int $Modifiers__lock_level
 * @property int $Modifiers__sort_order
 * @property bool $Modifiers__required
 * @property int $Modifiers__display_id
 * @property \App\Model\Entity\ModifiersDisplay $modifiers_display
 * @property int $Modifiers__modifier_class_id
 * @property \App\Model\Entity\ModifiersModifierClass $modifiers_modifier_class
 * @property int $Modifiers__modifier_type_id
 * @property \App\Model\Entity\ModifiersModifierType $modifiers_modifier_type
 * @property \Cake\I18n\Time $Modifiers__created
 * @property \Cake\I18n\Time $Modifiers__modified
 * @property int $ModifierClasses__id
 * @property \App\Model\Entity\ModifierClasses $modifier_classes
 * @property string $ModifierClasses__name
 * @property int $ModifierClasses__sort_order
 * @property \Cake\I18n\Time $ModifierClasses__created
 * @property \Cake\I18n\Time $ModifierClasses__modified
 * @property int $ModifierTypes__id
 * @property \App\Model\Entity\ModifierTypes $modifier_types
 * @property string $ModifierTypes__name
 * @property \Cake\I18n\Time $ModifierTypes__created
 * @property \Cake\I18n\Time $ModifierTypes__modified
 * @property int $Displays__id
 * @property \App\Model\Entity\Displays $displays
 * @property string $Displays__name
 * @property int $Displays__sort_order
 * @property \Cake\I18n\Time $Displays__created
 * @property \Cake\I18n\Time $Displays__modified
 * @property int $SectionTypes__id
 * @property \App\Model\Entity\SectionTypes $section_types
 * @property string $SectionTypes__name
 * @property int $SectionTypes__sort_order
 * @property \Cake\I18n\Time $SectionTypes__created
 * @property \Cake\I18n\Time $SectionTypes__modified
 * @property int $ModifierValues__id
 * @property \App\Model\Entity\ModifierValues $modifier_values
 * @property string $ModifierValues__name
 * @property int $ModifierValues__lock_level
 * @property string $ModifierValues__value
 * @property int $ModifierValues__modifier_id
 * @property \App\Model\Entity\ModifierValuesModifier $modifier_values_modifier
 * @property \Cake\I18n\Time $ModifierValues__created
 * @property \Cake\I18n\Time $ModifierValues__modified
 */
class TargetsDown extends Entity
{

}
