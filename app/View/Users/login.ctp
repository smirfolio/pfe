<?php 
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => 'login'));
echo $this->Form->input('password', array('label'=>'Mot de passe'));
//echo $this->Form->end('Se connecter',array(array('class'=>'btn')));
echo $this->Form->submit('Se connecter',array('class'=>'btn btn-primary'));

// debug($this->request);die;  ?>
<?php   echo $this->Html->link('S\'inscrire', array('controller'=>'users', 'action'=>'inscription', 'admin'=>false)) ; ?>   