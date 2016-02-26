<?php
namespace App\Model\Table;

use App\Model\Entity\Maneuver;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maneuvers Model
 *
 * @property \Cake\ORM\Association\HasMany $Powers
 */
class ManeuversTable extends Table
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

        $this->table('maneuvers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Powers', [
            'foreignKey' => 'maneuver_id'
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
            ->integer('lock_level')
            ->allowEmpty('lock_level');

        return $validator;
    }
}
