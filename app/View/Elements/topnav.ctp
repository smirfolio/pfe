<?php $nreclam = $this->requestAction('/NotifsReclamations/nbreclam'); 
    $nremsg = $this->requestAction('/NotifsMessages/nbremsg'); 
//$m= current($m);
//debug($nreclam); die;  
  ?>
<div id='notif' ><i class="icon-user"></i>
	<?php if ($this->Html->isadmin()): ?>
	<?php echo __('Role') ?> : <?php echo $this->Html->myrole(); ?> - 
	<?php if(isset($nreclam)  && $nreclam != 0)  : ?>
		<?php echo _('Reclamations en attentes : ') ?><a href='/Reclamations/listreclam'><span class="badge"><?php echo $nreclam ?></a></span> -
	<?php endif ?>
	
	<?php endif ?>

<?php echo $this->Html->nameuser(); ?> -
<?php if(isset($nremsg)  && $nremsg!=0)  : ?>
        <?php echo _('Vous Avez des messages : ') ?><a href='/Reclamations/listreclam'><span class="badge"><?php echo $nremsg ?></a></span> -
    <?php endif ?>
<?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false))  ?>

</div>