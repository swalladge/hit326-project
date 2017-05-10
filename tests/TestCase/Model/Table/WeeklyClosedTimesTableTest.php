<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeeklyClosedTimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeeklyClosedTimesTable Test Case
 */
class WeeklyClosedTimesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeeklyClosedTimesTable
     */
    public $WeeklyClosedTimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.weekly_closed_times',
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
        $config = TableRegistry::exists('WeeklyClosedTimes') ? [] : ['className' => 'App\Model\Table\WeeklyClosedTimesTable'];
        $this->WeeklyClosedTimes = TableRegistry::get('WeeklyClosedTimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WeeklyClosedTimes);

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
