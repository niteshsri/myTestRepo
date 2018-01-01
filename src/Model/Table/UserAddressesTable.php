<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserAddresses Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserAddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserAddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserAddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserAddress findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserAddressesTable extends Table
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

        $this->setTable('user_addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('add1')
            ->maxLength('add1', 255)
            ->requirePresence('add1', 'create')
            ->notEmpty('add1');

        $validator
            ->scalar('add2')
            ->maxLength('add2', 255)
            ->allowEmpty('add2');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 255)
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->scalar('country')
            ->maxLength('country', 255)
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 255)
            ->allowEmpty('postal_code');

        $validator
            ->scalar('landmark')
            ->maxLength('landmark', 255)
            ->allowEmpty('landmark');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 255)
            ->allowEmpty('contact');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
