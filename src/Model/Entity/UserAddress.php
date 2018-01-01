<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserAddress Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $add1
 * @property string $add2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $postal_code
 * @property string $landmark
 * @property string $contact
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserAddress extends Entity
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
        'user_id' => true,
        'add1' => true,
        'add2' => true,
        'city' => true,
        'state' => true,
        'country' => true,
        'postal_code' => true,
        'landmark' => true,
        'contact' => true,
        'status' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
