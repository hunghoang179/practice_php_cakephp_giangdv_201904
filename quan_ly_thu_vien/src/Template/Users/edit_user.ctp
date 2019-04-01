<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['url' => ['controller' => 'Users', 'action' => 'editUser'], 'class' => 'regForm']) ?>
    <fieldset>
        <legend><?= __('Sửa thông tin') ?></legend>
        <?php
            echo $this->Form->control('user_name',['value' => $user['user_name']]);
            echo $this->Form->control('mail',['value' => $user['mail']]);
            echo $this->Form->control('address',['value' => $user['address']]);
            echo $this->Form->control('phone',['value' => $user['phone']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cập nhật thông tin'),['name'=>'btn_update_user']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['url' => ['controller' => 'Users', 'action' => 'editUser'], 'class' => 'regForm'],['type' => 'hidden']) ?>
    <fieldset>
        <legend><?= __('Sửa mật khẩu') ?></legend>
        <?php
            echo $this->Form->control('password', ['value'=>'']);
            echo $this->Form->control('re-password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cập nhật mật khẩu'),['name'=>'btn_update_pass']) ?>
    <?= $this->Form->end() ?>
</div>
