<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipment Model
 *
 * @property \Cake\ORM\Association\HasMany $Bookings
 *
 * @method \App\Model\Entity\Equipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment findOrCreate($search, callable $callback = null, $options = [])
 */
class EquipmentTable extends Table
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

        $this->setTable('equipment');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
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
            ->requirePresence('name')
            ->maxLength('name', 250)
            ->notEmpty('name');

        $validator
            ->allowEmpty('description')
            ->maxLength('description', 10000);

        $validator
            ->allowEmpty('location')
            ->maxLength('location', 250);

        $validator
            ->boolean('is_portable')
            ->requirePresence('is_portable')
            ->notEmpty('is_portable');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity')
            ->naturalNumber('quantity');

        // XXX: currently the is_active field isn't used anywhere
        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        return $validator;
    }
}
