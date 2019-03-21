<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsTable Test Case
 */
class ItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemsTable
     */
    public $Items;

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
        'app.conditions',
        'app.customers',
        'app.disease_conditions',
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
        $config = TableRegistry::exists('Items') ? [] : ['className' => 'App\Model\Table\ItemsTable'];
        $this->Items = TableRegistry::get('Items', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
       //unset($this->Items);

        parent::tearDown();
    }

    public function testSaving() {
        $data = [
                'id' => 1,
                'name' => NULL,
                'quantity' => NULL,
                'unit_id' => NULL,
                'cost_price' => NULL,
                'markup' => NULL,
                'expiration_date' => NULL,
                'created' => NULL,
                'company_id' => '78383df3-d41a-47d7-aff5-eb4c83db00df',
                'category_id' => NULL,
                'product_code' => NULL,
                'supplier_id' => NULL,
                'markup_wholesale' => NULL,
                'threshold' => NULL,
                'location_id' => NULL,
                'expired' => NULL,
                'hold' => NULL,
                'retail_sp' => NULL,
                'whole_sp' => NULL,
                'quantity_sold' => NULL,
                'description' => NULL,
                'images' => NULL
            ];
        $todo = $this->Items->newEntity($data);
        $resultingError = $this->Items->validator()->errors($data);
        $expectedError = [
            'name' => ["_empty"=>"This field cannot be left empty"],
            'whole_sp' => ["_empty"=>"This field cannot be left empty"],
            'product_code' => ["_empty"=>"This field cannot be left empty",],
            'hold' => ["_empty"=>"This field cannot be left empty",],
            'retail_sp' => ["_empty"=>"This field cannot be left empty",],
            'quantity' => ["_empty"=>"This field cannot be left empty",],
            'cost_price' => ["_empty"=>"This field cannot be left empty",],
            'markup_wholesale' => ["_empty"=>"This field cannot be left empty",],
            'threshold' => ["_empty"=>"This field cannot be left empty",],
            'expired' => ["_empty"=>"This field cannot be left empty",],
            'markup' => ["_empty"=>"This field cannot be left empty",],
            'quantity_sold' => ["_empty"=>"This field cannot be left empty",]
        ];
        $this->assertEquals($expectedError, $resultingError);
        //get total Item Saved
        $total = $this->Items->find()->count();
        $this->assertEquals(3, $total);

        $data = [
                'id' => 3,
                'name' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'unit_id' => 1,
                'cost_price' => 1,
                'markup' => 1,
                'expiration_date' => '2019-04-30',
                'created' => '2019-04-24',
                'company_id' => '78383df3-d41a-47d7-aff5-eb4c83db00df',
                'category_id' => 1,
                'product_code' => 'Lorem ipsum dolor sit amet',
                'supplier_id' => 1,
                'markup_wholesale' => 1,
                'threshold' => 1,
                'location_id' => 'a4f2a390-c612-442b-af1e-840cdb921bb9',
                'expired' => 1,
                'hold' => 1,
                'retail_sp' => 1,
                'whole_sp' => 1,
                'quantity_sold' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'images' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
            ];
        $todo = $this->Items->newEntity($data);
        if($this->Items->save($todo)){
            $newTotal = $this->Items->find()->count();
            $this->assertEquals(3, $newTotal);
        }
    
    }

    /**
     * Test findExpiredItems method
     *
     * @return void
     */
    public function testFindExpiredItems()
    {
      /*************
        *FIND ITEMS THAT ARE NEAR EXPIRY AND PERISHABLE
        ************/
        $result = $this->Items->find('expiredItems',['cID'=>'78383df3-d41a-47d7-aff5-eb4c83db00df','expiryInDays'=>100,'perishable'=>0,'expired'=>0])->first()->toArray();//perishable items
        
        $result['expiration_date'] = date('Y-m-d',strtotime($result['expiration_date']));
        $expected = [
             'eDays' => '62',
             'cName' => 'Lorem ipsum dolor sit amet',
             'expired'=>false,
             'iName' => 'amet',
             'itemID' => '3',
             'cost_price' => (int) 1,
             'quantity' => (int) 1,
             'expiration_date' =>  date('Y-m-d',strtotime($result['expiration_date'])),
             'id'=>3
        ];

        $this->assertEquals($expected, $result);
        /*************
        *FIND ITEMS THAT ARE EXPIRED AND PERISHABLE
        ************/
        
        $result = $this->Items->find('expiredItems',['cID'=>'78383df3-d41a-47d7-aff5-eb4c83db00df','expiryInDays'=>100,'perishable'=>0,'expired'=>true])->first()->toArray();
        
        $result['expiration_date'] = date('Y-m-d',strtotime($result['expiration_date']));
        $expected = [
             'eDays' => '28',
             'cName' => 'Lorem ipsum dolor sit amet',
             'expired'=>(int) 1,
             'iName' => 'Lorem ipsum dolor sit amet',
             'itemID' => '1',
             'cost_price' => (int) 1,
             'quantity' => (int) 1,
             'expiration_date' =>  '2019-02-24',
             'id'=>1
        ];
        $this->assertEquals($expected, $result);
    }
    /**
     * Test findExpiredItemsGroup method
     *
     * @return void
     */
    public function testFindExpiredItemsGroup()
    {
        $result = $this->Items->find('ExpiredItemsGroup',['cID'=>'78383df3-d41a-47d7-aff5-eb4c83db00df','expiryInDays'=>100]);
        $recent = $result->first()->toArray();
        $recent['expiration_date'] = date('Y-m-d',strtotime($recent['expiration_date']));
    
        $expected = [
            'eDays' => '62',
            'cName' => 'Lorem ipsum dolor sit amet',
            'itemID' => '3',
            'counts'=> (int) 1,
            'cost_price' => (int) 1,
            'quantity' => (int) 1,
            'expiration_date' => date('Y-m-d',strtotime($recent['expiration_date']))
        ];

        $this->assertEquals($expected, $recent);
    }
  
}
