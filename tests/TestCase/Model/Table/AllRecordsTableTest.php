<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllRecordsTable Test Case
 */
class AllRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AllRecordsTable
     */
    public $AllRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.all_records',
        'app.maneuvers_s',
        'app.powers_s',
        'app.powers_maneuvers',
        'app.targets_s',
        'app.targets_powers',
        'app.targets_parents',
        'app.sections_s',
        'app.sections_targets',
        'app.sections_section_types',
        'app.sections_modifiers',
        'app.modifiers_s',
        'app.modifiers_displays',
        'app.modifiers_modifier_classes',
        'app.modifiers_modifier_types',
        'app.modifier_classes_s',
        'app.modifier_types_s',
        'app.displays_s',
        'app.section_types_s',
        'app.modifier_values_s',
        'app.modifier_values_modifiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AllRecords') ? [] : ['className' => 'App\Model\Table\AllRecordsTable'];
        $this->AllRecords = TableRegistry::get('AllRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AllRecords);

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
