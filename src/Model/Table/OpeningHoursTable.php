<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpeningHours Model
 *
 * @method \App\Model\Entity\OpeningHour get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpeningHour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpeningHour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpeningHour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour findOrCreate($search, callable $callback = null, $options = [])
 */
class OpeningHoursTable extends Table
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

        $this->setTable('opening_hours');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->requirePresence('weekday')
            ->range('weekday', 0, 6)
            ->notEmpty('weekday');

        $validator
            ->requirePresence('start_time', 'create')
            ->add('start_time', 'custom', [
                'rule' => 'validTime',
                'provider' => 'custom',
                'message' => 'Invalid start time.'
            ])
            ->notEmpty('start_time');

        $validator
            ->requirePresence('end_time', 'create')
            ->add('end_time', 'custom', [
                'rule' => 'validTime',
                'provider' => 'custom',
                'message' => 'Invalid end time.'
            ])
            ->notEmpty('end_time');

        return $validator;
    }
}
