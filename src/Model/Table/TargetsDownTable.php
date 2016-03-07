<?php
namespace App\Model\Table;

use App\Model\Entity\TargetsDown;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TargetsDown Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TargetsS
 * @property \Cake\ORM\Association\BelongsTo $TargetsPowers
 * @property \Cake\ORM\Association\BelongsTo $TargetsParents
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
 * @property \Cake\ORM\Association\BelongsTo $SectionTypesS
 * @property \Cake\ORM\Association\BelongsTo $ModifierValuesS
 * @property \Cake\ORM\Association\BelongsTo $ModifierValuesModifiers
 */
class TargetsDownTable extends Table
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

        $this->table('targets_down');

        $this->belongsTo('TargetsS', [
            'foreignKey' => 'Targets__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TargetsPowers', [
            'foreignKey' => 'Targets__power_id'
        ]);
        $this->belongsTo('TargetsParents', [
            'foreignKey' => 'Targets__parent_id'
        ]);
        $this->belongsTo('SectionsS', [
            'foreignKey' => 'Sections__id',
            'joinType' => 'INNER'
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
            'foreignKey' => 'ModifierClasses__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifierTypesS', [
            'foreignKey' => 'ModifierTypes__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DisplaysS', [
            'foreignKey' => 'Displays__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SectionTypesS', [
            'foreignKey' => 'SectionTypes__id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ModifierValuesS', [
            'foreignKey' => 'ModifierValues__id',
            'joinType' => 'INNER'
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
            ->allowEmpty('Targets__name');

        $validator
            ->integer('Targets__sort_order')
            ->allowEmpty('Targets__sort_order');

        $validator
            ->integer('Targets__lft')
            ->allowEmpty('Targets__lft');

        $validator
            ->integer('Targets__rght')
            ->allowEmpty('Targets__rght');

        $validator
            ->dateTime('Targets__created')
            ->allowEmpty('Targets__created');

        $validator
            ->dateTime('Targets__modified')
            ->allowEmpty('Targets__modified');

        $validator
            ->boolean('Sections__active')
            ->allowEmpty('Sections__active');

        $validator
            ->dateTime('Sections__created')
            ->allowEmpty('Sections__created');

        $validator
            ->dateTime('Sections__modified')
            ->allowEmpty('Sections__modified');

        $validator
            ->allowEmpty('Modifiers__name');

        $validator
            ->integer('Modifiers__lock_level')
            ->allowEmpty('Modifiers__lock_level');

        $validator
            ->integer('Modifiers__sort_order')
            ->allowEmpty('Modifiers__sort_order');

        $validator
            ->boolean('Modifiers__required')
            ->allowEmpty('Modifiers__required');

        $validator
            ->dateTime('Modifiers__created')
            ->allowEmpty('Modifiers__created');

        $validator
            ->dateTime('Modifiers__modified')
            ->allowEmpty('Modifiers__modified');

        $validator
            ->allowEmpty('ModifierClasses__name');

        $validator
            ->integer('ModifierClasses__sort_order')
            ->allowEmpty('ModifierClasses__sort_order');

        $validator
            ->dateTime('ModifierClasses__created')
            ->allowEmpty('ModifierClasses__created');

        $validator
            ->dateTime('ModifierClasses__modified')
            ->allowEmpty('ModifierClasses__modified');

        $validator
            ->allowEmpty('ModifierTypes__name');

        $validator
            ->dateTime('ModifierTypes__created')
            ->allowEmpty('ModifierTypes__created');

        $validator
            ->dateTime('ModifierTypes__modified')
            ->allowEmpty('ModifierTypes__modified');

        $validator
            ->allowEmpty('Displays__name');

        $validator
            ->integer('Displays__sort_order')
            ->allowEmpty('Displays__sort_order');

        $validator
            ->dateTime('Displays__created')
            ->allowEmpty('Displays__created');

        $validator
            ->dateTime('Displays__modified')
            ->allowEmpty('Displays__modified');

        $validator
            ->allowEmpty('SectionTypes__name');

        $validator
            ->integer('SectionTypes__sort_order')
            ->allowEmpty('SectionTypes__sort_order');

        $validator
            ->dateTime('SectionTypes__created')
            ->allowEmpty('SectionTypes__created');

        $validator
            ->dateTime('SectionTypes__modified')
            ->allowEmpty('SectionTypes__modified');

        $validator
            ->allowEmpty('ModifierValues__name');

        $validator
            ->integer('ModifierValues__lock_level')
            ->allowEmpty('ModifierValues__lock_level');

        $validator
            ->allowEmpty('ModifierValues__value');

        $validator
            ->dateTime('ModifierValues__created')
            ->allowEmpty('ModifierValues__created');

        $validator
            ->dateTime('ModifierValues__modified')
            ->allowEmpty('ModifierValues__modified');

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
        $rules->add($rules->existsIn(['Targets__id'], 'TargetsS'));
        $rules->add($rules->existsIn(['Targets__power_id'], 'TargetsPowers'));
        $rules->add($rules->existsIn(['Targets__parent_id'], 'TargetsParents'));
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
        $rules->add($rules->existsIn(['SectionTypes__id'], 'SectionTypesS'));
        $rules->add($rules->existsIn(['ModifierValues__id'], 'ModifierValuesS'));
        $rules->add($rules->existsIn(['ModifierValues__modifier_id'], 'ModifierValuesModifiers'));
        return $rules;
    }
}
