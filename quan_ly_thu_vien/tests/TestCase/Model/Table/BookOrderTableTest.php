<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookOrderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookOrderTable Test Case
 */
class BookOrderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookOrderTable
     */
    public $BookOrder;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BookOrder'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BookOrder') ? [] : ['className' => BookOrderTable::class];
        $this->BookOrder = TableRegistry::getTableLocator()->get('BookOrder', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookOrder);

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
