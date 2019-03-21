<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Form\SmsForm;
use Cake\I18n\Date;
use Cake\Log\LogTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $loggedInUser = array();
    public $configurations = [];
    use LogTrait;
    public function beforeFilter(Event $event) {
         //$this->Auth->allow(['home', 'faq','about','forgot','contact','confirmation']);
         ///debug($this->Auth->user());
         if(!is_null($this->Auth->user())){
            $this->configurations = $this->loadConfigurations();
         }
          
          
        return parent::beforeFilter($event);
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //$this->loadComponent('CurlManager.PayStack');
       
        //$this->loadComponent('CurlManager.CurlConnection');
        $this->loadComponent('DecideUser');
        
        
        $this->loadComponent('Auth', [
            //'authorize'=> 'Controller',//added this line
            'authenticate' => [

                'Form' => [
                    // 'passwordHasher' => [
                    // 'className' => 'Legacy'
                    //                 ],
                    //'finder'=>'User',
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
                'plugin'=>null,
                'prefix'=>false
            ],
            
            'redirectUrl'=>$this->referrer
        ]);
        
        

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    private function _validateAndSetCurrentUser() {
        $loggedInUser = $this->Auth->user();
        //var_dump($loggedInUser);
        if (!is_null($loggedInUser)):
            $this->loggedInUser = $loggedInUser;
            if ('login' == $this->request->param['action']):
            //        // $this->redirect('');//goto the dashboard for user
            endif;

        endif;
    }



    public function isAuthorized($user) {
        //any registered user can access functions
       
        return false;
    }

    /**
     * Take  alog of every activity the user performs for accountability
     * @param $data array event data
     * @param $controller string the event identifier e.g Controller.Users.add
     *
     */
    public function setLog(array $data,$controller ="Controller.Log.add")
   {
       $event = new Event($controller,$this,$data);
       ///$this->eventManager()->dispatch($event);
   }

    public function loadConfigurations() {
        // var_dump($this->Auth->user());
        $this->loadModel('Settings');
        //$school = is_null() ? $this->Auth->user('school_id') : $school_id;
        $settings = $this->Settings->find('all')->contain(['Companies'=>['conditions'=>['Companies.id'=>$this->Auth->user('company_id')]],'Locations.CompaniesSms'])->hydrate(false)->toArray();
       
        if(!empty($settings)){
           $this->configurations =  $settings[0]; 
           $this->set('configuration', $settings[0]);
        }else{
            $this->loadModel('Companies');
            $company = $this->Companies->find('all')->where(['id'=>$this->Auth->user('company_id')])->hydrate(false)->toArray();
           
            $settings[0]['company']=$company[0];
            $settings[0]['default_retail_markup'] = 0.1;
            $settings[0]['default_wholesale_markup'] = 0.1;
            $settings[0]['default_item_threshold'] = 12;
            $settings[0]['expiry_notification'] = 12;
            $settings[0]['location_id'] = $this->Auth->user('location_id');
            $settings[0]['created'] = date('Y-m-d');
            $settings[0]['id'] = 1;
            $settings[0]['po_collection_notifications'] = 12;
            $settings[0]['supplier_payment_notification'] = 12;
            $settings[0]['company_id'] = $this->Auth->user('company_id');
            $settings[0]['is_default'] = 1;
            $settings[0]['inventory_type'] = 'FIFO';
            $this->configurations =  $settings[0]; 
           $this->set('configuration', $settings[0]);
        }
        
        return $settings;
    }


}
