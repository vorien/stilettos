<?php
namespace App\Model\Table;

use App\Model\Entity\Modifier;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modifiers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Displays
 * @property \Cake\ORM\Association\BelongsTo $ModifierClasses
 * @property \Cake\ORM\Association\BelongsTo $ModifierTypes
 * @property \Cake\ORM\Association\HasMany $ModifierValues
 */
class ModifiersTable extends Table
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

        $this->table('modifiers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Displays', [
            'foreignKey' => 'display_id'
        ]);
        $this->belongsTo('ModifierClasses', [
            'foreignKey' => 'modifier_class_id'
        ]);
        $this->belongsTo('ModifierTypes', [
            'foreignKey' => 'modifier_type_id'
        ]);
        $this->hasMany('ModifierValues', [
            'foreignKey' => 'modifier_id'
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
            ->numeric('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->integer('locklevel')
            ->allowEmpty('locklevel');

        $validator
            ->boolean('required')
            ->allowEmpty('required');

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
        $rules->add($rules->existsIn(['display_id'], 'Displays'));
        $rules->add($rules->existsIn(['modifier_class_id'], 'ModifierClasses'));
        $rules->add($rules->existsIn(['modifier_type_id'], 'ModifierTypes'));
        return $rules;
    }
}
