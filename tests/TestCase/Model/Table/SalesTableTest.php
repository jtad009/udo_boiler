<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesTable Test Case
 */
class SalesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesTable
     */
    public $Sales;

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
        'app.conditions',
        'app.document_categories',
        'app.documents',
        'app.expense_types',
        'app.items',
        'app.units',
        'app.suppliers',
        'app.purchase_orders',
        'app.users',
        'app.locations',
        'app.companies_sms',
        'app.expenses',
        'app.miscellaneous',
        'app.settings',
        'app.supplier_payments',
        'app.user_logs',
        'app.disease_conditions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sales') ? [] : ['className' => 'App\Model\Table\SalesTable'];
        $this->Sales = TableRegistry::get('Sales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    // public function tearDown()
    // {
    //     unset($this->Sales);

    //     parent::tearDown();
    // }

    

    /**
     * Test findSales method
     *
     * @return void
     */
    public function testFindSales()
    {

        $findSalesByDate = $this->Sales->find('Sales',[
            'date'=>'24/01/2019 - 24/01/2019',
            'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f'
        ])->first()->toArray();
        //debug($findSalesByInvoice);
        $findSalesByDate['created'] = date('Y-m-d',strtotime($findSalesByDate['created']));
        $findSalesByDate['times'] = date('H:m:s',strtotime($findSalesByDate['times']));
        
        $expected = [
            'quantity' => (int) 1,
            'times' => '09:01:00',
            'cost' => (float) 600,
            'invoice_no' => 'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
            'created' => '2019-01-24',
            'user' => [
                    'username' => 'Lorem ipsum dolor sit amet'
            ]
            
        ];
         // 'invoice_no' => 'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
         //    'cost' => (float) 600,
         //    'location_id' => '74e77202-6a36-4a4a-8b86-8f0481d174e6'
        $this->assertEquals($expected,$findSalesByDate);

        $findSalesByDate_n_Invoice = $this->Sales->find('Sales',[
            'date'=>'24/01/2019 - 24/01/2019',
            'invoice_no'=>'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
            'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f'
        ])->first()->toArray();
        $findSalesByDate_n_Invoice['created'] = date('Y-m-d',strtotime($findSalesByDate_n_Invoice['created']));
        $findSalesByDate_n_Invoice['times'] = date('H:m:s',strtotime($findSalesByDate_n_Invoice['times']));
        $this->assertEquals($expected,$findSalesByDate_n_Invoice);

        $findSalesByInvoice = $this->Sales->find('Sales',[
            'invoice_no'=>'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
            'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f'
        ])->first()->toArray();
        $findSalesByInvoice['created'] = date('Y-m-d',strtotime($findSalesByInvoice['created']));
        $findSalesByInvoice['times'] = date('H:m:s',strtotime($findSalesByInvoice['times']));
        $this->assertEquals($expected,$findSalesByInvoice);
        
    }
    public function testFindDailyProfitSummary(){
        // $findProfitByDate = $this->Sales->find('DailyProfitSummary',[
        //     'date'=>'24/01/2019 - 24/01/2019',
        //     'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f'
        // ])->first()->toArray();
        // debug($findProfitByDate);
        // $findSalesByDate['created'] = date('Y-m-d',strtotime($findSalesByDate['created']));
        // $findSalesByDate['times'] = date('H:m:s',strtotime($findSalesByDate['times']));
        
        // $expected = [
        //     'quantity' => (int) 1,
        //     'times' => '09:01:00',
        //     'cost' => (float) 600,
        //     'invoice_no' => 'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
        //     'created' => '2019-01-24',
        //     'user' => [
        //             'username' => 'Lorem ipsum dolor sit amet'
        //     ]
            
        // ];
        //  // 'invoice_no' => 'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
        //  //    'cost' => (float) 600,
        //  //    'location_id' => '74e77202-6a36-4a4a-8b86-8f0481d174e6'
        // $this->assertEquals($expected,$findSalesByDate);

        // $findProfitDate_n_Invoice = $this->Sales->find('DailyProfitSummary',[
        //     'date'=>'24?01/2019 - 24/01/2019',
        //     'invoice_no'=>'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
        //     'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f'
        // ])->first()->toArray();
        // debug($findProfitDate_n_Invoice);
        // $findSalesByDate_n_Invoice['created'] = date('Y-m-d',strtotime($findSalesByDate_n_Invoice['created']));
        // $findSalesByDate_n_Invoice['times'] = date('H:m:s',strtotime($findSalesByDate_n_Invoice['times']));
        // $this->assertEquals($expected,$findSalesByDate_n_Invoice);

        $findProfitByInvoice = $this->Sales->find('DailyProfitSummary',[
            'invoice_nosssss'=>'f5e98e42-b0d2-4c51-bf02-b448e53261fc',
            'company'=>'5ad40755-4801-4f94-9ed7-9d62129e5e1f',
            'di'=>'435'
        ])->first()->toArray();
        debug($findProfitDate_n_Invoice);
        // $findSalesByInvoice['created'] = date('Y-m-d',strtotime($findSalesByInvoice['created']));
        // $findSalesByInvoice['times'] = date('H:m:s',strtotime($findSalesByInvoice['times']));
         $this->assertEquals($expected,$findProfitDate_n_Invoice);
    }
    /**
     * Test findMostSold method
     *
     * @return void
     */
    public function testFindMostSold()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test log method
     *
     * @return void
     */
    public function testLog()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
