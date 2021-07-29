<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LabbookingTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LabbookingTable Test Case
 */
class LabbookingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LabbookingTable
     */
    protected $Labbooking;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Labbooking',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Labbooking') ? [] : ['className' => LabbookingTable::class];
        $this->Labbooking = $this->getTableLocator()->get('Labbooking', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Labbooking);

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
