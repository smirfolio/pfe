<h4><?php echo __('Ajout de déclaration :' ) ?></h4>

<div id='center'>
<?php echo $this->Form->create('Reclamation'); ?>
<?php echo $this->Form->input('<b>Identifiant</b>',array('value'=>$identifiant,'disabled'=>'disabled')); ?>
<?php echo $this->Form->input('vehicule_id',array('empty'=>'')); ?>
<?php echo $this->Form->input('panne_id', array(
    'label' => 'Type panne')); ?>
<?php echo $this->Form->input('panne', array(
    'label' => 'Détails panne')); ?>
<?php //echo $this->Form->end('Submit',array('class'=>'btn')); ?>
<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>
</div>