<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Units
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $PurchaseOrders
 * @property \Cake\ORM\Association\HasMany $Sales
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class ItemsTable extends Table
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

        $this->table('items');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', ['Categories' => ['item_count']]);
        $this->addBehavior('SearchItem');

        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PurchaseOrders', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'item_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->integer('cost_price')
            ->requirePresence('cost_price', 'create')
            ->notEmpty('cost_price');

        $validator
            ->numeric('markup')
            ->requirePresence('markup', 'create')
            ->notEmpty('markup');

        $validator
            ->date('expiration_date')
            
            ->allowEmpty('expiration_date');

        $validator
            ->requirePresence('product_code', 'create')
            ->notEmpty('product_code');

        $validator
            ->numeric('markup_wholesale')
            ->requirePresence('markup_wholesale', 'create')
            ->notEmpty('markup_wholesale');

        $validator
            ->integer('threshold')
            ->requirePresence('threshold', 'create')
            ->notEmpty('threshold');

        $validator
            ->boolean('expired')
            ->requirePresence('expired', 'create')
            ->notEmpty('expired');

        $validator
            ->boolean('hold')
            ->requirePresence('hold', 'create')
            ->notEmpty('hold');

        $validator
            ->integer('retail_sp')
            ->requirePresence('retail_sp', 'create')
            ->notEmpty('retail_sp');

        $validator
            ->integer('whole_sp')
            ->requirePresence('whole_sp', 'create')
            ->notEmpty('whole_sp');

        $validator
            ->integer('quantity_sold')
            ->requirePresence('quantity_sold', 'create')
            ->notEmpty('quantity_sold');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('images');

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
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }

    /**
     * @param EntityInterface $entity
     * @param ArrayObject $options
     * @return bool
     */
    protected function _onSaveSuccess($entity, $options)
    {

        $event = new Event('Controller.expenses.log',['PURCHASE'],['subject'=>'PURCHASE','amount'=>($entity->cost_price*$entity->quantity),'expenditure_statement'=>'Cost of acquiring :'.$entity->name.' with item no: <a href="items/view/'.$entity->id.'">'.$entity->id.'</a>']);
        $this->eventManager()->dispatch($event);

        return parent::_onSaveSuccess($entity, $options); // TODO: Change the autogenerated stub
    }

    /**
     * @param Query $query
     * @param array $options
     */
    public function findExpiredItemsGroup( $query, array $options){
        $query->select([
        'eDays'=>'DATEDIFF(expiration_date,now())',
        'cName'=> 'Categories.name',
        'counts'=>'count(*)',
        'itemID'=>'Items.id',
        'Items.cost_price',
        'quantity',
        'expiration_date',
        ]);
        $query->contain(['Categories']);
        $query->where('(DATEDIFF(expiration_date,now()) <= '.$options['expiryInDays'].' AND DATEDIFF(expiration_date,now()) > 0)');
        
        $query->andWhere(['Items.company_id'=>$options['cID']]);
        $query->andWhere(['Items.expired'=>0,'quantity > '=> 0,'Items.not_perishable'=>0]);
        $query->group(['eDays']);
        $query->having(['count(*) > '=> '0']);
        $query->order(['expiration_date'=>'ASC']);
        //debug($query);
        return $query;
    }
    /**
     * @param Query $query
     * @param array $options
     */
    public function findExpiredItems( $query, array $options){
        
        $query->select([
        'eDays'=>'DATEDIFF(expiration_date,now())',
        'cName'=> 'Categories.name',
        'itemID'=>'Items.id',
        'Items.cost_price',
        'quantity',
        'expiration_date',
        'iName'=>'Items.name',
        'expired',
        'id'
        ]);
        $query->contain(['Categories']);
        $query->where('(DATEDIFF(expiration_date,now()) <= '.$options['expiryInDays'].' AND DATEDIFF(expiration_date,now()) > 0)');
        
        $query->andWhere(['Items.company_id'=>$options['cID']]);
        $query->andWhere(['Items.expired'=>$options['expired'],'quantity > '=> 0]);
        $query->andWhere(['Items.not_perishable'=>$options['perishable']]);
        $query->order(['expiration_date'=>'DESC']);
        $query->limit(10);
        //debug($query);
        return $query;
    }
}
