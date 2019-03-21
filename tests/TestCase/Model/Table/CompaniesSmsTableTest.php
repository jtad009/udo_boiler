<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesSmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesSmsTable Test Case
 */
class CompaniesSmsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesSmsTable
     */
    public $CompaniesSms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_sms',
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
        'app.supplier_payments',
        'app.document_categories',
        'app.documents',
        'app.expense_types',
        'app.settings',
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
        $config = TableRegistry::exists('CompaniesSms') ? [] : ['className' => 'App\Model\Table\CompaniesSmsTable'];
        $this->CompaniesSms = TableRegistry::get('CompaniesSms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesSms);

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
