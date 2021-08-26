<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Msds extends Entity
{
    protected $_accessible = [
        'doc_id' => true,
        'doc_url' => true,
    ];
}
