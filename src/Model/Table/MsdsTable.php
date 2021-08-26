<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class MsdsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('msds');
        $this->setDisplayField('doc_id');
        $this->setPrimaryKey('doc_id');
    }
}