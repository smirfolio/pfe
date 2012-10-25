
<?php echo $this->Form->create('User'); ?>
<div class="login_fields">
				<div class="field">
						
<?php echo $this->Form->input('username', array('label' => 'login'));?>
</div>
<div class="field">
<?php echo $this->Form->input('password', array('label'=>'Mot de passe')) 
//echo $this->Form->end('Se connecter',array(array('class'=>'btn')));?></div></div> 
<div class="login_actions">
<?php echo $this->Form->submit('Se connecter',array('class'=> 'btn btn-orange' )); 

  //debug($this->request);die;  ?>
  	</div>
