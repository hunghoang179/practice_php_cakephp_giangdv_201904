<div class='row'>
    <div class="container">
        <?= $this->form->create($user, ['url' => ['controller' => 'Users', 'action' => 'register'], 'class' => 'regForm']);?>
        <?= $this->form->control('user_name');?>
        <?= $this->form->control('password');?>
        <?= $this->form->control('mail');?>
        <?= $this->form->control('address');?>
        <?= $this->form->control('phone');?>
         <?= $this->form->button('submit');?>
        <?= $this->form->end();?>
    </div>
</div>
