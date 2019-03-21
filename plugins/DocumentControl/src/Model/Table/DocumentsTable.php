<?php
namespace DocumentControl\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DocumentCategories
 * @property \Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \DocumentControl\Model\Entity\Document get($primaryKey, $options = [])
 * @method \DocumentControl\Model\Entity\Document newEntity($data = null, array $options = [])
 * @method \DocumentControl\Model\Entity\Document[] newEntities(array $data, array $options = [])
 * @method \DocumentControl\Model\Entity\Document|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \DocumentControl\Model\Entity\Document patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \DocumentControl\Model\Entity\Document[] patchEntities($entities, array $data, array $options = [])
 * @method \DocumentControl\Model\Entity\Document findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class DocumentsTable extends Table
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

        $this->table('documents');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', ['DocumentCategories' => ['document_count']]);

        $this->belongsTo('DocumentCategories', [
            'foreignKey' => 'document_category_id',
            'joinType' => 'INNER',
            'className' => 'DocumentControl.DocumentCategories'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
            'className' => 'DocumentControl.Companies'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            
            ->notEmpty('path','create')
            ->allowEmpty('path','update');

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
        $rules->add($rules->existsIn(['document_category_id'], 'DocumentCategories'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
