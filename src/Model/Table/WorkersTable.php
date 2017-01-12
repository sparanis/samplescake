<?php
namespace App\Model\Table;

use App\Model\Entity\Worker;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ServiceProviders
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Bookmarks
 * @property \Cake\ORM\Association\HasMany $Histories
 * @property \Cake\ORM\Association\HasMany $Licenses
 * @property \Cake\ORM\Association\HasMany $Skills
 * @property \Cake\ORM\Association\BelongsToMany $Projects
 */
class WorkersTable extends Table
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

        $this->table('workers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ServiceProviders', [
            'foreignKey' => 'service_provider_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bookmarks', [
            'foreignKey' => 'worker_id'
        ]);
        $this->hasMany('Histories', [
            'foreignKey' => 'worker_id'
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'worker_id'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'worker_id'
        ]);
        $this->hasMany('WorkersProjects', [
            'foreignKey' => 'worker_id',
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('worker_name', 'create')
            ->notEmpty('worker_name');

        $validator
            ->requirePresence('phonetic', 'create')
            ->notEmpty('phonetic');

        $validator
            ->requirePresence('display_name', 'create')
            ->notEmpty('display_name');

        $validator
            ->allowEmpty('bio');

        $validator
            ->allowEmpty('address');

        $validator
            ->integer('gender')
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->date('birthdate')
            ->requirePresence('birthdate', 'create')
            ->notEmpty('birthdate');

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['service_provider_id'], 'ServiceProviders'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

}
