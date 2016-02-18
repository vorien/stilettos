<?php
namespace App\Model\Table;

use App\Model\Entity\Ability;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Abilities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Maneuvers
 * @property \Cake\ORM\Association\BelongsTo $Powers
 * @property \Cake\ORM\Association\BelongsToMany $Displays
 */
class AbilitiesTable extends Table
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

        $this->table('abilities');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Maneuvers', [
            'foreignKey' => 'maneuver_id'
        ]);
        $this->belongsTo('Powers', [
            'foreignKey' => 'power_id'
        ]);
        $this->belongsToMany('Displays', [
            'foreignKey' => 'ability_id',
            'targetForeignKey' => 'display_id',
            'joinTable' => 'abilities_displays'
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
            ->allowEmpty('type');

        $validator
            ->allowEmpty('duration');

        $validator
            ->allowEmpty('target');

        $validator
            ->allowEmpty('has_range');

        $validator
            ->allowEmpty('use_end');

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
        $rules->add($rules->existsIn(['maneuver_id'], 'Maneuvers'));
        $rules->add($rules->existsIn(['power_id'], 'Powers'));
        return $rules;
    }
}
