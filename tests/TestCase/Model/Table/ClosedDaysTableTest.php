<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClosedDaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClosedDaysTable Test Case
 */
class ClosedDaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClosedDaysTable
     */
    public $ClosedDays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.closed_days'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClosedDays') ? [] : ['className' => 'App\Model\Table\ClosedDaysTable'];
        $this->ClosedDays = TableRegistry::get('ClosedDays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClosedDays);

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
