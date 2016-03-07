<?php
namespace App\Model\Table;

use App\Model\Entity\AllRecord;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AllRecords Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ManeuversS
 * @property \Cake\ORM\Association\BelongsTo $PowersS
 * @property \Cake\ORM\Association\BelongsTo $PowersManeuvers
 * @property \Cake\ORM\Association\BelongsTo $TargetsS
 * @property \Cake\ORM\Association\BelongsTo $TargetsPowers
 * @property \Cake\ORM\Association\BelongsTo $SectionTypesS
 * @property \Cake\ORM\Association\BelongsTo $SectionsS
 * @property \Cake\ORM\Association\BelongsTo $SectionsTargets
 * @property \Cake\ORM\Association\BelongsTo $SectionsSectionTypes
 * @property \Cake\ORM\Association\BelongsTo $SectionsModifiers
 * @property \Cake\ORM\Association\BelongsTo $ModifiersS
 * @property \Cake\ORM\Association\BelongsTo $ModifiersDisplays
 * @property \Cake\ORM\Association\BelongsTo $ModifiersModifierClasses
 * @property \Cake\ORM\Association\BelongsTo $ModifiersModifierTypes
 * @property \Cake\ORM\Association\BelongsTo $ModifierClassesS
 * @property \Cake\ORM\Association\BelongsTo $ModifierTypesS
 * @property \Cake\ORM\Association\BelongsTo $DisplaysS
 * @property \Cake\ORM\Association\BelongsTo $ModifierValuesS
 * @property \Cake\ORM\Association\BelongsTo $ModifierValuesModifiers
 */
class AllRecordsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('all_records');

        $this->belongsTo('ManeuversS', [
            'foreignKey' => 'Maneuvers__id'
        ]);
        $this->belongsTo('PowersS', [
            'foreignKey' => 'Powers__id'
        ]);
        $this->belongsTo('PowersManeuvers', [
            'foreignKey' => 'Powers__maneuver_id'
        ]);
        $this->belongsTo('TargetsS', [
            'foreignKey' => 'Targets__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TargetsPowers', [
            'foreignKey' => 'Targets__power_id'
        ]);
        $this->belongsTo('SectionTypesS', [
            'foreignKey' => 'SectionTypes__id'
        ]);
        $this->belongsTo('SectionsS', [
            'foreignKey' => 'Sections__id'
        ]);
        $this->belongsTo('SectionsTargets', [
            'foreignKey' => 'Sections__target_id'
        ]);
        $this->belongsTo('SectionsSectionTypes', [
            'foreignKey' => 'Sections__section_type_id'
        ]);
        $this->belongsTo('SectionsModifiers', [
            'foreignKey' => 'Sections__modifier_id'
        ]);
        $this->belongsTo('ModifiersS', [
            'foreignKey' => 'Modifiers__id'
        ]);
        $this->belongsTo('ModifiersDisplays', [
            'foreignKey' => 'Modifiers__display_id'
        ]);
        $this->belongsTo('ModifiersModifierClasses', [
            'foreignKey' => 'Modifiers__modifier_class_id'
        ]);
        $this->belongsTo('ModifiersModifierTypes', [
            'foreignKey' => 'Modifiers__modifier_type_id'
        ]);
        $this->belongsTo('ModifierClassesS', [
            'foreignKey' => 'ModifierClasses__id'
        ]);
        $this->belongsTo('ModifierTypesS', [
            'foreignKey' => 'ModifierTypes__id'
        ]);
        $this->belongsTo('DisplaysS', [
            'foreignKey' => 'Displays__id'
        ]);
        $this->belongsTo('ModifierValuesS', [
            'foreignKey' => 'ModifierValues__id'
        ]);
        $this->belongsTo('ModifierValuesModifiers', [
            'foreignKey' => 'ModifierValues__modifier_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('Maneuvers__name');

        $validator
            ->integer('Maneuvers__sort_order')
            ->allowEmpty('Maneuvers__sort_order');

        $validator
            ->integer('Maneuvers__lock_level')
            ->allowEmpty('Maneuvers__lock_level');

        $validator
            ->allowEmpty('Powers__name');

        $validator
            ->integer('Powers__sort_order')
            ->allowEmpty('Powers__sort_order');

        $validator
            ->integer('Powers__lock_level_requirement')
            ->allowEmpty('Powers__lock_level_requirement');

        $validator
            ->allowEmpty('Powers__type');

        $validator
            ->allowEmpty('Powers__duration');

        $validator
            ->allowEmpty('Powers__target');

        $validator
            ->allowEmpty('Powers__has_range');

        $validator
            ->allowEmpty('Powers__use_end');

        $validator
            ->boolean('Powers__active')
            ->allowEmpty('Powers__active');

        $validator
            ->allowEmpty('Targets__name');

        $validator
            ->integer('Targets__sort_order')
            ->allowEmpty('Targets__sort_order');

        $validator
            ->allowEmpty('SectionTypes__name');

        $validator
            ->integer('SectionTypes__sort_order')
            ->allowEmpty('SectionTypes__sort_order');

        $validator
            ->boolean('Sections__active')
            ->allowEmpty('Sections__active');

        $validator
            ->allowEmpty('Modifiers__name');

        $validator
            ->numeric('Modifiers__lock_level_modifier')
            ->allowEmpty('Modifiers__lock_level_modifier');

        $validator
            ->integer('Modifiers__sort_order')
            ->allowEmpty('Modifiers__sort_order');

        $validator
            ->integer('Modifiers__default_input_value')
            ->allowEmpty('Modifiers__default_input_value');

        $validator
            ->allowEmpty('ModifierClasses__name');

        $validator
            ->integer('ModifierClasses__sort_order')
            ->allowEmpty('ModifierClasses__sort_order');

        $validator
            ->allowEmpty('ModifierTypes__name');

        $validator
            ->allowEmpty('Displays__name');

        $validator
            ->allowEmpty('ModifierValues__name');

        $validator
            ->integer('ModifierValues__lock_level_requirement')
            ->allowEmpty('ModifierValues__lock_level_requirement');

        $validator
            ->numeric('ModifierValues__value')
            ->allowEmpty('ModifierValues__value');

        $validator
            ->integer('ModifierValues__is_default')
            ->allowEmpty('ModifierValues__is_default');

        $validator
            ->integer('ModifierValues__sort_order')
            ->allowEmpty('ModifierValues__sort_order');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['Maneuvers__id'], 'ManeuversS'));
        $rules->add($rules->existsIn(['Powers__id'], 'PowersS'));
        $rules->add($rules->existsIn(['Powers__maneuver_id'], 'PowersManeuvers'));
        $rules->add($rules->existsIn(['Targets__id'], 'TargetsS'));
        $rules->add($rules->existsIn(['Targets__power_id'], 'TargetsPowers'));
        $rules->add($rules->existsIn(['SectionTypes__id'], 'SectionTypesS'));
        $rules->add($rules->existsIn(['Sections__id'], 'SectionsS'));
        $rules->add($rules->existsIn(['Sections__target_id'], 'SectionsTargets'));
        $rules->add($rules->existsIn(['Sections__section_type_id'], 'SectionsSectionTypes'));
        $rules->add($rules->existsIn(['Sections__modifier_id'], 'SectionsModifiers'));
        $rules->add($rules->existsIn(['Modifiers__id'], 'ModifiersS'));
        $rules->add($rules->existsIn(['Modifiers__display_id'], 'ModifiersDisplays'));
        $rules->add($rules->existsIn(['Modifiers__modifier_class_id'], 'ModifiersModifierClasses'));
        $rules->add($rules->existsIn(['Modifiers__modifier_type_id'], 'ModifiersModifierTypes'));
        $rules->add($rules->existsIn(['ModifierClasses__id'], 'ModifierClassesS'));
        $rules->add($rules->existsIn(['ModifierTypes__id'], 'ModifierTypesS'));
        $rules->add($rules->existsIn(['Displays__id'], 'DisplaysS'));
        $rules->add($rules->existsIn(['ModifierValues__id'], 'ModifierValuesS'));
        $rules->add($rules->existsIn(['ModifierValues__modifier_id'], 'ModifierValuesModifiers'));
        return $rules;
    }
}
