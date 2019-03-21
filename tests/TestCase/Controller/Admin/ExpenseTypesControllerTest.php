<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\ExpenseTypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\ExpenseTypesController Test Case
 */
class ExpenseTypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.expense_types',
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
        'app.locations',
        'app.expenses',
        'app.settings'
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
