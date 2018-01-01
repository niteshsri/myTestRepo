<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ethnicities Model
 *
 * @method \App\Model\Entity\Ethnicity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ethnicity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ethnicity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ethnicity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ethnicity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ethnicity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ethnicity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EthnicitiesTable extends Table
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

        $this->setTable('ethnicities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
