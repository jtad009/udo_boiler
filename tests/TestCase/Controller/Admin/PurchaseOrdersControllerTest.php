<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\PurchaseOrdersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\PurchaseOrdersController Test Case
 */
class PurchaseOrdersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purchase_orders',
        'app.customers',
        'app.companies',
        'app.categories',
        'app.items',
        'app.units',
        'app.sales',
        'app.users',
        'app.user_logs',
        'app.disease_conditions',
        'app.purchase_order'
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
