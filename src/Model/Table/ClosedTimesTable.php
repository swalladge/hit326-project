<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClosedTimes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Equipment
 *
 * @method \App\Model\Entity\ClosedTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClosedTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClosedTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClosedTime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClosedTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClosedTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClosedTime findOrCreate($search, callable $callback = null, $options = [])
 */
class ClosedTimesTable extends Table
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

        $this->setTable('closed_times');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Equipment', [
            'foreignKey' => 'equipment_id'
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
        $validator->setProvider('custom', 'App\Model\Validator');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('start_time')
            ->add('start_time', 'custom', [
                'rule' => 'datetime',
                'provider' => 'custom',
                'message' => 'Invalid start time.'
            ])
            ->notEmpty('start_time');

        $validator
            ->requirePresence('end_time')
            ->add('end_time', 'custom', [
                'rule' => 'datetime',
                'provider' => 'custom',
                'message' => 'Invalid end time.'
            ])
            ->notEmpty('end_time');

        $validator
            ->allowEmpty('reason')
            ->maxLength('reason', 1000);

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
        $rules->add($rules->existsIn(['equipment_id'], 'Equipment'));

        return $rules;
    }
}
