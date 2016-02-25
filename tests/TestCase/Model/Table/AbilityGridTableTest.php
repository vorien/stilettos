<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbilityGridTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbilityGridTable Test Case
 */
class AbilityGridTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbilityGridTable
     */
    public $AbilityGrid;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ability_grid',
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
        $config = TableRegistry::exists('AbilityGrid') ? [] : ['className' => 'App\Model\Table\AbilityGridTable'];
        $this->AbilityGrid = TableRegistry::get('AbilityGrid', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AbilityGrid);

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
