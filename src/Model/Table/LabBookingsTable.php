<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LabBookingsTable extends Table
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

        $this->setTable('lab_bookings');
        $this->setDisplayField('booking_id');
        $this->setPrimaryKey('booking_id');
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
            ->nonNegativeInteger('booking_id')
            ->allowEmptyString('booking_id', null, 'create');

        $validator
            ->integer('equipment_id')
            ->requirePresence('equipment_id', 'create')
            ->notEmptyString('equipment_id');

        $validator
            ->integer('staff_id')
            ->requirePresence('staff_id', 'create')
            ->notEmptyString('staff_id');

        $validator
            ->integer('student_id')
            ->allowEmptyString('student_id');

        $validator
            ->date('booking_date')
            ->notEmptyDate('booking_date');

        $validator
            ->boolean('booking_status')
            ->requirePresence('booking_status', 'create')
            ->notEmptyString('booking_status');

        return $validator;
    }
}
