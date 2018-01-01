<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HairColors Model
 *
 * @property \App\Model\Table\UserDetailsTable|\Cake\ORM\Association\HasMany $UserDetails
 *
 * @method \App\Model\Entity\HairColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\HairColor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HairColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HairColor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HairColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HairColor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HairColor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HairColorsTable extends Table
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

        $this->setTable('hair_colors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserDetails', [
            'foreignKey' => 'hair_color_id'
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
