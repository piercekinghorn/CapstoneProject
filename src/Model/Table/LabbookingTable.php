<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Labbooking Model
 *
 * @method \App\Model\Entity\Labbooking newEmptyEntity()
 * @method \App\Model\Entity\Labbooking newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Labbooking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Labbooking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Labbooking findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Labbooking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Labbooking[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Labbooking|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labbooking saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LabbookingTable extends Table
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

        $this->setTable('labbooking');
        $this->setDisplayField('book_id');
        $this->setPrimaryKey('book_id');
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
            ->nonNegativeInteger('book_id')
            ->allowEmptyString('book_id', null, 'create');

        $validator
            ->integer('equip_ID')
            ->requirePresence('equip_ID', 'create')
            ->notEmptyString('equip_ID');

        $validator
            ->integer('staff_ID')
            ->requirePresence('staff_ID', 'create')
            ->notEmptyString('staff_ID');

        $validator
            ->integer('student_ID')
            ->allowEmptyString('student_ID');

        $validator
            ->date('date_')
            ->notEmptyDate('date_');

        $validator
            ->boolean('book_status')
            ->notEmptyString('book_status');

        return $validator;
    }
}
