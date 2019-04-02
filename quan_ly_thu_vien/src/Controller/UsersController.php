<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter( $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        $this->Auth->allow('register','editUser');
        Security::setHash('md5');
    }
        /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            //pr($user['is_deleted']); die;
            if($user && $user['is_deleted'] == 0){
                $user = $this->Users->get($user['id']);
                $this->Auth->setUser($user);
                $this->redirect(['controller'=>'books','action'=>'index']);
            }
            else{
                echo 'test';
            }

        }
    }

    public function logout()
    {
        //$this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    public function index()
    {
        $users = $this->paginate($this->Users);
        

        $this->set(compact('users'));
    }
    public  function profile($id = null){
        $u_id = $this->Auth->user('id');
        $user = $this->Users->find()->where(['Users.id' => $u_id])->select([
            'id',
            'user_name',
            'password',
            'mail',
            'address',
            'phone',
            'level'=> 'r.role_name'
        ])->join([
            'r'=>[
                'table' => 'Role',
                'alias' => 'r',
                'type' => 'LEFT',
                'conditions' => 'Users.role_id = r.id'
            ]
        ])->first();
        $this->set('user',$user);
    }
    public function editUser(){
        $user = $this->Auth->user();
        //pr($user); die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $id = $user['id'];
            $input = $this->request->getData();
            $user = $this->Users->get($id);
            //dd($input);
            if(isset($input['btn_update_user'])){
                //pr($_POST); die;
                $user = $this->Users->patchEntity($user, $input);
                if ($this->Users->save($user)) {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('Cập nhật thành cong.'));

                    return $this->redirect(['action' => 'profile']);
                }
                $this->Flash->error(__('Thất bại, thử lại'));  
            }  
            else
            {
            $pass = $this->request->getData();
            $user = $this->Users->patchEntity($user, $pass, [
                'validate' => 'OnlyCheck'
            ]);

            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Cập nhật thành cong.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('Thất bại, thử lại')); 
            }          
        }
        $this->set('user',$user);
    }
    public function listUser(){
//        $user = $this->Auth->user();
//        pr($user); die;
        if($this->Auth->user('role_id') == 2 || $this->Auth->user('role_id') == 3){
                $users = $this->paginate($this->Users);
                $this->set(compact('users'));
            }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
     public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    
                //$this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
                }
                else{
                  $this->set('errors', $user->getErrors());
                }
            //$this->Flash->error(__('The user could not be saved. Please, try again.'));
            
            
        }
        $this->set(compact('user'));
    }
    
    public function add()
    {
           $user = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    //$this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user')); 
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        $_user = $this->Users->find()->select([
            'id',
            'role_id',
            'level'=>'Users.user_name'
        ])->join([
            'r'=>[
                'table' => 'Role',
                'alias' => 'r',
                'type' => 'LEFT',
                'conditions' => 'Users.role_id = r.id'
            ]
        ]);
        $option = [];
        foreach($_user as $r){
            $option[$r->role_id] = $r->level;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Cập nhật thành công'));

                return $this->redirect(['action' => 'listUser']);
            }
            $this->Flash->error(__('Thất bại, xin thử lại'));
        }
        //pr($option); die;
        $this->set(compact('user','option'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
