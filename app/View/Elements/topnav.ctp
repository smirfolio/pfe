<?php 
    $nremsg = $this->requestAction('/NotifsMessages/nbremsg/'); 
    $nreclam = $this->requestAction('/NotifsReclamations/nbreclam/'); 
//$m= current($m);
//debug($nreclam); die;  
 //debug($this->Html->isadmin());
  ?>
<div id='notif' class="navbar" style="width:810px" >
	<div class="navbar-inner">
	 <div class="container">
	<i class="icon-user"></i>
	<?php if ($this->Html->isadmin()): ?>
	<?php echo __('Role') ?> : <?php echo $this->Html->myrole(); ?> - 
	<?php if(isset($nreclam)  && $nreclam != 0)  : ?>
		<?php echo _('Reclamations en attentes : ') ?>
		<a href='/Reclamations/listreclam'><span class="badge"><?php echo $nreclam ?></a></span> -
	<?php endif ?>
	
	<?php endif ?>

<?php echo $this->Html->nameuser(); ?> -
<?php if(isset($nremsg)  && $nremsg!=0)  : ?>
        <?php echo _('Vous Avez des messages : ') ?><a href='/Reclamations/listreclam'><span class="badge"><?php echo $nremsg ?></span></a>
        	
    <?php endif ?>
     <?php 
        	// debug($this->Html->isadmin());die;
      
        	 if($this->Html->isadmin() ===false): {   
                  echo	     "<a href='/Users/detailuser'/".$this->Html->iduser() ;">"  ?> 
			<a href='/Users/detailuser'/<?php echo $this->Html->iduser() ;?>><?php echo __('Mon compte') ; } ?></a>
        		
        	   -
        <?php endif ?>
<?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false))  ?>
<?php //echo $this->Html->iduser() ;?>
</div>
</div>
</div>