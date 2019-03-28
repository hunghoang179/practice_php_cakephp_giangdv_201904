<div class='row'>
    <div class="container">
        <?= $this->form->create();?>
        <?= $this->form->control('user_name');?>
        <?= $this->form->control('password');?>
        <?= $this->form->button('submit');?>
        <?= $this->html->link('đăng ký',['controller'=>'Users','action'=>'register']);?>
        <?= $this->form->end();?>
    </div>
</div>
