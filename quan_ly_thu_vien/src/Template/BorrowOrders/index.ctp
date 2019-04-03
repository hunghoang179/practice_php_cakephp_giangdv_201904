<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowOrder[]|\Cake\Collection\CollectionInterface $borrowOrders
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="borrowOrders index large-9 medium-8 columns content">
    <h3><?= __('Danh sách đơn mượn sách') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user','Người mượn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('borrow_date','Ngày mượn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_date', 'Ngày trả') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', 'Trạng thái') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted','Tắt/mở') ?></th>
                <th scope="col" class="actions"><?= __('Thao tác') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrowOrders as $borrowOrder): ?>
            <tr>
                <td><?= $this->Number->format($borrowOrder->id) ?></td>
                <td><?= $borrowOrder->name ?></td>
                <td><?= h($borrowOrder->borrow_date) ?></td>
                <td><?= h($borrowOrder->return_date) ?></td>
                <td><?= h($borrowOrder->note) ?></td>
                <td>
                    <?php if($borrowOrder->status == 0){
                        echo "Pendding";
                    }elseif ($borrowOrder->status == 1) {
                        echo "Approve";
                    }elseif ($borrowOrder->status == 2) {
                        echo "Cancer";
                    }elseif ($borrowOrder->status == 3) {
                        echo "Return";
                    }elseif ($borrowOrder->status == 4) {
                        echo "Missing";
                    }

                    
                     ?>
                        
                    </td>
                <td><?= h($borrowOrder->create_time) ?></td>
                <td><?= h($borrowOrder->update_time) ?></td>
                <td><?= $this->Number->format($borrowOrder->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $borrowOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $borrowOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $borrowOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowOrder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
