<h4><?php echo __('Détail Utilisateur') ?> </h4>

<?php 

 //debug($user);die;
 
 //echo $v['User']['id'];
 
 echo $user['User']['id'];
 echo $user['User']['password'];
 echo $user['User']['nom'];
 echo $user['User']['username'];
 echo $user['User']['role'];
  echo $user['User']['mail'];
  echo $user['User']['site_id'];
  echo $user['User']['etat'];
 
  
?>
<?php echo $this->Form->create('User',array('action' =>'send'));  ?>
 
   
           <?php echo $this->Form->hidden('user_id',array('value'=>$user['User']['id']));  ?>
           <?php echo $this->Form->input('nom',array('value'=>$user['User']['nom']));  ?>
           <?php echo $this->Form->input('username',array('value'=>$user['User']['username']));  ?>
           <?php echo $this->Form->input('mail',array('value'=>$user['User']['mail']));  ?>
           <?php echo $this->Form->input('etat',array('type'=>'select','value'=>$user['User']['etat']));  ?>