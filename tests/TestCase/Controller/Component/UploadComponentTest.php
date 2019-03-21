<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UploadComponent Test Case
 */
class UploadComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\UploadComponent
     */
    public $Upload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Upload = new UploadComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Upload);

        parent::tearDown();
    }

    /**
     * Test uploadMultiple method
     *
     * @return void
     */
    public function testUploadMultiple()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test send method
     *
     * @return void
     */
    public function testSend()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
