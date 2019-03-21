<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Companies Model
 *
 * @property \Cake\ORM\Association\HasMany $Categories
 * @property \Cake\ORM\Association\HasMany $Conditions
 * @property \Cake\ORM\Association\HasMany $Customers
 * @property \Cake\ORM\Association\HasMany $DocumentCategories
 * @property \Cake\ORM\Association\HasMany $Documents
 * @property \Cake\ORM\Association\HasMany $ExpenseTypes
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Sales
 * @property \Cake\ORM\Association\HasMany $Settings
 * @property \Cake\ORM\Association\HasMany $Suppliers
 * @property \Cake\ORM\Association\HasMany $Units
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('companies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        

        $this->hasMany('Categories', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Conditions', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('DocumentCategories', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('ExpenseTypes', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Settings', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Units', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'company_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('owner', 'create')
            ->notEmpty('owner');

        

        $validator
            ->requirePresence('telephone', 'create')
            ->notEmpty('telephone');

        $validator
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        

        $validator
            ->requirePresence('description', 'update')
            ->allowEmpty('description','create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    /**
    * Callback that returns when a new company is created
    */
    protected function _onSaveSuccess($entity, $options)
    {

        if($entity->isNew()){
            $connection = ConnectionManager::get('default');
            //if a new company is created, create a new location or store 
            $location = $this->addFirstLocation( $entity);
            //create and sms account for this client
            $this->createCompanySmsAccount($connection,$entity);
            //create a new user 
            $this->addAdminUser($connection, $entity);
            // create first customer
            $this->addDummyCustomer($connection, $entity);
            //Email Company and asked them to verify their mail
             $event = new Event('Mailer.email.company',['Company'],['company'=>$entity]);
            $this->eventManager()->dispatch($event);

        }
        return parent::_onSaveSuccess($entity, $options);
    }


    /**************************************************
    *Functions the run immediately a company is created
    ***************************************************/

    /**
    *Create company sms account as every company requires communication
    *@param \Cake\Datasource\ConnectionManager $connection connection to the database
    *@param $entity the currently saved company information
    */
    public function createCompanySmsAccount($connection, $entity){
        $connection->insert('companies_sms',[
                'location_id'=>$this->getFirstLocation($entity),
                'units'=>0,
                'created'=>date('Y-m-d')
            ]);
    }

    /**
    *Create company Admin user, who can then create other users
    *@param \Cake\Datasource\ConnectionManager $connection connection to the database
    *@param $entity the currently saved company information
    */
    public function addAdminUser($connection, $entity){
        $pwd =  new \Cake\Auth\DefaultPasswordHasher();
        $pass = $pwd->hash('secret');
        $connection->insert('users', [
            'first_name' => $entity->owner,
            'username'=>$entity->owner,
            'password'=>$pass,
            'company_id'=>$entity->id,
            'location_id'=>$this->getFirstLocation($entity),
            'telephone'=>$entity->telephone,
            'status'=>1,
            'address'=>$entity->address,
            'created' => date('Y-m-d'),
            'md5_password' => md5('secret'),
            'role'=> 'ADMIN'
            ]);
    }

    /**
    *Create company First Customer account
    *@param \Cake\Datasource\ConnectionManager $connection connection to the database
    *@param $entity the currently saved company information
    */
    public function addDummyCustomer($connection,$entity){
        $connection->insert('customers',[
                    'title'=>'Mr',
                    'first_name'=>'Jane',
                    'last_name'=>'Doe',
                    'dob'=>date('Y-m-d'),
                    'disease_condition_count'=>0,
                    'address'=>'32 Qatar Way, Lekki road',
                    'company_id'=>$entity->id,
                    'location_id'=>$this->getFirstLocation($entity),
                    'sex'=>'FEMALE',
                    'telephone'=>'0901234567689',
                    'condition_id'=>0
            ]);
    }

    /**
    *Create company first location information. Headoffice as the case may be
    *@param \Cake\Datasource\ConnectionManager $connection connection to the database
    *@param $entity the currently saved company information
    */
    public function addFirstLocation($entity){
        $id = \Cake\Utility\Text::uuid();
        ConnectionManager::get('default')
                ->execute("INSERT INTO `locations` (`id`, `company_id`, `location`, `created`) VALUES (:id, :company, 'LOCATION 1', NOW());",['id'=>$id, 'company'=>$entity->id]);
         $this->getFirstLocation($entity);
    }

    /**
    *Get companies first location information
    *@param \Cake\Datasource\ConnectionManager $connection connection to the database
    *@param $entity the currently saved company information
    */
    public function getFirstLocation($entity){
        
        return $location = \Cake\Datasource\ConnectionManager::get('default')
                ->execute("SELECT id FROM locations where company_id = ?",[$entity->id])->fetch('assoc')['id'];
    }
}
