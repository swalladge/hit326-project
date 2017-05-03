<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipmentTable Test Case
 */
class EquipmentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipmentTable
     */
    public $Equipment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Equipment') ? [] : ['className' => 'App\Model\Table\EquipmentTable'];
        $this->Equipment = TableRegistry::get('Equipment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Equipment);

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
}
