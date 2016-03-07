<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModifiersDownTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModifiersDownTable Test Case
 */
class ModifiersDownTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModifiersDownTable
     */
    public $ModifiersDown;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modifiers_down',
        'app.modifiers_s',
        'app.modifiers_displays',
        'app.modifiers_modifier_classes',
        'app.modifiers_modifier_types',
        'app.modifier_classes_s',
        'app.modifier_types_s',
        'app.displays_s',
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
        $config = TableRegistry::exists('ModifiersDown') ? [] : ['className' => 'App\Model\Table\ModifiersDownTable'];
        $this->ModifiersDown = TableRegistry::get('ModifiersDown', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModifiersDown);

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
