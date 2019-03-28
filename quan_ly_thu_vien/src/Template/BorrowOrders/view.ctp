<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowOrder $borrowOrder
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="borrowOrders view large-9 medium-8 columns content">
    <h3><?= h($borrowOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($borrowOrder->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create User') ?></th>
            <td><?= h($borrowOrder->create_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update User') ?></th>
            <td><?= h($borrowOrder->update_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($borrowOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($borrowOrder->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Book') ?></th>
            <td><?= $this->Number->format($borrowOrder->id_book) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($borrowOrder->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($borrowOrder->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Borrow Date') ?></th>
            <td><?= h($borrowOrder->borrow_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Return Date') ?></th>
            <td><?= h($borrowOrder->return_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Time') ?></th>
            <td><?= h($borrowOrder->create_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Time') ?></th>
            <td><?= h($borrowOrder->update_time) ?></td>
        </tr>
    </table>
</div>
