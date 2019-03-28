<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $book
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->control('id_category');
            echo $this->Form->control('title');
            echo $this->Form->control('content_short');
            echo $this->Form->control('stock');
            echo $this->Form->control('out_stock');
            echo $this->Form->control('author');
            echo $this->Form->control('year');
            echo $this->Form->control('create_user');
            echo $this->Form->control('update_user');
            echo $this->Form->control('create_time');
            echo $this->Form->control('update_time');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
