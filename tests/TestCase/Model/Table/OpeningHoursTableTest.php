<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeningHoursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeningHoursTable Test Case
 */
class OpeningHoursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeningHoursTable
     */
    public $OpeningHours;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opening_hours'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeningHours') ? [] : ['className' => 'App\Model\Table\OpeningHoursTable'];
        $this->OpeningHours = TableRegistry::get('OpeningHours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeningHours);

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
