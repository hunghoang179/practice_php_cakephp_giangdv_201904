<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $books
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="books index large-9 medium-8 columns content">
    <h3><?= __('Danh sách - Sách') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('out_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Mượn') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $this->Number->format($book->id_category) ?></td>
                <td><?= h($book->title) ?></td>
                <td><?= $this->Number->format($book->quantity) ?></td>
                <td><?= $this->Number->format($book->out_stock) ?></td>
                <td><?= h($book->author) ?></td>
                <td><?= h($book->create_time) ?></td>
                <td><?= h($book->update_time) ?></td>
                <td>
                    <?php
                        if ($book->is_deleted == 0) {
                            echo "Mở";
                        }else{
                            echo "Tắt";
                        }
                    ?>
                </td>
                <td><?php echo $this->Form->input('', array(
                                  'type'=>'checkbox'
                    ) ); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view', $book->id]) ?>
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $book->id]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
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
