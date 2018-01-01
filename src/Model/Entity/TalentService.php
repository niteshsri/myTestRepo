<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TalentService Entity
 *
 * @property int $id
 * @property int $talent_id
 * @property int $service_id
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Talent $talent
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\UserTalentService[] $user_talent_services
 */
class TalentService extends Entity
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
        'talent_id' => true,
        'service_id' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'talent' => true,
        'service' => true,
        'user_talent_services' => true
    ];
}
