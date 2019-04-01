<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
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
            ->scalar('user_name')
            ->maxLength('user_name', 50)
            ->requirePresence('user_name', 'create')
            ->allowEmptyString('user_name', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false)
            ->maxLength('password',20,'Mật khẩu nhập tối đa 20 kí tự')
            ->minLengthBytes('password',5,'Mật khẩu tối thiểu 5 ký tự');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 255)
            ->requirePresence('mail', 'create')
            ->allowEmptyString('mail', false)
            ->email('mail', false, 'không đúng định dạng e mail');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false,'Địa chỉ không để trống');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 12)
            ->requirePresence('phone', 'create')
            ->allowEmptyString('phone', false,'Điện thoại không để trống')
            ->integer('phone','nhập số');
//
//        $validator
//            ->integer('role')
//            ->requirePresence('role', 'create')
//            ->allowEmptyString('role', false);
//
//        $validator
//            ->scalar('create_user')
//            ->maxLength('create_user', 50)
//            ->requirePresence('create_user', 'create')
//            ->allowEmptyString('create_user', false);
//
//        $validator
//            ->scalar('update_user')
//            ->maxLength('update_user', 50)
//            ->requirePresence('update_user', 'create')
//            ->allowEmptyString('update_user', false);
//
//        $validator
//            ->dateTime('create_time')
//            ->requirePresence('create_time', 'create')
//            ->allowEmptyDateTime('create_time', false);
//
//        $validator
//            ->dateTime('update_time')
//            ->requirePresence('update_time', 'create')
//            ->allowEmptyDateTime('update_time', false);
//
//        $validator
//            ->integer('is_deleted')
//            ->requirePresence('is_deleted', 'create')
//            ->allowEmptyString('is_deleted', false);

        return $validator;
    }
//    public function validationUpdate(Validator $validator){
//        $validator = $this->validationDefault($validator);
//        $validator->allowEmptyString('address', false,'Địa chỉ không để trống');
//        return $validator;
//    }
    public function validationOnlyCheck(Validator $validator) {
        $validator = $this->validationDefault($validator);
        //$validator->remove('password');
        $validator->allowEmptyString('password', false,'trường bắt buộc nhập');
        $validator->allowEmptyString('re-password', false,'trường bắt buộc nhập');
        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['user_name']));
        $rules->add($rules->isUnique(['mail']));

        return $rules;
    }
    
//    public function findAuth(\Cake\ORM\Query $query, array $options)
//    {
//        $query
//            ->select(['id', 'user_name', 'password'])
//            ->where(['Users.is_deleted' => 0]);
//
//        return $query;
//    }
}
