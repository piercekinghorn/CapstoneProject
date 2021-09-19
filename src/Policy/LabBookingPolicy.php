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
        return true;
    }

    /**
     * Check if $user can add LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canBook(IdentityInterface $user, LabBooking $labBooking) 
    {
        return true;
    }

    /**
     * Check if $user can add LabBooking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\LabBooking $labBooking
     * @return bool
     */
    public function canBook2(IdentityInterface $user, LabBooking $labBooking) 
    {
        return true;
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
        return $user->is_admin;
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
        return $user->is_admin;
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
        return true;
    }
}
