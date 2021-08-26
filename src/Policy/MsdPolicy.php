<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Msd;
use Authorization\IdentityInterface;

/**
 * Msd policy
 */
class MsdPolicy
{
    /**
     * Check if $user can add Msd
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Msd $msd
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Msd $msd)
    {
    }

    /**
     * Check if $user can edit Msd
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Msd $msd
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Msd $msd)
    {
    }

    /**
     * Check if $user can delete Msd
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Msd $msd
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Msd $msd)
    {
    }

    /**
     * Check if $user can view Msd
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Msd $msd
     * @return bool
     */
    public function canView(IdentityInterface $user, Msd $msd)
    {
    }
}
