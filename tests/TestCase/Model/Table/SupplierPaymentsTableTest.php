<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierPaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierPaymentsTable Test Case
 */
class SupplierPaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierPaymentsTable
     */
    public $SupplierPayments;

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
        'app.items',
        'app.units',
        'app.purchase_orders',
        'app.customers',
        'app.conditions',
        'app.disease_conditions',
        'app.sales',
        'app.users',
        'app.miscellaneous',
        'app.user_logs',
        'app.suppliers',
        'app.document_categories',
        'app.documents',
        'app.expense_types',
        'app.settings',
        'app.companies_sms',
        'app.expenses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierPayments') ? [] : ['className' => 'App\Model\Table\SupplierPaymentsTable'];
        $this->SupplierPayments = TableRegistry::get('SupplierPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierPayments);

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
}
