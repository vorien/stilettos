<?php
namespace App\Model\Table;

use App\Model\Entity\Display;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Displays Model
 *
 * @property \Cake\ORM\Association\HasMany $Modifiers
 * @property \Cake\ORM\Association\BelongsToMany $Abilities
 */
class DisplaysTable extends Table
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

        $this->table('displays');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Modifiers', [
            'foreignKey' => 'display_id'
        ]);
        $this->belongsToMany('Abilities', [
            'foreignKey' => 'display_id',
            'targetForeignKey' => 'ability_id',
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
            ->boolean('power')
            ->allowEmpty('power');

        return $validator;
    }
}
