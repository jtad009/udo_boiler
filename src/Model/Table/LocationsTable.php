<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\HasMany $CompaniesSms
 * @property \Cake\ORM\Association\HasMany $Customers
 * @property \Cake\ORM\Association\HasMany $Expenses
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $Miscellaneous
 * @property \Cake\ORM\Association\HasMany $PurchaseOrders
 * @property \Cake\ORM\Association\HasMany $Sales
 * @property \Cake\ORM\Association\HasMany $Settings
 * @property \Cake\ORM\Association\HasMany $SupplierPayments
 * @property \Cake\ORM\Association\HasMany $Suppliers
 * @property \Cake\ORM\Association\HasMany $UserLogs
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocationsTable extends Table
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

        $this->table('locations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CompaniesSms', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Expenses', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Miscellaneous', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('PurchaseOrders', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Settings', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('SupplierPayments', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('UserLogs', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'location_id'
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
            ->requirePresence('location', 'create')
            ->notEmpty('location');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
