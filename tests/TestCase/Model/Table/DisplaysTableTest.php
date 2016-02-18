<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisplaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisplaysTable Test Case
 */
class DisplaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DisplaysTable
     */
    public $Displays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.displays',
        'app.modifiers',
        'app.abilities',
        'app.maneuvers',
        'app.powers',
        'app.abilities_displays'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Displays') ? [] : ['className' => 'App\Model\Table\DisplaysTable'];
        $this->Displays = TableRegistry::get('Displays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Displays);

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
