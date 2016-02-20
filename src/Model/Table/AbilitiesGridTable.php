<?php
namespace App\Model\Table;

use App\Model\Entity\AbilitiesGrid;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AbilitiesGrid Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Abilities
 * @property \Cake\ORM\Association\BelongsTo $AbilitiesManeuvers
 * @property \Cake\ORM\Association\BelongsTo $AbilitiesPowers
 * @property \Cake\ORM\Association\BelongsTo $Displays
 * @property \Cake\ORM\Association\BelongsTo $Modifiers
 * @property \Cake\ORM\Association\BelongsTo $ModifiersDisplays
 * @property \Cake\ORM\Association\BelongsTo $ModifiersModifierClasses
 * @property \Cake\ORM\Association\BelongsTo $ModifiersModifierTypes
 * @property \Cake\ORM\Association\BelongsTo $ModifierClasses
 * @property \Cake\ORM\Association\BelongsTo $ModifierTypes
 * @property \Cake\ORM\Association\BelongsTo $ModifierValues
 * @property \Cake\ORM\Association\BelongsTo $ModifierValuesModifiers
 */
class AbilitiesGridTable extends Table
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

        $this->table('abilities_grid');

        $this->belongsTo('Abilities', [
            'foreignKey' => 'abilities_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AbilitiesManeuvers', [
            'foreignKey' => 'abilities_maneuver_id'
        ]);
        $this->belongsTo('AbilitiesPowers', [
            'foreignKey' => 'abilities_power_id'
        ]);
        $this->belongsTo('Displays', [
            'foreignKey' => 'displays_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modifiers', [
            'foreignKey' => 'modifiers_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifiersDisplays', [
            'foreignKey' => 'modifiers_display_id'
        ]);
        $this->belongsTo('ModifiersModifierClasses', [
            'foreignKey' => 'modifiers_modifier_class_id'
        ]);
        $this->belongsTo('ModifiersModifierTypes', [
            'foreignKey' => 'modifiers_modifier_type_id'
        ]);
        $this->belongsTo('ModifierClasses', [
            'foreignKey' => 'modifier_classes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifierTypes', [
            'foreignKey' => 'modifier_types_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifierValues', [
            'foreignKey' => 'modifier_values_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifierValuesModifiers', [
            'foreignKey' => 'modifier_values_modifier_id'
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
            ->allowEmpty('abilities_name');

        $validator
            ->allowEmpty('abilities_type');

        $validator
            ->allowEmpty('abilities_duration');

        $validator
            ->allowEmpty('abilities_target');

        $validator
            ->allowEmpty('abilities_has_range');

        $validator
            ->allowEmpty('abilities_use_end');

        $validator
            ->allowEmpty('displays_name');

        $validator
            ->boolean('displays_power')
            ->allowEmpty('displays_power');

        $validator
            ->allowEmpty('modifiers_name');

        $validator
            ->integer('modifiers_locklevel')
            ->allowEmpty('modifiers_locklevel');

        $validator
            ->boolean('modifiers_required')
            ->allowEmpty('modifiers_required');

        $validator
            ->integer('modifiers_display_order')
            ->allowEmpty('modifiers_display_order');

        $validator
            ->allowEmpty('modifier_classes_name');

        $validator
            ->integer('modifier_classes_display_order')
            ->allowEmpty('modifier_classes_display_order');

        $validator
            ->allowEmpty('modifier_types_name');

        $validator
            ->allowEmpty('modifier_values_name');

        $validator
            ->integer('modifier_values_locklevel')
            ->allowEmpty('modifier_values_locklevel');

        $validator
            ->numeric('modifier_values_value')
            ->allowEmpty('modifier_values_value');

        $validator
            ->boolean('modifier_values_required')
            ->allowEmpty('modifier_values_required');

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
        $rules->add($rules->existsIn(['abilities_id'], 'Abilities'));
        $rules->add($rules->existsIn(['abilities_maneuver_id'], 'AbilitiesManeuvers'));
        $rules->add($rules->existsIn(['abilities_power_id'], 'AbilitiesPowers'));
        $rules->add($rules->existsIn(['displays_id'], 'Displays'));
        $rules->add($rules->existsIn(['modifiers_id'], 'Modifiers'));
        $rules->add($rules->existsIn(['modifiers_display_id'], 'ModifiersDisplays'));
        $rules->add($rules->existsIn(['modifiers_modifier_class_id'], 'ModifiersModifierClasses'));
        $rules->add($rules->existsIn(['modifiers_modifier_type_id'], 'ModifiersModifierTypes'));
        $rules->add($rules->existsIn(['modifier_classes_id'], 'ModifierClasses'));
        $rules->add($rules->existsIn(['modifier_types_id'], 'ModifierTypes'));
        $rules->add($rules->existsIn(['modifier_values_id'], 'ModifierValues'));
        $rules->add($rules->existsIn(['modifier_values_modifier_id'], 'ModifierValuesModifiers'));
        return $rules;
    }
}
