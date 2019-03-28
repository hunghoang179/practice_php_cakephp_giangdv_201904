<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $category
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->control('id_parent');
            echo $this->Form->control('name');
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
