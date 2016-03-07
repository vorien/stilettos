<?php
namespace App\Model\Table;

use App\Model\Entity\ModifierValue;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModifierValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Modifiers
 * @property \Cake\ORM\Association\HasMany $SavedValues
 */
class ModifierValuesTable extends Table
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

        $this->table('modifier_values');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Modifiers', [
            'foreignKey' => 'modifier_id'
        ]);
        $this->hasMany('SavedValues', [
            'foreignKey' => 'modifier_value_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->integer('lock_level_requirement')
            ->allowEmpty('lock_level_requirement');

        $validator
            ->numeric('value')
            ->allowEmpty('value');

        $validator
            ->integer('is_default')
            ->allowEmpty('is_default');

        $validator
            ->integer('sort_order')
            ->allowEmpty('sort_order');

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
        $rules->add($rules->existsIn(['modifier_id'], 'Modifiers'));
        return $rules;
    }
}
