<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $book
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="books view large-9 medium-8 columns content">
    <h3><?= h($book->title) ?></h3>
    <?= $this->Form->create() ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td>
                <?= h($book->title) ?>
                <?=  $this->Form->hidden('title', ['value'=>$book->id]); ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td>
                <?= h($book->author) ?>
                 <?=  $this->Form->hidden('author', ['value'=>$book->author]); ?>   
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create User') ?></th>
            <td><?= h($book->create_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update User') ?></th>
            <td><?= h($book->update_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($book->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Category') ?></th>
            <td><?= $this->Number->format($book->id_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $this->Number->format($book->stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Out Stock') ?></th>
            <td><?= $this->Number->format($book->out_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($book->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($book->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Time') ?></th>
            <td><?= h($book->create_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Time') ?></th>
            <td><?= h($book->update_time) ?></td>
        </tr>
    </table>
    <?= $this->Form->button(__('Mượn sách','book_order')) ?>
    <?= $this->Form->end() ?> 
    <div class="row">
        <h4><?= __('Content Short') ?></h4>
        <?= $this->Text->autoParagraph(h($book->content_short)); ?>
    </div>
</div>
