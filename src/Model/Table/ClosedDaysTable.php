<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClosedDays Model
 *
 * @method \App\Model\Entity\ClosedDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClosedDay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClosedDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClosedDay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClosedDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClosedDay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClosedDay findOrCreate($search, callable $callback = null, $options = [])
 */
class ClosedDaysTable extends Table
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

        $this->setTable('closed_days');
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
            ->integer('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->allowEmpty('reason');

        return $validator;
    }
}
