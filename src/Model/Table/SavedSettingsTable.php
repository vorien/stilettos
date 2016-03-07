<?php
namespace App\Model\Table;

use App\Model\Entity\SavedSetting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SavedSettings Model
 *
 * @property \Cake\ORM\Association\HasMany $SavedValues
 */
class SavedSettingsTable extends Table
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

        $this->table('saved_settings');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SavedValues', [
            'foreignKey' => 'saved_setting_id'
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
            ->integer('base_cost')
            ->allowEmpty('base_cost');

        $validator
            ->integer('active_cost')
            ->allowEmpty('active_cost');

        $validator
            ->integer('endurance_cost')
            ->allowEmpty('endurance_cost');

        $validator
            ->integer('real_cost')
            ->allowEmpty('real_cost');

        $validator
            ->integer('penalty_cost')
            ->allowEmpty('penalty_cost');

        return $validator;
    }
}
