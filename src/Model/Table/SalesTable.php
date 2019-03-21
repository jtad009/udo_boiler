<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Sale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalesTable extends Table
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

        $this->table('sales');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->requirePresence('discount', 'create')
            ->notEmpty('discount');

        // $validator
        //     ->requirePresence('payment_type', 'create')
        //     ->notEmpty('payment_type');

        // $validator
        //     ->requirePresence('payment_status', 'create')
        //     ->notEmpty('payment_status');

        $validator
            ->numeric('cost')
            ->requirePresence('cost', 'create')
            ->notEmpty('cost');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
    /**
     * Find an item with this invoice number
     * @param $query
     * @param array $search_param
     * @return mixed
     */
    public function findSales($query, array $search_param)
    {
        $this->options = $search_param;
        //columns to find
        $query->select(['quantity','times','Users.username','cost'=>'SUM(cost)','invoice_no','created'])->contain(['Users']);

        if(isset($this->options['date']) && !isset($this->options['invoice_no'])){//if date is set
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                            ->between('Sales.created',
                                date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                                date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                              );
                }
            );
        }elseif(isset($search_param['date']) && isset($this->options['invoice_no'])){
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                            ->between('Sales.created',
                                date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                                date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                              );
                }
            );
            $query->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }elseif(!isset($this->options['date']) && isset($this->options['invoice_no'])){
            //if date is not set but invoice is set
            $query
            ->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }
        $query->where(['Sales.company_id'=>$this->options['company']]);
        //return $query->Where(['invoice_no' => $search_param['param']]);
        return $query;
    }

    /**
     * @param EntityInterface $entity
     * @param ArrayObject $options
     * @return bool
     */
    protected function _onSaveSuccess($entity, $options){

    //After sale reduce inventory quantity
        \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE items SET quantity = (quantity - :quan) WHERE id = :item_id", ['quan' => $entity->quantity, 'item_id' => $entity->item_id]);
    //check to see if a product with same name exist that is on hold, if such exist then remove from hold so it can be sold
        $item = \Cake\Datasource\ConnectionManager::get('default')->execute("SELECT name,quantity FROM items where id = ? ",[$entity->item_id])->fetch('assoc');
        //debug($item);
        if($item['quantity'] == '0'){
            $result = \Cake\Datasource\ConnectionManager::get('default')->execute("SELECT * FROM items where hold = 1 and name like :name  and expired = 0  order by expiration_date ASC",['name'=>'%'.trim($item['name']).'%'])->fetch('assoc');
            //debug($result);
            if(!empty($result)){
                \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE items  SET hold = 0 where id = :id ",['id'=>$result['id']]);
            }
        }

        return parent::_onSaveSuccess($entity, $options); // TODO: Change the autogenerated stub
    }

    /**
     * Find the most sold item in the store for a location or for  a company
     * @param \Cake\ORM\Query $query
     * @param array $options
     */
    public function findMostSold(\Cake\ORM\Query $query, array $options)
    {
        $this->options = $options;
        //select the period for which you want to find how the sold
        $query->select(['hour_sold'=>'HOUR(times)','times','item_count' => 'count(item_id)', 'item_id','Items.name','generated_revenue'=>'sum(Sales.cost)'])->contain(['Items'])
            ->where(function ($exp, $q) {
                return $exp->between('Sales.created', $this->options['date_1'], $this->options['date_2']);
            })
            ->andWhere(['Sales.company_id' => $this->options['company']]);
        $query->group('Items.name');
        //order the result
        $query->order(['item_count'=>'DESC','generated_revenue'=>'DESC']);

        return $query;
    }

    /**
     * Find the Daily Profit
     * @param \Cake\ORM\Query $query
     * @param array $options
     */
    public function findDailyProfitSummary($query, $options){
        $this->options = $options;
        $query
         ->select(['profitSum'=>'SUM(retail_sp - cost_price)'])
         ->contain(['Items']);
        if(isset($this->options['date']) && !isset($this->options['invoice_no'])){//if date is set
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                    ->between(
                        'Sales.created',
                        date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                        date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                    );
                }
            );
        }elseif(isset($search_param['date']) && isset($this->options['invoice_no'])){
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                    ->between(
                        'Sales.created',
                        date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                        date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                    );
                }
            );
            $query->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }elseif(!isset($this->options['date']) && isset($this->options['invoice_no'])){
            //if date is not set but invoice is set
            $query
            ->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }else{
            $query
            ->where(function($exp,$q){
                    return $exp->between('Sales.created',date('Y-m-d'),date('Y-m-d'));
            });
        }
        $query->where(['Sales.company_id'=>$this->options['company']]);
        return $query;
        
    }

    /**
     * Find the SalesDetails
     * @param \Cake\ORM\Query $query
     * @param array $options
     */
    public function findSaleDetailSummary($query, $options){
        $this->options = $options;
        $query->select(['saleSum'=>'SUM(cost)']);
        if(isset($this->options['date']) && !isset($this->options['invoice_no'])){//if date is set
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                    ->between(
                        'Sales.created',
                        date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                        date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                    );
                }
            );
        }elseif(isset($this->options['date']) && isset($this->options['invoice_no'])){
            $query
            ->where(
                function($exp,$q){
                    $range = explode('-',$this->options['date']);
                    list($d,$m,$y) = explode('/',$range[0]);
                    list($ds,$ms,$ys) = explode('/',$range[1]);
                    return $exp
                    ->between(
                        'Sales.created',
                        date('Y-m-d',strtotime(trim($y).'/'.$m.'/'.$d)),
                        date('Y-m-d',strtotime($ys.'/'.$ms.'/'.trim($ds)))
                    );
                }
            );
            $query->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }elseif(!isset($this->options['date']) && isset($this->options['invoice_no'])){
            //if date is not set but invoice is set
            $query
            ->andWhere(['invoice_no'=>$this->options['invoice_no']]);
        }else{
            $query
            ->where(function($exp,$q){
                    return $exp->between('Sales.created',date('Y-m-d'),date('Y-m-d'));
            });
        }
        $query->where(['Sales.company_id'=>$this->options['company']]);
         
         return $query;
    }
}
