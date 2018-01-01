<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TalentServices Model
 *
 * @property \App\Model\Table\TalentsTable|\Cake\ORM\Association\BelongsTo $Talents
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\UserTalentServicesTable|\Cake\ORM\Association\HasMany $UserTalentServices
 *
 * @method \App\Model\Entity\TalentService get($primaryKey, $options = [])
 * @method \App\Model\Entity\TalentService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TalentService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TalentService|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TalentService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TalentService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TalentService findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TalentServicesTable extends Table
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

        $this->setTable('talent_services');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Talents', [
            'foreignKey' => 'talent_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserTalentServices', [
            'foreignKey' => 'talent_service_id'
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
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['talent_id'], 'Talents'));
        $rules->add($rules->existsIn(['service_id'], 'Services'));

        return $rules;
    }
}
