<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('password');
            echo $this->Form->control('mail');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('role');
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
