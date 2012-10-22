<?php if (isset($useredit)): ?>
	<h4><?php echo __('Détails Utilisateur'.' '.$useredit['User']['nom']) ?>
</h4><?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('User', array('action' => 'admin_edituser')); ?>
<?php echo $this -> Form -> input('id', array('value' => $useredit['User']['id'])); ?>

<?php echo $this -> Form -> input('nom', array('label' => 'Nom & Prénom', 'value' => $useredit['User']['nom'])); ?>
<?php echo $this -> Form -> input('site_id', array('label' => 'Site', 'value' => $useredit['User']['site_id'])); ?>
<?php echo $this -> Form -> input('username', array('label' => 'Nom d\'utilisateur', 'value' => $useredit['User']['username'])); ?>
<?php echo $this -> Form -> input('mail', array('value' => $useredit['User']['mail'])); ?>
<?php echo $this -> Form -> input('password'); ?>
<?php echo $this -> Form -> input('passwordconfirm', array('label' => 'Confirmer le mot de passe', 'type' => 'password')); ?>
<?php
    if ($useredit['User']['etat'] == 0) {
        echo '   Etat : <span class="label label-important">Désactivé</span>';

        //echo $this->Form->input('etat', array('options' => array('0', '1') ));
        echo $this -> Form -> input('etat', array('label' => 'Activer', 'hiddenField' => false, 'type' => 'checkbox', 'value' => $useredit['User']['etat'], 'id' => $useredit['User']['etat']));
    } else {

        echo ' Etat : <span class="label label-success">Actif</span>';
        //  echo $this->Form->input('etat',array('type'=>'checkbox','hiddenField'
        // => false,'value'=> $user['User']['etat']));
        echo $this -> Form -> input('etat', array('label' => 'Activer', 'hiddenField' => false, 'type' => 'checkbox', 'value' => $useredit['User']['etat'], 'id' => $useredit['User']['etat']));
    }
?>
<?php

//echo $this->Form->input('etat',array('type'=>'checkbox','value'=>
// $user['User']['etat']));
?>

<?php echo $this -> Form -> end('Enregistre'); ?>

<?php else: ?>
	
<h4><?php echo __('Nouvel Utilisateur') ?>
</h4><?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('User', array('action' => 'admin_edituser')); ?>
<?php echo $this -> Form -> input('id'); ?>

<?php echo $this -> Form -> input('nom', array('label' => 'Nom & Prénom')); ?>
<?php echo $this -> Form -> input('site_id', array('label' => 'Site')); ?>
<?php echo $this -> Form -> input('username', array('label' => 'Nom d\'utilisateur')); ?>
<?php echo $this -> Form -> input('mail'); ?>
<?php echo $this -> Form -> input('password'); ?>
<?php echo $this -> Form -> input('passwordconfirm', array('label' => 'Confirmer le mot de passe', 'type' => 'password')); ?>
<?php
   
        echo $this -> Form -> input('etat', array('label' => 'Activer', 'hiddenField' => false, 'type' => 'checkbox', 'value' => 1));
   
?>
<?php

//echo $this->Form->input('etat',array('type'=>'checkbox','value'=>
// $user['User']['etat']));
?>

<?php echo $this -> Form -> end('Enregistre'); ?>
<?php endif ?>