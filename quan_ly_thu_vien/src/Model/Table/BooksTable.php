<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('title');
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
            ->requirePresence('id_category', 'create')
            ->allowEmptyString('id_category', false);

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('content_short')
            ->requirePresence('content_short', 'create')
            ->allowEmptyString('content_short', false);

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->integer('out_stock')
            ->requirePresence('out_stock', 'create')
            ->allowEmptyString('out_stock', false);

        $validator
            ->scalar('author')
            ->maxLength('author', 255)
            ->requirePresence('author', 'create')
            ->allowEmptyString('author', false);

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->allowEmptyString('year', false);

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
