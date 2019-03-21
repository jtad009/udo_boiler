<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Http\Client;
/**
 * Sms Form.
 */
class SmsForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('to', 'string')
                ->addField('from', ['type' => 'string'])
                ->addField('message', ['type' => 'text'])->addField('count',['type'=>'hidden']);
        
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('to', 'length', [
                                'rule' => ['minLength', 11],
                                'message' => 'A valid phone number is required'])
                         ->add('from','length',['rule' => ['maxLength', 10],
                                'message' => 'Sender ID cannot exceed 10 Characters'])
                         ->add('message', [
                                            'minLength' => [
                                                            'rule' => ['minLength', 10],
                                                            'last' => true,
                                                            'message' => 'Message is too short.'
                                                           ],
                                            'maxLength' => [
                                                            'rule' => ['maxLength', 290],
                                                            'message' => 'Message cannot be too long.'
                                                            ]
                                            ]);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
            $result = false;
            $msg = $data['message'];
            $from = $data['from'];
            $sendTo = $data['to'];
            $count = $data['count'];

        if($this->getSMSUnits() !== null):
            $http = new Client();
            $response = $http->get(SEND_SMS . "sender=$from&recipient=$sendTo&message=$msg&");

            $sms_error = array(2904, 2905, 2906, 2907, 2908, 2909, 2910, 2911, 2912, 2913, 2914, 2915);
            if($response->isOk()){
                if(in_array($response->body, $sms_error)){
                        $result = false;
                }else{
                    $this->updateSMSUnits($count);
                        $result = true;

                }
            }
        endif;
        
            
        return $result;
    }
    private function getSMSUnits(){
        
        //$used = $used * SMS_UNIT_COST;
        return \Cake\DataSource\ConnectionManager::get('default')->execute("SELECT units FROM companies_sms  where location_id = :id",['id'=>$_SESSION['Auth']['User']['location_id']])->fetch('assoc')['units'];
    }
    private function updateSMSUnits($used){
        
        $used = $used * SMS_UNIT_COST;
        \Cake\DataSource\ConnectionManager::get('default')->execute("UPDATE companies_sms SET units = (units - $used) where location_id = :id",['id'=>$_SESSION['Auth']['User']['location_id']]);
    }
}
