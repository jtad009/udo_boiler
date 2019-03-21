<?php
namespace CurlManager\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * PayStack component
 */
class PayStackComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['CurlConnection'];
    private $testCode = "sk_live_cac85ba3e0ee59c64df43456719b1a5eb14ac917";
    private $code = "sk_live_cac85ba3e0ee59c64df43456719b1a5eb14ac917";
    private $publicKey = "pk_live_f1476b9bf1e3f39315c291551525351891fdaba3";
    public function payWithPaystack($postdata){
        $result = array();

        //Set other parameters as keys in the $postdata array
       // $postdata =  
        $url = "https://api.paystack.co/transaction/initialize";
$options = array(
          CURLOPT_URL => $url,
          CURLOPT_POST => 1,
          CURLOPT_POSTFIELDS=>json_encode($postdata),
          CURLOPT_RETURNTRANSFER=>true,
          CURLOPT_HTTPHEADER => [
                'Authorization: Bearer '.$this->code,
                'Content-Type: application/json',
          ],
        );
        
        
       $request = $this->CurlConnection->payStackConnection($options);
        if ($request) {
          $result = json_decode($request);
          //debug($request);
          if(!$result->status){
			  // there was an error from the API
           
			  die('API returned error: ' . $result->message);
			}else{
				
				return $result;
			}
         
        }
    }
    /**
    * Save a copy last transaction to the db
    * @param int $id this identifies who performed the transaction
    * @param string $ref this is sent from the payment processor to all skole track this transaction

    */
    public function save_last_transaction_reference($id,$ref){
        \Cake\Datasource\ConnectionManager::get('default')->execute("INSERT INTO wallet_transactions (wallet_id,transactionId,created) VALUES(:id,:ref,now())",['id'=>$id,'ref'=>$ref]);
    	
    }
    /**
    *update the user with the value  they have purchased.
    * incase of network error the method will check to see if this user had tried to make a purchaee that got cancled/timedout by network latency
    *@param string $tranx the transaction id from the payment processor
    *@param int $user_id this identifies the customer that made the purchase

    */
    private function updateTransaction($tranx,$user_id){
        //check if the transaction was completed previously incase of users who will reload the page again and expect the sstem to give them double value
        $valueGiven = \Cake\Datasource\ConnectionManager::get('default')->execute("SELECT count(*) as c FROM wallet_transactions WHERE transactionId  = :ref AND status = true",[':ref'=>$tranx->data->reference])->fetchAll('assoc');
      $feePaid = substr($tranx->data->fees, (strlen($tranx->data->fees)-2),strlen($tranx->data->fees));
    	if($valueGiven[0]['c'] == 0):

            //update user wallet with value
            \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE wallet SET amount = (amount + :amount) where user_id  = :user",['amount'=>$tranx->data->fees,'user'=>$user_id]);
            //mark transction as complete
            $now = \Cake\I18n\Time::parse('now');
            \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE wallet_transactions SET status = true, memo = :memo, created = :created where transactionId  = :ref",['memo'=>$tranx->message,'ref'=>$tranx->data->reference,'created'=>$now]);
    	endif;
    }
    public function handleWebhook(){
    	// Retrieve the request's body
			$body = @file_get_contents("php://input");
			$signature = (isset($_SERVER['HTTP_X_PAYSTACK_SIGNATURE']) ? $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] : '');

			/* It is a good idea to log all events received. Add code *
			 * here to log the signature and body to db or file       */

			if (!$signature) {
			    // only a post with paystack signature header gets our attention
			    exit();
			}

			define('PAYSTACK_SECRET_KEY',$this->code);
			// confirm the event's signature
			if( $signature !== hash_hmac('sha512', $body, PAYSTACK_SECRET_KEY) ){
			  // silently forget this ever happened
			  exit();
			}

			http_response_code(200);
			// parse event (which is json string) as object
			// Give value to your customer but don't give any output
			// Remember that this is a call from Paystack's servers and 
			// Your customer is not seeing the response here at all
			$event = json_decode($body);
			switch($event->event){
			    // charge.success
			    case 'charge.success':
			        // TIP: you may still verify the transaction
			    		// before giving value.
			        break;
			}
			exit();
    }
    public function callback($reference,$user_id){
    	$options = array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Bearer ".$this->code,
            "cache-control: no-cache"
          ],
        );

		$response = $this->CurlConnection->payStackConnection($options);

		$tranx = json_decode($response);
		// debug($tranx);
		if(!$tranx->status){
		  // there was an error from the API
		  die('API returned error: ' . $tranx->message);
		}

		if('success' == $tranx->data->status){
		  // transaction was successful...
		  // please check other things like whether you already gave value for this ref
			$this->updateTransaction($tranx,$user_id);

			// $verdict_notification_event_2 = new \Cake\Event\Event('Controller.Notification.log',$this,[
   //                      'title'=> CURRENCY.' '.$tranx->data->fees.'  has been added to wallet ',
   //                      'from'=>'Shoutbank',
   //                      'for'=>$user_id
   //               ]);
			// $this->eventManager()->dispatch($verdict_notification_event_2);
		  // if the email matches the customer who owns the product etc
		  // Give value
		}

    }
    
}
