<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * PaymentResponse component
 */
class PaymentResponseComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
      public function urlOpen($url) {
       
                // Fake the browser type 
                ini_set('user_agent', 'MSIE 4\.0b2;');

                $dh = fopen("$url", 'r') != FALSE ? fopen("$url", 'r') : "0";
                $result = fread($dh, 8192);

        return $result;
    }
    public function testUrl(){
       $json = [
            'memo'=>'The NEw Test',
           'status'=>'Approved',
           'total_paid_by_buyer'=>6790,
           'total_credited_to_merchant'=>9090,
           'transaction_id'=>'demo-596a9f2774ebc',
           'date'=>'2017-07-16 00:03:10'
            ];
       return json_encode($json);
    }
}
