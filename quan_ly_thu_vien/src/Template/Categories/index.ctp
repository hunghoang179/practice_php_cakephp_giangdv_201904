<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Categories') ?></h3>
    <?php if($this->Session->read('Auth.User.role_id') == 3 || $this->Session->read('Auth.User.role_id') == 2){ ?>
    <?= $this->Html->link('Thêm thể loại sách',['controller'=>'Categories','action'=>'add'],['class'=>'btn'])?>
    <?php } ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_parent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Tên thể loại') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_user','Người tạo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user','Người cập nhật') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_time','Ngày tạo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_time')?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted','Trạng thái') ?></th>
                <th scope="col" class="actions">
                    <?php
                        if($this->Session->read('Auth.User.role_id') == 2 || $this->Session->read('Auth.User.role_id') == 3){
                    ?>
        <?= __('Thao tac')?>
                    <?php
                        }
                    ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): 
                //pr($category->create_user);
                ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= $this->Number->format($category->id_parent) ?></td>
                <td><?= $category->name ?> || <?= $category->count ?> Quyển</td>
                <td><?= $category->create_user ?></td>
                <td><?= $category->update_user ?></td>
                <td><?= $category->create_time ?></td>
                <td><?= $category->update_time ?></td>
                <td><?php
                    if($category->is_deleted == 0){
                        echo 'Mở';
                    }else{
                        echo 'Tắt';
                    }
                    ?>
                </td>
                <td class="actions">
                    <?php
                        if($this->Session->read('Auth.User.role_id') == 2 || $this->Session->read('Auth.User.role_id') == 3){
                    ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), [
                        'action' => 'delete', $category->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?',
                                    $category->id)]) ?>
                    <?php } ?>
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
