<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BorrowOrders Model
 *
 * @method \App\Model\Entity\BorrowOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\BorrowOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BorrowOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BorrowOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BorrowOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BorrowOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BorrowOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BorrowOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class BorrowOrdersTable extends Table
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

        $this->setTable('borrow_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        $validator
            ->requirePresence('id_book', 'create')
            ->allowEmptyString('id_book', false);

        // $validator
        //     ->dateTime('borrow_date')
        //     ->requirePresence('borrow_date', 'create')
        //     ->allowEmptyDateTime('borrow_date', false);

        // $validator
        //     ->dateTime('return_date')
        //     ->requirePresence('return_date', 'create')
        //     ->allowEmptyDateTime('return_date', false);

        $validator
            ->scalar('note')
            ->maxLength('note', 500)
            ->requirePresence('note', 'create')
            ->allowEmptyString('note', false);

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('create_user')
            ->maxLength('create_user', 50)
            ->requirePresence('create_user', 'create')
            ->allowEmptyString('create_user', false);

        $validator
            ->scalar('update_user')
            ->maxLength('update_user', 50)
            ->requirePresence('update_user', 'create')
            ->allowEmptyString('update_user', false);

        // $validator
        //     ->dateTime('create_time')
        //     ->requirePresence('create_time', 'create')
        //     ->allowEmptyDateTime('create_time', false);

        // $validator
        //     ->dateTime('update_time')
        //     ->requirePresence('update_time', 'create')
        //     ->allowEmptyDateTime('update_time', false);

        $validator
            ->requirePresence('is_deleted', 'create')
            ->allowEmptyString('is_deleted', false);

        return $validator;
    }
}
