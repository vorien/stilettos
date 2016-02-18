<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbilitiesDisplaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbilitiesDisplaysTable Test Case
 */
class AbilitiesDisplaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbilitiesDisplaysTable
     */
    public $AbilitiesDisplays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abilities_displays',
        'app.abilities',
        'app.maneuvers',
        'app.powers',
        'app.displays'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AbilitiesDisplays') ? [] : ['className' => 'App\Model\Table\AbilitiesDisplaysTable'];
        $this->AbilitiesDisplays = TableRegistry::get('AbilitiesDisplays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AbilitiesDisplays);

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
