<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LabequipmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LabequipmentTable Test Case
 */
class LabequipmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LabequipmentTable
     */
    protected $Labequipment;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Labequipment',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Labequipment') ? [] : ['className' => LabequipmentTable::class];
        $this->Labequipment = $this->getTableLocator()->get('Labequipment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Labequipment);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
