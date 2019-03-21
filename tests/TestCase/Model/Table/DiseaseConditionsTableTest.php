<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiseaseConditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiseaseConditionsTable Test Case
 */
class DiseaseConditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiseaseConditionsTable
     */
    public $DiseaseConditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.disease_conditions',
        'app.customers',
        'app.companies',
        'app.categories',
        'app.items',
        'app.units',
        'app.purchase_orders',
        'app.users',
        'app.locations',
        'app.companies_sms',
        'app.expenses',
        'app.miscellaneous',
        'app.sales',
        'app.settings',
        'app.supplier_payments',
        'app.suppliers',
        'app.user_logs',
        'app.conditions',
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
        $config = TableRegistry::exists('DiseaseConditions') ? [] : ['className' => 'App\Model\Table\DiseaseConditionsTable'];
        $this->DiseaseConditions = TableRegistry::get('DiseaseConditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DiseaseConditions);

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
