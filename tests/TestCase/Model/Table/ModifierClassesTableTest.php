<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModifierClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModifierClassesTable Test Case
 */
class ModifierClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModifierClassesTable
     */
    public $ModifierClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modifier_classes',
        'app.modifiers',
        'app.displays',
        'app.modifier_types',
        'app.modifier_values',
        'app.saved_values',
        'app.saved_settings',
        'app.targets',
        'app.powers',
        'app.maneuvers',
        'app.sections',
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
        $config = TableRegistry::exists('ModifierClasses') ? [] : ['className' => 'App\Model\Table\ModifierClassesTable'];
        $this->ModifierClasses = TableRegistry::get('ModifierClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModifierClasses);

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
