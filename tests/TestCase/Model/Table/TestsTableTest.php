<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestsTable Test Case
 */
class TestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestsTable
     */
    public $Tests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tests',
        'app.students',
        'app.schools',
        'app.school_classes',
        'app.results',
        'app.subjects',
        'app.staffs',
        'app.sport_houses',
        'app.students_profiles',
        'app.school_classes_staffs',
        'app.staffs_subjects',
        'app.remarks',
        'app.comments',
        'app.results_comments',
        'app.settings',
        'app.subscriptions',
        'app.users',
        'app.feebooks',
        'app.students_feebooks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tests') ? [] : ['className' => 'App\Model\Table\TestsTable'];
        $this->Tests = TableRegistry::get('Tests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tests);

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
