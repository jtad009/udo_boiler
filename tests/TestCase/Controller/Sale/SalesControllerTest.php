<?php
namespace App\Test\TestCase\Controller\Sale;

use App\Controller\Sale\SalesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Sale\SalesController Test Case
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
        'app.suppliers',
        'app.purchase_orders',
        'app.users',
        'app.user_logs',
        'app.locations',
        'app.expenses',
        'app.settings',
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
