<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BookOrder Controller
 *
 * @property \App\Model\Table\BookOrderTable $BookOrder
 *
 * @method \App\Model\Entity\BookOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookOrderController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $bookOrder = $this->paginate($this->BookOrder);

        $bookOrder = $this->BookOrder->find()->select([
            'id',
            'id_book',
            'id_user',
            'quantity',
            'u.user_name'
        ])->join([
            'u'=>[
                'table'=>'Users',
                'alias'=>'u',
                'type'=>'LEFT',
                'conditions'=>'u.id = BookOrder.id_user'
            ]
        ]);
        //pr($bookOrder); die;
        $this->set(compact('bookOrder'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->request->is('post')) {
            pr($this->request->getData());
        }
        $bookOrder = $this->BookOrder->get($id);
        
        $this->set('bookOrder', $bookOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookOrder = $this->BookOrder->newEntity();
        if ($this->request->is('post')) {
            $bookOrder = $this->BookOrder->patchEntity($bookOrder, $this->request->getData());
            if ($this->BookOrder->save($bookOrder)) {
                $this->Flash->success(__('The book order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book order could not be saved. Please, try again.'));
        }
        $this->set(compact('bookOrder'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookOrder = $this->BookOrder->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookOrder = $this->BookOrder->patchEntity($bookOrder, $this->request->getData());
            if ($this->BookOrder->save($bookOrder)) {
                $this->Flash->success(__('The book order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book order could not be saved. Please, try again.'));
        }
        $this->set(compact('bookOrder'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookOrder = $this->BookOrder->get($id);
        if ($this->BookOrder->delete($bookOrder)) {
            $this->Flash->success(__('The book order has been deleted.'));
        } else {
            $this->Flash->error(__('The book order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
