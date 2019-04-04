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
        $borrowOrders = $this->BorrowOrders->find()->select([
            'id',
            'id_user',
            'id_book',
            'borrow_date',
            'return_date',
            'note',
            'status',
            'create_user',
            'update_user',
            'create_time',
            'update_time',
            'name'=>'u.user_name',
            'book_name'=>'b.title'
        ])->join([
            'u'=>[
                'table'=>'Users',
                'alias'=>'u',
                'type'=>'LEFT',
                'conditions'=>'u.id = BorrowOrders.id_user'
            ]
        ])->join([
            'b'=>[
                'table'=>'Books',
                'alias'=>'b',
                'type'=>'LEFT',
                'conditions'=>'b.id = BorrowOrders.id_book'
            ]
        ]);
        //pr($borrowOrders); die;

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
        $this->loadModel('BookOrder');
        $id_user = $this->Auth->user('id');
        // pr($id_user); die;
        $Order_detail = $this->BookOrder
        ->find()
        ->where([
            $id => $id_user
        ])
        ->select([
            'author',
            'user_oder',
            'quantity',
            'title',
            'is_deleted',
            'id_user'
        ])->all();

        //pr($Order_detail); die;

        $borrowOrder = $this->BorrowOrders->get($id);

        $this->set(compact('borrowOrder','Order_detail'));
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
                $this->Flash->success(__('Thêm mới thành công.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại, xin thử lại.'));
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
                $this->Flash->success(__('Lưu thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại hãy thử lại.'));
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
            $this->Flash->success(__('đã xóa thành công.'));
        } else {
            $this->Flash->error(__('thất bại kiểm tra lại.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
