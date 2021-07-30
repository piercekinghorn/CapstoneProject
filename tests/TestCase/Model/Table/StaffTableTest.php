<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffTable Test Case
 */
class StaffTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffTable
     */
    protected $Staff;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Staff',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Staff') ? [] : ['className' => StaffTable::class];
        $this->Staff = $this->getTableLocator()->get('Staff', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Staff);

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
