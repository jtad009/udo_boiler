<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use Cake\Log\Log;
/**
 * WasteMarketMailer mailer.
 */
class SkoleMailer extends Mailer {

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'UDOMailer';
    private $url = "https://udo.com.ng/";
    private $no_reply = 'no-reply@udo.com.ng';
    public function implementedEvents() {

        return [
            
            'Controller.Results.Mail'=>'sendResult',
            'Mailer.email.company'=>'verifyCompany'
        ];
    }
   
    public function verifyCompany($entity) {
        $this->to($entity->email,$entity->name)
        ->replyTo($this->no_reply)
        ->subject("Email Account Confirmation")
        ->viewVars(['username'=>$entity->name,'confirmation_link'=>'<a href="companies/confirmation/'.$entity->code.'">Click link to confirm email</a>'])
        ->emailFormat('html')->layout('on_registration');

    }
    
    /**
    *Forgot Password emailer
    *@param array $user the details of the user who forgot his password
    */
    public function forgot($user){
                $this->to($user['email'],$user['first_name'].' '.$user['last_name'])
                ->subject("Password Reset")
                ->viewVars(['username'=>$user['username'],'confirmation_link'=>'<a href="'.$this->url.'users/reset/'.base64_encode($user['id']).'">Click link to Reset email</a>'])
                ->layout('forgot')
                ->emailFormat('both');
                
     }
}
