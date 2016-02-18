<?php
namespace App\Model\Table;

use App\Model\Entity\AbilitiesDisplay;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AbilitiesDisplays Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Abilities
 * @property \Cake\ORM\Association\BelongsTo $Displays
 */
class AbilitiesDisplaysTable extends Table
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

        $this->table('abilities_displays');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Abilities', [
            'foreignKey' => 'ability_id'
        ]);
        $this->belongsTo('Displays', [
            'foreignKey' => 'display_id'
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
        $rules->add($rules->existsIn(['ability_id'], 'Abilities'));
        $rules->add($rules->existsIn(['display_id'], 'Displays'));
        return $rules;
    }
}
