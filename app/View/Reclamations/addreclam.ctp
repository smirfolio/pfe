<div>

<?php echo $this->Form->create('Reclamation'); ?>
<?php echo $this->Form->input('identifiant',array('value'=>$identifiant,'disabled'=>'disabled')); ?>
<?php echo $this->Form->input('vehicule_id'); ?>
<?php echo $this->Form->input('panne_id', array(
    'label' => 'Type panne')); ?>
<?php echo $this->Form->input('panne', array(
    'label' => 'Détails panne')); ?>
<?php echo $this->Form->end('Submit',array('class'=>'btn')); ?>
</div>