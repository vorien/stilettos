<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AllRecordsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AllRecordsController Test Case
 */
class AllRecordsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
