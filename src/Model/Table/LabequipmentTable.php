<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Labequipment Model
 *
 * @method \App\Model\Entity\Labequipment newEmptyEntity()
 * @method \App\Model\Entity\Labequipment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Labequipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Labequipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Labequipment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Labequipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Labequipment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Labequipment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labequipment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labequipment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labequipment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labequipment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Labequipment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LabequipmentTable extends Table
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

        $this->setTable('labequipment');
        $this->setDisplayField('equip_id');
        $this->setPrimaryKey('equip_id');
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
            ->nonNegativeInteger('equip_id')
            ->allowEmptyString('equip_id', null, 'create');

        $validator
            ->scalar('equip_name')
            ->maxLength('equip_name', 25)
            ->requirePresence('equip_name', 'create')
            ->notEmptyString('equip_name');

        $validator
            ->scalar('equip_campus')
            ->maxLength('equip_campus', 50)
            ->requirePresence('equip_campus', 'create')
            ->notEmptyString('equip_campus');

        $validator
            ->scalar('equip_lab')
            ->maxLength('equip_lab', 25)
            ->requirePresence('equip_lab', 'create')
            ->notEmptyString('equip_lab');

        $validator
            ->scalar('equip_discipline')
            ->maxLength('equip_discipline', 25)
            ->allowEmptyString('equip_discipline');

        $validator
            ->scalar('equip_details')
            ->maxLength('equip_details', 25)
            ->allowEmptyString('equip_details');

        $validator
            ->scalar('equip_media')
            ->maxLength('equip_media', 50)
            ->allowEmptyString('equip_media');

        $validator
            ->scalar('equip_whs')
            ->maxLength('equip_whs', 200)
            ->allowEmptyString('equip_whs');

        return $validator;
    }
}
