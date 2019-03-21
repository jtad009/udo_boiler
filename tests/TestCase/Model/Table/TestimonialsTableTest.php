<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestimonialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestimonialsTable Test Case
 */
class TestimonialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestimonialsTable
     */
    public $Testimonials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.testimonials',
        'app.users',
        'app.schools',
        'app.states',
        'app.school_classes',
        'app.results',
        'app.students',
        'app.siblings',
        'app.students_profiles',
        'app.sport_houses',
        'app.staffs',
        'app.school_classes_staffs',
        'app.subjects',
        'app.staffs_subjects',
        'app.students_results_comments',
        'app.comments',
        'app.tests',
        'app.feebooks',
        'app.students_feebooks',
        'app.psycomotors',
        'app.students_psycomotors',
        'app.remarks',
        'app.school_classes_subjects',
        'app.schools_sms',
        'app.settings',
        'app.subscriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Testimonials') ? [] : ['className' => 'App\Model\Table\TestimonialsTable'];
        $this->Testimonials = TableRegistry::get('Testimonials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Testimonials);

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
