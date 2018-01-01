<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $username
 * @property int $role_id
 * @property string $uuid
 * @property string $profile_image_name
 * @property string $profile_image_path
 * @property string $profile_image_url
 * @property string $cover_image_name
 * @property string $cover_image_path
 * @property string $cover_image_url
 * @property bool $status
 * @property bool $is_talent
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $last_login
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\UserAddress[] $user_addresses
 * @property \App\Model\Entity\UserDetail[] $user_details
 * @property \App\Model\Entity\UserDiscipline[] $user_disciplines
 * @property \App\Model\Entity\UserFavourite[] $user_favourites
 * @property \App\Model\Entity\UserFollower[] $user_followers
 * @property \App\Model\Entity\UserHobby[] $user_hobbies
 * @property \App\Model\Entity\UserImage[] $user_images
 * @property \App\Model\Entity\UserLanguage[] $user_languages
 * @property \App\Model\Entity\UserLike[] $user_likes
 * @property \App\Model\Entity\UserLocation[] $user_locations
 * @property \App\Model\Entity\UserSocialConnection[] $user_social_connections
 * @property \App\Model\Entity\UserTalentService[] $user_talent_services
 * @property \App\Model\Entity\UserTalent[] $user_talents
 * @property \App\Model\Entity\UserTestimonial[] $user_testimonials
 * @property \App\Model\Entity\UserView[] $user_views
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'username' => true,
        'role_id' => true,
        'uuid' => true,
        'profile_image_name' => true,
        'profile_image_path' => true,
        'profile_image_url' => true,
        'cover_image_name' => true,
        'cover_image_path' => true,
        'cover_image_url' => true,
        'status' => true,
        'is_talent' => true,
        'is_active' => true,
        'deleted' => true,
        'last_login' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'user_addresses' => true,
        'user_details' => true,
        'user_disciplines' => true,
        'user_favourites' => true,
        'user_followers' => true,
        'user_hobbies' => true,
        'user_images' => true,
        'user_languages' => true,
        'user_likes' => true,
        'user_locations' => true,
        'user_social_connections' => true,
        'user_talent_services' => true,
        'user_talents' => true,
        'user_testimonials' => true,
        'user_views' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

     protected function _setPassword($value)
      {
          $hasher = new DefaultPasswordHasher();
          return $hasher->hash($value);
      }
}
