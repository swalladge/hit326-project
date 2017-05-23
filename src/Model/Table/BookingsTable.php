<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Equipment
 *
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, callable $callback = null, $options = [])
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Equipment', [
            'foreignKey' => 'equipment_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->integer('user_id')
            ->allowEmpty('user_id');

        $validator
            ->requirePresence('state')
            ->inList('state', ['pending', 'confirmed', 'rejected'])
            ->notEmpty('state');

        $validator
            ->allowEmpty('user_notes')
            ->maxLength('user_notes', 10000);

        $validator
            ->requirePresence('start_date')
            ->add('start_date', 'custom', [
                'rule' => 'datetime',
                'provider' => 'custom',
                'message' => 'Invalid start date.'
            ])
            ->notEmpty('start_date');

        $validator
            ->requirePresence('end_date')
            ->add('end_date', 'custom', [
                'rule' => 'datetime',
                'provider' => 'custom',
                'message' => 'Invalid end date.'
            ])
            ->notEmpty('start_date');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
