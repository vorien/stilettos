<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbilitiesGridTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbilitiesGridTable Test Case
 */
class AbilitiesGridTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbilitiesGridTable
     */
    public $AbilitiesGrid;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abilities_grid',
        'app.maneuvers',
        'app.powers',
        'app.displays',
        'app.modifier_classes',
        'app.modifier_types',
        'app.modifiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AbilitiesGrid') ? [] : ['className' => 'App\Model\Table\AbilitiesGridTable'];
        $this->AbilitiesGrid = TableRegistry::get('AbilitiesGrid', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AbilitiesGrid);

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
