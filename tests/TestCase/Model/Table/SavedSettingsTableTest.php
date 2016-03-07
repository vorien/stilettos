<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SavedSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SavedSettingsTable Test Case
 */
class SavedSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SavedSettingsTable
     */
    public $SavedSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.saved_settings',
        'app.saved_values',
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
        $config = TableRegistry::exists('SavedSettings') ? [] : ['className' => 'App\Model\Table\SavedSettingsTable'];
        $this->SavedSettings = TableRegistry::get('SavedSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SavedSettings);

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
