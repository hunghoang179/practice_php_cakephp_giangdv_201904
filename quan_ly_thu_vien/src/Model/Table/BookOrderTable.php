<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookOrder Model
 *
 * @method \App\Model\Entity\BookOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class BookOrderTable extends Table
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

        $this->setTable('book_order');
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
            ->requirePresence('id_book', 'create')
            ->allowEmptyString('id_book', false);

        $validator
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        return $validator;
    }
}
