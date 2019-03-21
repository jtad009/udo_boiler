<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\SupplierPaymentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\SupplierPaymentsController Test Case
 */
class SupplierPaymentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_payments',
        'app.locations',
        'app.companies',
        'app.categories',
        'app.customers',
        'app.disease_conditions',
        'app.purchase_orders',
        'app.items',
        'app.units',
        'app.suppliers',
        'app.sales',
        'app.users',
        'app.user_logs',
        'app.expenses'
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
