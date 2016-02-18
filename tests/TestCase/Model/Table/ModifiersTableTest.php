<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModifiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModifiersTable Test Case
 */
class ModifiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModifiersTable
     */
    public $Modifiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modifiers',
        'app.displays',
        'app.abilities',
        'app.maneuvers',
        'app.powers',
        'app.abilities_displays',
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
        $config = TableRegistry::exists('Modifiers') ? [] : ['className' => 'App\Model\Table\ModifiersTable'];
        $this->Modifiers = TableRegistry::get('Modifiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Modifiers);

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
