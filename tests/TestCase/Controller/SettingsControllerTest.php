<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SettingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SettingsController Test Case
 */
class SettingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.settings',
        'app.schools',
        'app.school_classes',
        'app.results',
        'app.students',
        'app.feebooks',
        'app.students_feebooks',
        'app.students_profiles',
        'app.sport_houses',
        'app.staffs',
        'app.school_classes_staffs',
        'app.subjects',
        'app.staffs_subjects',
        'app.tests',
        'app.remarks',
        'app.comments',
        'app.results_comments',
        'app.subscriptions',
        'app.users'
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
