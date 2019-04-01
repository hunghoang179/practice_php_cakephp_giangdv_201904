<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Danh sách thể loại'), ['controller'=>'categories','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Danh sách sách'), ['controller'=>'books','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Danh sách user'), ['controller'=>'users','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Danh sách user mượn sách'), ['borrow_oders'=>'categories','action' => 'index']) ?></li>
        
        <li><?= $this->Html->link(__('Trang cá nhân'), ['controller'=>'users','action' => 'profile']) ?></li>
    </ul>
</nav>