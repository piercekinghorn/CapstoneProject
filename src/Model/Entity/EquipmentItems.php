<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class EquipmentItems extends Entity
{
    protected $_accessible = [
        'equipment_name' => true,
        'equipment_campus' => true,
        'equipment_lab' => true,
        'equipment_discipline' => true,
        'equipment_details' => true,
        'equipment_media' => true,
        'equipment_whs' => true,
        'equipment_status' => true,
    ];
}
