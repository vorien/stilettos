<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionsTable Test Case
 */
class SectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionsTable
     */
    public $Sections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sections',
        'app.targets',
        'app.powers',
        'app.maneuvers',
        'app.saved_values',
        'app.saved_settings',
        'app.modifier_values',
        'app.modifiers',
        'app.displays',
        'app.modifier_classes',
        'app.modifier_types',
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
        $config = TableRegistry::exists('Sections') ? [] : ['className' => 'App\Model\Table\SectionsTable'];
        $this->Sections = TableRegistry::get('Sections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sections);

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
