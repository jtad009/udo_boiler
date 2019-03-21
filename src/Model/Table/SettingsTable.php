<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsTable extends Table
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

        $this->table('settings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
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
            ->numeric('default_retail_markup')
            ->requirePresence('default_retail_markup', 'create')
            ->notEmpty('default_retail_markup');

        $validator
            ->numeric('default_wholesale_markup')
            ->requirePresence('default_wholesale_markup', 'create')
            ->notEmpty('default_wholesale_markup');

        $validator
            ->integer('default_item_threshold')
            ->requirePresence('default_item_threshold', 'create')
            ->notEmpty('default_item_threshold');

        $validator
            ->integer('expiry_notification')
            ->requirePresence('expiry_notification', 'create')
            ->notEmpty('expiry_notification');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('po_collection_notification')
            ->requirePresence('po_collection_notification', 'create')
            ->notEmpty('po_collection_notification');

        $validator
            ->integer('supplier_payment_notification')
            ->requirePresence('supplier_payment_notification', 'create')
            ->notEmpty('supplier_payment_notification');

        $validator
            ->boolean('is_default')
            ->requirePresence('is_default', 'create')
            ->notEmpty('is_default');

        $validator
            ->requirePresence('inventory_type', 'create')
            ->notEmpty('inventory_type');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
