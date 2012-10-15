<h4><?php echo __('Détail Utilisateur') ?> </h4>

<?php 

 //debug($user);die;
 
 //echo $v['User']['id'];
 /*
 echo $user['User']['id'];
 echo $user['User']['password'];
 echo $user['User']['nom'];
 echo $user['User']['username'];
 echo $user['User']['role'];
  echo $user['User']['mail'];
  echo $user['User']['site_id'];
  echo $user['User']['etat'];
  */
 
  
?>
<?php echo $this->Session->flash();  ?>
<?php echo $this->Form->create('User',array('action' =>'edituser'));  ?>
             <?php echo $this->Form->input('id',array('value'=>$user['User']['id']));  ?>
             
           <?php echo $this->Form->input('nom',array('label'=>'Nom & Prénom','value'=>$user['User']['nom']));  ?>
           <?php echo $this->Form->input('site_id',array('label'=>'Site','value'=>$user['User']['site_id']));  ?>
           <?php echo $this->Form->input('username',array('label'=>'Nom d\'utilisateur','value'=>$user['User']['username']));  ?>
            <?php echo $this->Form->input('mail',array('value'=>$user['User']['mail']));  ?>
           <?php echo $this->Form->input('password');  ?>
            <?php echo $this->Form->input('passwordconfirm',array('label'=>'Confirmer le mot de passe', 'type'=>'password'));  ?>
           <?php echo $this->Form->input('etat',array('type'=>'select','value'=> $user['User']['etat']));  ?>
             <?php echo $this->Form->end('Enregistre');  ?>