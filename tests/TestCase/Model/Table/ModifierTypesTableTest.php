<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModifierTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModifierTypesTable Test Case
 */
class ModifierTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModifierTypesTable
     */
    public $ModifierTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modifier_types',
        'app.modifiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ModifierTypes') ? [] : ['className' => 'App\Model\Table\ModifierTypesTable'];
        $this->ModifierTypes = TableRegistry::get('ModifierTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModifierTypes);

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
