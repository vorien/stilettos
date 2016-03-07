<?php
namespace App\Model\Table;

use App\Model\Entity\ModifiersDown;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModifiersDown Model
 *
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
class ModifiersDownTable extends Table
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

        $this->table('modifiers_down');

        $this->belongsTo('ModifiersS', [
            'foreignKey' => 'Modifiers__id',
            'joinType' => 'INNER'
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
