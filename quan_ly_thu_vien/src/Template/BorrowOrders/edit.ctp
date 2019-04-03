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
        <legend><?= __('Edit Borrow Order') ?></legend>
        <?php
            echo $this->Form->control('id_user');
            echo $this->Form->control('id_book');
            echo $this->Form->input('borrow_date',['class'=>'datepicker','type'=>'text']);
            echo $this->Form->input('return_date',['class'=>'datepicker','type'=>'text']);
            echo $this->Form->control('note');
            echo $this->Form->label('Trạng thái');
            $option = ['0'=>'pendding','1'=>'approve','2'=>'cancer','3'=>'return','4'=>'missing'];
            echo $this->Form->select('status',$option);

            echo $this->Form->control('create_user');
            echo $this->Form->control('update_user');
            echo $this->Form->input('create_time',['class'=>'datepicker','type'=>'text']);
            echo $this->Form->input('update_time',['class'=>'datepicker','type'=>'text']);
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
