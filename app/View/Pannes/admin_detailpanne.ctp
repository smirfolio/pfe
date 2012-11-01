
 

<?php 
 //debug($panne);die;
 if (isset($panne)): ?>
	<h4><?php echo __('Détails Panne :'.' '.$panne['Panne']['label']) ?>
</h4>
<div class='container'>
<div id='center'>
	
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Panne', array('action' => 'admin_editpanne')); ?>
 <?php echo $this -> Form -> input('id', array('value' => $panne['Panne']['id'])); ?>
 <?php //echo $this -> Form -> input('rate', array('label' => 'Note','type'=>'text', 'value' => $reparator['Reparator']['rate'], 'class' => 'controls controls-row'
   //,'placeholder'=>'.span5' )); ?>
 
<?php echo $this -> Form -> input('label', array('label' => 'Désignation', 'value' => $panne['Panne']['label'])); ?>
 
<?php echo $this -> Form -> input('description', array('label' => 'Description','type'=>'textarea' , 'value' => $panne['Panne']['description'])); ?>

<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>
 
</div>
<?php else: ?>
	<h4><?php echo __('Ajout Type de panne :') ?>
</h4><?php //debug($panne);die;  ?>
<?php echo $this -> Session -> flash(); ?>
<div id='center'>
<?php echo $this -> Form -> create('Panne', array('action' => 'admin_editpanne')); ?>
<?php echo $this -> Form -> input('id'); ?>

<?php echo $this -> Form -> input('label', array('label' => 'Désignation' )); ?>
<?php echo $this -> Form -> input('description', array('label' => 'Description','type'=>'textarea' )); ?>
<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>
</div></div>
<?php endif ?>
