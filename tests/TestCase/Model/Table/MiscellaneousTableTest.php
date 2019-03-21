<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MiscellaneousTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MiscellaneousTable Test Case
 */
class MiscellaneousTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MiscellaneousTable
     */
    public $Miscellaneous;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.miscellaneous',
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
        'app.user_logs',
        'app.suppliers',
        'app.supplier_payments',
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
        $config = TableRegistry::exists('Miscellaneous') ? [] : ['className' => 'App\Model\Table\MiscellaneousTable'];
        $this->Miscellaneous = TableRegistry::get('Miscellaneous', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Miscellaneous);

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
