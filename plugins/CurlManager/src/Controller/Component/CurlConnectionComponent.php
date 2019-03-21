<?php
namespace CurlManager\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * CurlConnection component
 */
class CurlConnectionComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getUsingCurl($method,$url,$header,$data,$json){
        if($method ==   1){
            $method_type = 1; //POST
        }else{
            $method_type = 0; //GET
        }
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_HEADER,0);

        if($header !== 0){
            curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        }
        curl_setopt($curl,CURLOPT_POST,$method_type);
        if($data !== 0){
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }
        $response = curl_exec($curl);
        if($json == 0){
            $json = $response;
        }else{
            $json =  json_decode($response,true);
        }
        curl_close($curl);
        return $json;
    }
    public function  urlOpen($url) {
       
                // Fake the browser type 
                ini_set('user_agent', 'MSIE 4\.0b2;');

                $dh = fopen("$url", 'r') != FALSE ? fopen("$url", 'r') : "0";
                $result = fread($dh, 8192);

        return $result;
    }
    public function payStackConnection($options){
        $curl = curl_init();
        curl_setopt_array($curl,$options);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
          die('Curl returned error: ' . $err);
        }else{
            return $response;
        }
    }
}
