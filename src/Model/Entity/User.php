<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\IdentityInterface;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity implements IdentityInterface
{
    /**
     * Authentication\IdentityInterface method
     */
    public function getIdentifier()
    {
        return $this->user_id;
    }

    public function getStudentID()
    {
        return $this->student_id;
    }

    /**
     * Authentication\IdentityInterface method
     */
    public function getOriginalData()
    {
        return $this;
    }

    protected $_accessible = [
        'username' => true,
        'password' => true,
        'student_id' => true,
        'is_staff' => true,
        'is_admin' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
