<<<<<<< .mine
 <h4><?php echo __('Détails Utilisateur'.' '.$user['User']['nom']) ?> </h4>

<?php echo $this->Session->flash();  ?>
<?php echo $this->Form->create('User',array('action' =>'edituser'));  ?>
             <?php echo $this->Form->input('id',array('value'=>$user['User']['id']));  ?>
             
            <?php echo $this->Form->input('nom',array('label'=>'Nom & Prénom','value'=>$user['User']['nom']));  ?>
            <?php echo $this->Form->input('site_id',array('label'=>'Site','value'=>$user['User']['site_id']));  ?>
            <?php echo $this->Form->input('username',array('label'=>'Nom d\'utilisateur','value'=>$user['User']['username']));  ?>
            <?php echo $this->Form->input('mail',array('value'=>$user['User']['mail']));  ?>
            <?php echo $this->Form->input('password');  ?>
            <?php echo $this->Form->input('passwordconfirm',array('label'=>'Confirmer le mot de passe', 'type'=>'password'));  ?>
                  
             
             <?php echo $this->Form->end('Enregistre');  ?>



=======
<h4><?php echo __('Détails Utilisateur'.' '.$user['User']['nom']) ?> </h4>

 
<?php echo $this->Session->flash();  ?>
<?php echo $this->Form->create('User',array('action' =>'edituser'));  ?>
             <?php echo $this->Form->input('id',array('value'=>$user['User']['id']));  ?>
             
           <?php echo $this->Form->input('nom',array('label'=>'Nom & Prénom','value'=>$user['User']['nom']));  ?>
           <?php echo $this->Form->input('site_id',array('label'=>'Site','value'=>$user['User']['site_id']));  ?>
           <?php echo $this->Form->input('username',array('label'=>'Nom d\'utilisateur','value'=>$user['User']['username']));  ?>
            <?php echo $this->Form->input('mail',array('value'=>$user['User']['mail']));  ?>
           <?php echo $this->Form->input('password');  ?>
            <?php echo $this->Form->input('passwordconfirm',array('label'=>'Confirmer le mot de passe', 'type'=>'password'));  ?>
            
			     
                      
             
             <?php echo $this->Form->end('Enregistre');  ?>
>>>>>>> .theirs
