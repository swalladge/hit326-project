<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClosedTimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClosedTimesTable Test Case
 */
class ClosedTimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClosedTimesTable
     */
    public $ClosedTimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.closed_times',
        'app.equipment',
        'app.bookings',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClosedTimes') ? [] : ['className' => 'App\Model\Table\ClosedTimesTable'];
        $this->ClosedTimes = TableRegistry::get('ClosedTimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClosedTimes);

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
