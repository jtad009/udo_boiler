<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\CategoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\CategoriesController Test Case
 */
class CategoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories',
        'app.companies',
        'app.customers',
        'app.disease_conditions',
        'app.purchase_order',
        'app.sales',
        'app.items',
        'app.units',
        'app.users',
        'app.product_signup',
        'app.products',
        'app.runs',
        'app.stages',
        'app.wallet',
        'app.wallet_transactions',
        'app.withdrawals'
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
