<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BorrowOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BorrowOrdersTable Test Case
 */
class BorrowOrdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BorrowOrdersTable
     */
    public $BorrowOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BorrowOrders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BorrowOrders') ? [] : ['className' => BorrowOrdersTable::class];
        $this->BorrowOrders = TableRegistry::getTableLocator()->get('BorrowOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BorrowOrders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
