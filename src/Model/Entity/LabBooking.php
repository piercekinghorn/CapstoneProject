<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class LabBooking extends Entity
{
    protected $_accessible = [
        'equipment_id' => true,
        'staff_id' => true,
        'student_id' => true,
        'booking_date' => true,
        'return_date' => true,
        'booking_status' => true,
        'booking_induction' => true,
    ];

    public function getEquipmentName() {
        $this->EquipmentItems = TableRegistry::get('EquipmentItems');
        $equipmentItem = $this->EquipmentItems->get($this->equipment_id);
        return $equipmentItem->getName();
    }
}
