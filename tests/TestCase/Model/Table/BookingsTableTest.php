<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingsTable Test Case
 */
class BookingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingsTable
     */
    public $Bookings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookings',
        'app.equipment'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bookings') ? [] : ['className' => 'App\Model\Table\BookingsTable'];
        $this->Bookings = TableRegistry::get('Bookings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookings);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
