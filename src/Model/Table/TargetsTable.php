<?php
namespace App\Model\Table;

use App\Model\Entity\Target;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Targets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Powers
 * @property \Cake\ORM\Association\BelongsTo $ParentTargets
 * @property \Cake\ORM\Association\HasMany $Sections
 * @property \Cake\ORM\Association\HasMany $ChildTargets
 */
class TargetsTable extends Table
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

        $this->table('targets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('Powers', [
            'foreignKey' => 'power_id'
        ]);
        $this->belongsTo('ParentTargets', [
            'className' => 'Targets',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Sections', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('ChildTargets', [
            'className' => 'Targets',
            'foreignKey' => 'parent_id'
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
            ->integer('sort_order')
            ->allowEmpty('sort_order');

        $validator
            ->integer('lft')
            ->allowEmpty('lft');

        $validator
            ->integer('rght')
            ->allowEmpty('rght');

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
        $rules->add($rules->existsIn(['power_id'], 'Powers'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentTargets'));
        return $rules;
    }
}
