<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\SalesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\SalesController Test Case
 */
class SalesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sales',
        'app.customers',
        'app.companies',
        'app.categories',
        'app.items',
        'app.units',
        'app.purchase_order',
        'app.users',
        'app.product_signup',
        'app.products',
        'app.wallet',
        'app.withdrawals',
        'app.disease_conditions'
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
