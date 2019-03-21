<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

/**
 * Description of RegistrationComponent
 *
 * @author Epic
 */
class RegistrationComponent extends \Cake\Controller\Component{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $config_passed = array();
    public function initialize(array $config){
        $this->config_passed = $config;
    }

    //put your code here
    public function getWelcomeTemplate($user) {
        $options = [
            'company_telephone' => $user->phone,
                'USERNAME'=>$user->username,
            'APP_NAME'=>$this->config('configuration')['app_name'],
            'company_mail' => $user->email,
            'facebook_handle' => 'facebook.com/' . $this->config('configuration')['facebook_handle'],
            'twitter_handle' => 'twitter.com/' . $this->config('configuration')['twitter_handle'],
            'youtube_handle' => 'youtube.com/' . $this->config('configuration')['youtube_handle'],
            'link'=>'<a href="'.\Cake\Core\Configure::read('App.fullBaseUrl') . '/users/confirm/'.$user->code.'" target="_blank">Verify Link</a>',
           
            
        ];
        $templates = \Cake\Datasource\ConnectionManager::get('default')->execute("SELECT templates FROM templates WHERE type = 'REGISTRATION_MAIL'")->fetch('assoc');
        
        return \Cake\Utility\Text::insert($templates['templates'], $options);
    }
}
