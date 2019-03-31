<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Trang cá nhân') ?></h3>
    <table>
        <tr>
            <td>Họ tên</td>
            <td><?php echo $user['user_name']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $user['mail']; ?></td>
        </tr>
        <tr>
            <td>Đia chỉ</td>
            <td><?php echo $user['address']; ?></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><?php echo $user['phone'];?></td>
        </tr>
        <tr>
            <td>level</td>
            <td><?php echo $user['role']; ?></td>
        </tr>
    </table>
        
</div>
