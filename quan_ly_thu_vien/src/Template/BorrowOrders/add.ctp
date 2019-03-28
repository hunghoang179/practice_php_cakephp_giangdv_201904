<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowOrder $borrowOrder
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="borrowOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($borrowOrder) ?>
    <fieldset>
        <legend><?= __('Add Borrow Order') ?></legend>
        <?php
            echo $this->Form->control('id_user');
            echo $this->Form->control('id_book');
            echo $this->Form->control('borrow_date');
            echo $this->Form->control('return_date');
            echo $this->Form->control('note');
            echo $this->Form->control('status');
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
