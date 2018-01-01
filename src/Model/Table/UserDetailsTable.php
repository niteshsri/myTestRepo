<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserDetails Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\WorkTypesTable|\Cake\ORM\Association\BelongsTo $WorkTypes
 * @property \App\Model\Table\EthinicitiesTable|\Cake\ORM\Association\BelongsTo $Ethinicities
 * @property \App\Model\Table\EyeColorsTable|\Cake\ORM\Association\BelongsTo $EyeColors
 * @property \App\Model\Table\HairColorsTable|\Cake\ORM\Association\BelongsTo $HairColors
 *
 * @method \App\Model\Entity\UserDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserDetailsTable extends Table
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

        $this->setTable('user_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WorkTypes', [
            'foreignKey' => 'work_type_id'
        ]);
        $this->belongsTo('Ethinicities', [
            'foreignKey' => 'ethinicity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EyeColors', [
            'foreignKey' => 'eye_color_id'
        ]);
        $this->belongsTo('HairColors', [
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
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->allowEmpty('gender');

        $validator
            ->scalar('height')
            ->maxLength('height', 255)
            ->allowEmpty('height');

        $validator
            ->scalar('weight')
            ->maxLength('weight', 255)
            ->allowEmpty('weight');

        $validator
            ->scalar('waist')
            ->maxLength('waist', 255)
            ->allowEmpty('waist');

        $validator
            ->scalar('chest')
            ->maxLength('chest', 255)
            ->allowEmpty('chest');

        $validator
            ->scalar('hips')
            ->maxLength('hips', 255)
            ->allowEmpty('hips');

        $validator
            ->scalar('bio')
            ->allowEmpty('bio');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['work_type_id'], 'WorkTypes'));
        $rules->add($rules->existsIn(['ethinicity_id'], 'Ethinicities'));
        $rules->add($rules->existsIn(['eye_color_id'], 'EyeColors'));
        $rules->add($rules->existsIn(['hair_color_id'], 'HairColors'));

        return $rules;
    }
}
