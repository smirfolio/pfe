<div id='notif' ><i class="icon-user"></i>
	<?php if ($this->Html->isadmin()): ?>
	<?php echo __('Role') ?> : <?php echo $this->Html->myrole(); ?> - 	
	<?php endif ?>

<?php echo $this->Html->nameuser(); ?> -
<?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false))  ?>
</div>