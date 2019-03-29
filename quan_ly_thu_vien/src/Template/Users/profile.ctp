<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?= $this->element('menu-left/menu-left');?>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Trang cá nhân') ?></h3>
    <?php
        
        echo $user['user_name'];
        echo $user['mail'];
        echo $user['address'];
        echo $user['phone'];
        echo $user['role'];
        echo $user['is_deleted'];
    ?>
    <table>
        
    </table>
        
</div>
