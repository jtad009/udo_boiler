<?php
namespace App\Test\TestCase\Form;

use App\Form\SmsForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\SmsForm Test Case
 */
class SmsFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\SmsForm
     */
    public $Sms;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Sms = new SmsForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sms);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
