<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeslotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeslotsTable Test Case
 */
class TimeslotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeslotsTable
     */
    public $Timeslots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.timeslots'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Timeslots') ? [] : ['className' => 'App\Model\Table\TimeslotsTable'];
        $this->Timeslots = TableRegistry::get('Timeslots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Timeslots);

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
