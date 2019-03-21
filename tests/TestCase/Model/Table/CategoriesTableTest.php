<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesTable Test Case
 */
class CategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesTable
     */
    public $Categories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories',
        'app.companies',
        'app.conditions',
        'app.customers',
        'app.disease_conditions',
        'app.purchase_orders',
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
        $config = TableRegistry::exists('Categories') ? [] : ['className' => 'App\Model\Table\CategoriesTable'];
        $this->Categories = TableRegistry::get('Categories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categories);

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
