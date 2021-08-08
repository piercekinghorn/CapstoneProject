<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EquipmentItemsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('equipment_items');
        $this->setDisplayField('equipment_id');
        $this->setPrimaryKey('equipment_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('equipment_id')
            ->allowEmptyString('equipment_id', null, 'create');

        $validator
            ->scalar('equipment_name')
            ->maxLength('equipment_name', 50)
            ->requirePresence('equipment_name', 'create')
            ->notEmptyString('equipment_name');

        $validator
            ->scalar('equipment_campus')
            ->maxLength('equipment_campus', 50)
            ->requirePresence('equipment_campus', 'create')
            ->notEmptyString('equipment_campus');

        $validator
            ->scalar('equipment_lab')
            ->maxLength('equipment_lab', 25)
            ->requirePresence('equipment_lab', 'create')
            ->notEmptyString('equipment_lab');

        $validator
            ->scalar('equipment_discipline')
            ->maxLength('equipment_discipline', 25)
            ->allowEmptyString('equipment_discipline');

        $validator
            ->scalar('equipment_details')
            ->maxLength('equipment_details', 25)
            ->allowEmptyString('equipment_details');

        $validator
            ->scalar('equipment_media')
            ->maxLength('equipment_media', 50)
            ->allowEmptyString('equipment_media');

        $validator
            ->scalar('equipment_whs')
            ->maxLength('equipment_whs', 200)
            ->allowEmptyString('equipment_whs');

        $validator
            ->boolean('equipment_status')
            ->requirePresence('equipment_status', 'create')
            ->notEmptyString('equipment_status');

        return $validator;
    }
}
