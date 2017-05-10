<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WeeklyClosedTimes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Equipment
 *
 * @method \App\Model\Entity\WeeklyClosedTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WeeklyClosedTime findOrCreate($search, callable $callback = null, $options = [])
 */
class WeeklyClosedTimesTable extends Table
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

        $this->setTable('weekly_closed_times');
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
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('weekday')
            ->requirePresence('weekday', 'create')
            ->notEmpty('weekday');

        $validator
            ->requirePresence('start_time', 'create')
            ->notEmpty('start_time');

        $validator
            ->requirePresence('end_time', 'create')
            ->notEmpty('end_time');

        $validator
            ->integer('entire_day')
            ->requirePresence('entire_day', 'create')
            ->notEmpty('entire_day');

        $validator
            ->requirePresence('reason', 'create')
            ->notEmpty('reason');

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
