<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $id_parent
 * @property string $name
 * @property string $create_user
 * @property string $update_user
 * @property \Cake\I18n\FrozenTime $create_time
 * @property \Cake\I18n\FrozenTime $update_time
 * @property int $is_deleted
 */
class Category extends Entity
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
        'id_parent' => true,
        'name' => true,
        'create_user' => true,
        'update_user' => true,
        'create_time' => true,
        'update_time' => true,
        'is_deleted' => true
    ];
}
