<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\EquipmentItem;
use App\Model\Entity\LabBooking;
use Authorization\IdentityInterface;

/**
 * EquipmentItem policy
 */
class EquipmentItemPolicy
{
    /**
     * Check if $user can add EquipmentItem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\EquipmentItem $equipmentItem
     * @return bool
     */
    public function canAdd(IdentityInterface $user, EquipmentItem $equipmentItem)
    {
        // Can edit if the user is staff.
        return $user->is_staff;
    }

    public function canBook(IdentityInterface $user, LabBooking $labBooking)
    {
        // Can book if user is logged in.
        if ($user->user_id != null)
            return true;
        else
            return false;
    }

    /**
     * Check if $user can edit EquipmentItem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\EquipmentItem $equipmentItem
     * @return bool
     */
    public function canEdit(IdentityInterface $user, EquipmentItem $equipmentItem)
    {
        // Can edit if the user is staff.
        return $user->is_staff;
    }

    /**
     * Check if $user can delete EquipmentItem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\EquipmentItem $equipmentItem
     * @return bool
     */
    public function canDelete(IdentityInterface $user, EquipmentItem $equipmentItem)
    {
        // Can edit if the user is staff.
        return $user->is_staff;
    }

    /**
     * Check if $user can view EquipmentItem
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\EquipmentItem $equipmentItem
     * @return bool
     */
    public function canView(IdentityInterface $user, EquipmentItem $equipmentItem)
    {
        // Can view at all times.
        return true;
    }
}
