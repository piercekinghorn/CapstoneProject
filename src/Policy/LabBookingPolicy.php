<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\LabBooking;
use Authorization\IdentityInterface;

/**
 * LabBooking policy
 */
class LabBookingPolicy
{
    /**
     * Check if $user can add LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canAdd(IdentityInterface $user, LabBooking $labBooking)
    {
        // Can book if user is logged in.
        if ($user->user_id != null)
            return true;
        else
            return false;
    }

    /**
     * Check if $user can edit LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canEdit(IdentityInterface $user, LabBooking $labBooking)
    {
        // Can edit booking if booking id is same as lab booking student id.
        return $user->user_id === $labBooking->student_id;
    }

    /**
     * Check if $user can delete LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canDelete(IdentityInterface $user, LabBooking $labBooking)
    {
        // Can edit if the user is staff.
        return $user->is_staff;
    }

    /**
     * Check if $user can view LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canView(IdentityInterface $user, LabBooking $labBooking)
    {
        // All users can view bookings.
        return true;
    }
}
