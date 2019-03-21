<?php
namespace App\Test\TestCase\Form;

use App\Form\PurchaseSmsForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\PurchaseSmsForm Test Case
 */
class PurchaseSmsFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\PurchaseSmsForm
     */
    public $PurchaseSms;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->PurchaseSms = new PurchaseSmsForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PurchaseSms);

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
