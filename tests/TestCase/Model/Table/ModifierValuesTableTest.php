<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModifierValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModifierValuesTable Test Case
 */
class ModifierValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModifierValuesTable
     */
    public $ModifierValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modifier_values',
        'app.modifiers',
        'app.displays',
        'app.modifier_classes',
        'app.modifier_types',
        'app.sections',
        'app.targets',
        'app.powers',
        'app.maneuvers',
        'app.saved_values',
        'app.saved_settings',
        'app.section_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ModifierValues') ? [] : ['className' => 'App\Model\Table\ModifierValuesTable'];
        $this->ModifierValues = TableRegistry::get('ModifierValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModifierValues);

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
