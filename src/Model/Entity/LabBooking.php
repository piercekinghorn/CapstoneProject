<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class LabBooking extends Entity
{
    protected $_accessible = [
        'equipment_id' => true,
        'staff_id' => true,
        'student_id' => true,
        'booking_date' => true,
        'booking_status' => true,
    ];
}
