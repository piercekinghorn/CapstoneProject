<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\EquipmentItem;
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
        return $user->is_staff;
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
        return true;
    }
}
