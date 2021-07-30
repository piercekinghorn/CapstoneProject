<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Labequipment Entity
 *
 * @property int $equip_id
 * @property string $equip_name
 * @property string $equip_campus
 * @property string $equip_lab
 * @property string|null $equip_discipline
 * @property string|null $equip_details
 * @property string|null $equip_media
 * @property string|null $equip_whs
 */
class Labequipment extends Entity
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
        'equip_name' => true,
        'equip_campus' => true,
        'equip_lab' => true,
        'equip_discipline' => true,
        'equip_details' => true,
        'equip_media' => true,
        'equip_whs' => true,
    ];
}
