<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialServices Model
 *
 * @property \App\Model\Table\UserSocialConnectionsTable|\Cake\ORM\Association\HasMany $UserSocialConnections
 *
 * @method \App\Model\Entity\SocialService get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SocialService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialService|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialService findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SocialServicesTable extends Table
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

        $this->setTable('social_services');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserSocialConnections', [
            'foreignKey' => 'social_service_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('label')
            ->maxLength('label', 255)
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        return $validator;
    }
}
