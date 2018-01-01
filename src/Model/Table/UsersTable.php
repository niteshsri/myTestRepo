<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;
/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\UserAddressesTable|\Cake\ORM\Association\HasMany $UserAddresses
 * @property \App\Model\Table\UserDetailsTable|\Cake\ORM\Association\HasMany $UserDetails
 * @property \App\Model\Table\UserDisciplinesTable|\Cake\ORM\Association\HasMany $UserDisciplines
 * @property \App\Model\Table\UserFavouritesTable|\Cake\ORM\Association\HasMany $UserFavourites
 * @property \App\Model\Table\UserFollowersTable|\Cake\ORM\Association\HasMany $UserFollowers
 * @property \App\Model\Table\UserHobbiesTable|\Cake\ORM\Association\HasMany $UserHobbies
 * @property \App\Model\Table\UserImagesTable|\Cake\ORM\Association\HasMany $UserImages
 * @property \App\Model\Table\UserLanguagesTable|\Cake\ORM\Association\HasMany $UserLanguages
 * @property \App\Model\Table\UserLikesTable|\Cake\ORM\Association\HasMany $UserLikes
 * @property \App\Model\Table\UserLocationsTable|\Cake\ORM\Association\HasMany $UserLocations
 * @property \App\Model\Table\UserSocialConnectionsTable|\Cake\ORM\Association\HasMany $UserSocialConnections
 * @property \App\Model\Table\UserTalentServicesTable|\Cake\ORM\Association\HasMany $UserTalentServices
 * @property \App\Model\Table\UserTalentsTable|\Cake\ORM\Association\HasMany $UserTalents
 * @property \App\Model\Table\UserTestimonialsTable|\Cake\ORM\Association\HasMany $UserTestimonials
 * @property \App\Model\Table\UserViewsTable|\Cake\ORM\Association\HasMany $UserViews
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserAddresses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserDisciplines', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserFavourites', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserFollowers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserHobbies', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserImages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserLanguages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserLikes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserLocations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserSocialConnections', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserTalentServices', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserTalents', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserTestimonials', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserViews', [
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
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->uuid('uuid')
            ->requirePresence('uuid', 'create')
            ->notEmpty('uuid');

        $validator
            ->scalar('profile_image_name')
            ->maxLength('profile_image_name', 255)
            ->allowEmpty('profile_image_name');

        $validator
            ->scalar('profile_image_path')
            ->maxLength('profile_image_path', 255)
            ->allowEmpty('profile_image_path');

        $validator
            ->scalar('profile_image_url')
            ->allowEmpty('profile_image_url');

        $validator
            ->scalar('cover_image_name')
            ->maxLength('cover_image_name', 255)
            ->allowEmpty('cover_image_name');

        $validator
            ->scalar('cover_image_path')
            ->maxLength('cover_image_path', 255)
            ->allowEmpty('cover_image_path');

        $validator
            ->scalar('cover_image_url')
            ->allowEmpty('cover_image_url');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('is_talent')
            ->allowEmpty('is_talent');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('last_login')
            ->allowEmpty('last_login');

        return $validator;
    }

  public function beforeMarshal( \Cake\Event\Event $event, \ArrayObject $data, \ArrayObject $options)
    {
      if (!isset($data['uuid'])) {
        $data['uuid'] = Text::uuid();
      }
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
