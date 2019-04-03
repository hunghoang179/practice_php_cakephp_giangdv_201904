<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= 'Xin chào:  '.$this->Session->read('Auth.User.user_name')?></li>
        <li><?= $this->Html->link(__('Danh sách thể loại'), ['controller'=>'categories','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Danh sách - Sách'), ['controller'=>'books','action' => 'index']) ?></li>
        <?php
                if($this->Session->read('Auth.User.role_id') == 2 || $this->Session->read('Auth.User.role_id') == 3){
        ?>
        <li><?= $this->Html->link(__('Danh sách user'), ['controller'=>'users','action' => 'listUser']) ?></li>
        <?php
                }
        ?>
        <li><?= $this->Html->link(__('Đơn mượn sách'), ['controller'=>'BorrowOrders','action' => 'index']) ?></li>
        
        <li><?= $this->Html->link(__('Trang cá nhân'), ['controller'=>'users','action' => 'profile']) ?></li>
        <li><?= $this->Html->link(__('logout'), ['controller'=>'users','action' => 'logout']) ?></li>
    </ul>
</nav>
