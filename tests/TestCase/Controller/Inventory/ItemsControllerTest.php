<?php
namespace App\Test\TestCase\Controller\Inventory;

use App\Controller\Inventory\ItemsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Inventory\ItemsController Test Case
 */
class ItemsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.items',
        'app.units',
        'app.companies',
        'app.categories',
        'app.customers',
        'app.disease_conditions',
        'app.purchase_orders',
        'app.users',
        'app.sales',
        'app.user_logs',
        'app.locations',
        'app.expenses',
        'app.suppliers',
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
