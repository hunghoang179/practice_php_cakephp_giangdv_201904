<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Books Controller
 *
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $books = $this->paginate($this->Books);
        

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->loadModel('BorrowOrders');
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
        ])->all();
        //insert BookOrder
        $this->loadModel('BookOrder');
        $user = $this->Auth->user('user_name');
        $order = $this->BookOrder->newEntity();

        if ($this->request->is('post')) {
            $a_oder = $this->request->getData();

            $a_oder['user_oder'] = $user;

            $_order = $this->BookOrder->patchEntity($order, $a_oder);
            //pr($_order);die;
            if ($this->BookOrder->save($_order)) {
                $order = $this->BorrowOrders->newEntity();
                if ($this->request->is('post')) {
                    $a_oder = $this->request->getData();

                    $_order = $this->BorrowOrders->patchEntity($order, $a_oder);
                    //pr($_order);die;
                    if ($this->BorrowOrders->save($_order)) {
                        $this->Flash->success(__('Yêu cầu của bạn đã được gửi, chờ duyệt y/c'));

                        return $this->redirect(['action' => 'index']);
                    }
                    else
                    {
                        echo "Lỗi";
                    }
                }
                    $this->Flash->success(__('Yêu cầu của bạn đã được gửi, chờ duyệt y/c'));

                    return $this->redirect(['action' => 'index']);
                    }
                else
                {
                    echo "Lỗi";
                }
            }
            //insert BorrowOrders
            

            $book = $this->Books->get($id);
            // pr($book); die;
            $this->set(compact('book','borrowOrders'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('Cập nhật thành công.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại xin thủ lại.'));
        }
        $this->set(compact('book'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('Cập nhật thành công.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Thất bại, xin thử lại.'));
        }
        $this->set(compact('book'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function borrowBook(){
        
    }
}
