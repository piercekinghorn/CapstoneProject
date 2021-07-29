<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Labbooking Entity
 *
 * @property int $book_id
 * @property int $equip_ID
 * @property int $staff_ID
 * @property int|null $student_ID
 * @property \Cake\I18n\FrozenDate $date_
 * @property bool $book_status
 */
class Labbooking extends Entity
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
        'equip_ID' => true,
        'staff_ID' => true,
        'student_ID' => true,
        'date_' => true,
        'book_status' => true,
    ];
}
