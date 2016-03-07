<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManeuversTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManeuversTable Test Case
 */
class ManeuversTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManeuversTable
     */
    public $Maneuvers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.maneuvers',
        'app.powers',
        'app.targets',
        'app.saved_values',
        'app.saved_settings',
        'app.modifier_values',
        'app.modifiers',
        'app.displays',
        'app.modifier_classes',
        'app.modifier_types',
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
        $config = TableRegistry::exists('Maneuvers') ? [] : ['className' => 'App\Model\Table\ManeuversTable'];
        $this->Maneuvers = TableRegistry::get('Maneuvers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Maneuvers);

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
