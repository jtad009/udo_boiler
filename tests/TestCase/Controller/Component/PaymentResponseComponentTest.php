<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PaymentResponseComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PaymentResponseComponent Test Case
 */
class PaymentResponseComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\PaymentResponseComponent
     */
    public $PaymentResponse;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->PaymentResponse = new PaymentResponseComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentResponse);

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
