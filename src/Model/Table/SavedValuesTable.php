<?php
namespace App\Model\Table;

use App\Model\Entity\SavedValue;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SavedValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SavedSettings
 * @property \Cake\ORM\Association\BelongsTo $Sections
 * @property \Cake\ORM\Association\BelongsTo $Targets
 * @property \Cake\ORM\Association\BelongsTo $Modifiers
 * @property \Cake\ORM\Association\BelongsTo $ModifierValues
 */
class SavedValuesTable extends Table
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

        $this->table('saved_values');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SavedSettings', [
            'foreignKey' => 'saved_setting_id'
        ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id'
        ]);
        $this->belongsTo('Targets', [
            'foreignKey' => 'target_id'
        ]);
        $this->belongsTo('Modifiers', [
            'foreignKey' => 'modifier_id'
        ]);
        $this->belongsTo('ModifierValues', [
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
            ->numeric('value')
            ->allowEmpty('value');

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
        $rules->add($rules->existsIn(['saved_setting_id'], 'SavedSettings'));
        $rules->add($rules->existsIn(['section_id'], 'Sections'));
        $rules->add($rules->existsIn(['target_id'], 'Targets'));
        $rules->add($rules->existsIn(['modifier_id'], 'Modifiers'));
        $rules->add($rules->existsIn(['modifier_value_id'], 'ModifierValues'));
        return $rules;
    }
}
