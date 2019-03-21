<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\DecideUserComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\DecideUserComponent Test Case
 */
class DecideUserComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\DecideUserComponent
     */
    public $DecideUser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->DecideUser = new DecideUserComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DecideUser);

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
