<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\FindExpiryBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\FindExpiryBehavior Test Case
 */
class FindExpiryBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\FindExpiryBehavior
     */
    public $FindExpiry;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->FindExpiry = new FindExpiryBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FindExpiry);

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
