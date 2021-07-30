<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LabequipmentFixture
 */
class LabequipmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'labequipment';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'equip_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'equip_name' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_campus' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_lab' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_discipline' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_details' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_media' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'equip_whs' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['equip_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'equip_id' => 1,
                'equip_name' => 'Lorem ipsum dolor sit a',
                'equip_campus' => 'Lorem ipsum dolor sit amet',
                'equip_lab' => 'Lorem ipsum dolor sit a',
                'equip_discipline' => 'Lorem ipsum dolor sit a',
                'equip_details' => 'Lorem ipsum dolor sit a',
                'equip_media' => 'Lorem ipsum dolor sit amet',
                'equip_whs' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
