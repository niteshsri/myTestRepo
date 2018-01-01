<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserTalent Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $talent_id
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Talent $talent
 */
class UserTalent extends Entity
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
        'talent_id' => true,
        'status' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'talent' => true
    ];
}
