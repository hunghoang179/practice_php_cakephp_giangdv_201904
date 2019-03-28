<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BorrowOrders Controller
 *
 * @property \App\Model\Table\BorrowOrdersTable $BorrowOrders
 *
 * @method \App\Model\Entity\BorrowOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BorrowOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $borrowOrders = $this->paginate($this->BorrowOrders);

        $this->set(compact('borrowOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Borrow Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $borrowOrder = $this->BorrowOrders->get($id, [
            'contain' => []
        ]);

        $this->set('borrowOrder', $borrowOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $borrowOrder = $this->BorrowOrders->newEntity();
        if ($this->request->is('post')) {
            $borrowOrder = $this->BorrowOrders->patchEntity($borrowOrder, $this->request->getData());
            if ($this->BorrowOrders->save($borrowOrder)) {
                $this->Flash->success(__('The borrow order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrow order could not be saved. Please, try again.'));
        }
        $this->set(compact('borrowOrder'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Borrow Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $borrowOrder = $this->BorrowOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $borrowOrder = $this->BorrowOrders->patchEntity($borrowOrder, $this->request->getData());
            if ($this->BorrowOrders->save($borrowOrder)) {
                $this->Flash->success(__('The borrow order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrow order could not be saved. Please, try again.'));
        }
        $this->set(compact('borrowOrder'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Borrow Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $borrowOrder = $this->BorrowOrders->get($id);
        if ($this->BorrowOrders->delete($borrowOrder)) {
            $this->Flash->success(__('The borrow order has been deleted.'));
        } else {
            $this->Flash->error(__('The borrow order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
