<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discipline Entity
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserDiscipline[] $user_disciplines
 */
class Discipline extends Entity
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
        'name' => true,
        'label' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user_disciplines' => true
    ];
}
