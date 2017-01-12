<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Worker Entity.
 *
 * @property int $id
 * @property string $worker_name
 * @property string $phonetic
 * @property string $display_name
 * @property string $bio
 * @property string $address
 * @property int $gender
 * @property string $image_url
 * @property int $service_provider_id
 * @property \App\Model\Entity\ServiceProvider $service_provider
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $birthdate
 * @property \App\Model\Entity\Bookmark[] $bookmarks
 * @property \App\Model\Entity\History[] $histories
 * @property \App\Model\Entity\License[] $licenses
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\Project[] $projects
 */
class Worker extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
