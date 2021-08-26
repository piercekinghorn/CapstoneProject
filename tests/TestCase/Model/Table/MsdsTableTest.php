<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MsdsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MsdsTable Test Case
 */
class MsdsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MsdsTable
     */
    protected $Msds;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Msds',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Msds') ? [] : ['className' => MsdsTable::class];
        $this->Msds = $this->getTableLocator()->get('Msds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Msds);

        parent::tearDown();
    }
}
