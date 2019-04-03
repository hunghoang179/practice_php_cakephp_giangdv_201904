<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories);
        $categories = $this->Categories->find()->select([
            'Categories.id',
            'Categories.name',
            'Categories.create_user',
            'update_user',
            'create_time',
            'update_time',
            'count' => 'count(*)'
        ])->join([
            'b'=>[
                'table'=>'Books',
                'alias'=>'b',
                'type'=>'LEFT',
                'conditions'=>'b.id_category = Categories.id'
            ]
        ])->group(['Categories.id'])->all();
        //pr($categories); die;

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);

        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //dd($this->Auth->user('role_id'));
        if($this->Auth->user('role_id') == 3 || $this->Auth->user('role_id') == 2){
            $category = $this->Categories->newEntity();
            if ($this->request->is('post')) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->set(compact('category'));
        }else{
            $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role_id') == 3 || $this->Auth->user('role_id') == 2){
           $category = $this->Categories->get($id, [
            'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $category = $this->Categories->patchEntity($category, $this->request->getData());
                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
            $this->set(compact('category')); 
        }
        else{
            $this->redirect(['action' => 'index']);
        }
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role_id') == 3 || $this->Auth->user('role_id') == 2){
            $this->request->allowMethod(['post', 'delete']);
            $category = $this->Categories->get($id);
            if ($this->Categories->delete($category)) {
                $this->Flash->success(__('The category has been deleted.'));
            } else {
                $this->Flash->error(__('The category could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
        
    }
}
