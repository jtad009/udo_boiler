<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseOrdersTable Test Case
 */
class PurchaseOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseOrdersTable
     */
    public $PurchaseOrders;

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
        'app.suppliers',
        'app.locations',
        'app.companies_sms',
        'app.expenses',
        'app.miscellaneous',
        'app.users',
        'app.sales',
        'app.user_logs',
        'app.settings',
        'app.supplier_payments',
        'app.conditions',
        'app.disease_conditions',
        'app.document_categories',
        'app.documents',
        'app.expense_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PurchaseOrders') ? [] : ['className' => 'App\Model\Table\PurchaseOrdersTable'];
        $this->PurchaseOrders = TableRegistry::get('PurchaseOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PurchaseOrders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findPOCollection method
     *
     * @return void
     */
    public function testFindPOCollection()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
