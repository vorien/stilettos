<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SavedValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SavedValuesTable Test Case
 */
class SavedValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SavedValuesTable
     */
    public $SavedValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.saved_values',
        'app.saved_settings',
        'app.targets',
        'app.powers',
        'app.maneuvers',
        'app.sections',
        'app.section_types',
        'app.modifiers',
        'app.displays',
        'app.modifier_classes',
        'app.modifier_types',
        'app.modifier_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SavedValues') ? [] : ['className' => 'App\Model\Table\SavedValuesTable'];
        $this->SavedValues = TableRegistry::get('SavedValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SavedValues);

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
