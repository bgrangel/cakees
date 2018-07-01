<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculos Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Vehiculo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiculo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiculo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo findOrCreate($search, callable $callback = null, $options = [])
 */
class VehiculosTable extends Table
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

        $this->setTable('vehiculos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('marca')
            ->maxLength('marca', 100)
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 100)
            ->requirePresence('modelo', 'create')
            ->notEmpty('modelo');

        $validator
            ->scalar('placa')
            ->maxLength('placa', 100)
            ->requirePresence('placa', 'create')
            ->notEmpty('placa');

        $validator
            ->dateTime('create')
            ->requirePresence('create', 'create')
            ->notEmpty('create');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
