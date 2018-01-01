<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $work_type_id
 * @property \Cake\I18n\FrozenDate $dob
 * @property string $gender
 * @property string $height
 * @property string $weight
 * @property string $waist
 * @property string $chest
 * @property int $ethinicity_id
 * @property int $eye_color_id
 * @property int $hair_color_id
 * @property string $hips
 * @property string $bio
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\WorkType $work_type
 * @property \App\Model\Entity\Ethinicity $ethinicity
 * @property \App\Model\Entity\EyeColor $eye_color
 * @property \App\Model\Entity\HairColor $hair_color
 */
class UserDetail extends Entity
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
        'work_type_id' => true,
        'dob' => true,
        'gender' => true,
        'height' => true,
        'weight' => true,
        'waist' => true,
        'chest' => true,
        'ethinicity_id' => true,
        'eye_color_id' => true,
        'hair_color_id' => true,
        'hips' => true,
        'bio' => true,
        'status' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'work_type' => true,
        'ethinicity' => true,
        'eye_color' => true,
        'hair_color' => true
    ];
}
