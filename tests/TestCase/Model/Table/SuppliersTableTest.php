<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuppliersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuppliersTable Test Case
 */
class SuppliersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuppliersTable
     */
    public $Suppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suppliers',
        'app.companies',
        'app.categories',
        'app.items',
        'app.units',
        'app.purchase_orders',
        'app.customers',
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
        $config = TableRegistry::exists('Suppliers') ? [] : ['className' => 'App\Model\Table\SuppliersTable'];
        $this->Suppliers = TableRegistry::get('Suppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Suppliers);

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
