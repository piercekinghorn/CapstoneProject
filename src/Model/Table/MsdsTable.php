<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Msds Model
 *
 * @method \App\Model\Entity\Msd newEmptyEntity()
 * @method \App\Model\Entity\Msd newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Msd[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Msd get($primaryKey, $options = [])
 * @method \App\Model\Entity\Msd findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Msd patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Msd[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Msd|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Msd saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Msd[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msd[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msd[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Msd[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MsdsTable extends Table
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

        $this->setTable('msds');
        $this->setDisplayField('doc_id');
        $this->setPrimaryKey('doc_id');
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
            ->nonNegativeInteger('doc_id')
            ->allowEmptyString('doc_id', null, 'create');

        $validator
        ->scalar('doc_name')
        ->maxLength('doc_name', 50)
        ->requirePresence('doc_name', 'create')
        ->notEmptyString('doc_name');

        $validator
            ->scalar('doc_url')
            ->maxLength('doc_url', 100)
            ->requirePresence('doc_url', 'create')
            ->notEmptyString('doc_url');

        return $validator;
    }
}
