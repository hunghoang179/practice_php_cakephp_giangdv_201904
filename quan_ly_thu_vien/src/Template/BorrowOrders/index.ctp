<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowOrder[]|\Cake\Collection\CollectionInterface $borrowOrders
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="borrowOrders index large-9 medium-8 columns content">
    <h3><?= __('Borrow Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_book') ?></th>
                <th scope="col"><?= $this->Paginator->sort('borrow_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrowOrders as $borrowOrder): ?>
            <tr>
                <td><?= $this->Number->format($borrowOrder->id) ?></td>
                <td><?= $this->Number->format($borrowOrder->id_user) ?></td>
                <td><?= $this->Number->format($borrowOrder->id_book) ?></td>
                <td><?= h($borrowOrder->borrow_date) ?></td>
                <td><?= h($borrowOrder->return_date) ?></td>
                <td><?= h($borrowOrder->note) ?></td>
                <td><?= $this->Number->format($borrowOrder->status) ?></td>
                <td><?= h($borrowOrder->create_user) ?></td>
                <td><?= h($borrowOrder->update_user) ?></td>
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
