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
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('password');
            echo $this->Form->control('mail');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            
            if($this->Session->read('Auth.User.role_id') == 3 || $this->Session->read('Auth.User.role_id') == 2){
               echo $this->Form->label('cấp độ thành viên');
               echo $this->Form->select('role_id',$option); 
            }
            
            echo $this->Form->control('create_user');
            echo $this->Form->control('update_user');
            echo $this->Form->control('create_time');
            echo $this->Form->control('update_time');
            //echo $this->Form->control('is_deleted');
            $option = array(1 => 'Tắt', 0 => 'Mở');
                        
            echo $this->Form->control('is_deleted', [
                'label'=>'Trạng thái',
                'type'=>'radio',
                'options'=> $option,
                ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
