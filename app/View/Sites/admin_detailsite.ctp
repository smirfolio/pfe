
<?php  
//debug($sites);die;
  $this -> Html -> script('gettheme', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcore.js', array('inline' => false));
    //$this -> Html -> script('/js/jqwidgets/jqxlistbox.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcalendar.js', array('inline' => false));
   
    $this -> Html -> script('/js/jqwidgets/jqxtooltip.js', array('inline' => false));
      $this -> Html -> script('/js/jqwidgets/globalization/jquery.global.js', array('inline' => false));
  $this -> Html -> script('/js/jqwidgets/jqxrating.js', array('inline' => false));
 ?>
 
<?php if (isset($site)): ?>
	<h4><?php echo __('Détails Site :'.' '.$site['Site']['nom']) ?>
</h4>
<div id='center'>
	
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Site', array('action' => 'admin_editsite')); ?>
 <?php echo $this -> Form -> input('id', array('value' => $site['Site']['id'])); ?>
 <?php //echo $this -> Form -> input('rate', array('label' => 'Note','type'=>'text', 'value' => $reparator['Reparator']['rate'], 'class' => 'controls controls-row'
   //,'placeholder'=>'.span5' )); ?>
 
<?php echo $this -> Form -> input('nom', array('label' => 'Désignation', 'value' => $site['Site']['nom'])); ?>
<?php echo $this -> Form -> input('gouvernerat', array('label' => 'Gouvernerat', 'value' => $site['Site']['gouvernerat'])); ?>
<?php  echo $this->Form->input('adresse',array('label'=>'Adresse','value'=>$site['Site']['adresse'])); ?>
<?php echo $this -> Form -> input('tel', array('label' => 'Téléphone', 'value' => $site['Site']['tel'])); ?>
<?php echo $this -> Form -> input('fax', array('label'=>'Fax','value' => $site['Site']['fax'])); ?>
<?php echo $this -> Form -> input('mail', array('label'=>'Mail','value' => $site['Site']['mail'])); ?>
<?php //echo $this -> Form -> input('adresse', array('label'=>'Adresse','value' => $site['Site']['adresse'])); ?>



<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>
 
</div>
<?php else: ?>
	<h4><?php echo __('Ajout  Site :') ?>
</h4><?php //debug($sites);die;  ?>
<?php echo $this -> Session -> flash(); ?>
<div id='center'>
<?php echo $this -> Form -> create('Reparator', array('action' => 'admin_editsite')); ?>
<?php echo $this -> Form -> input('id'); ?>

<?php echo $this -> Form -> input('nom', array('label' => 'Désignation' )); ?>
<?php echo $this -> Form -> input('gouvernerat', array('label' => 'Gouvernerat' )); ?>
<?php echo $this -> Form -> input('adresse', array('label'=>'Adresse')); ?>
<?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom'])); ?>
<?php echo $this -> Form -> input('tel', array('label' => 'Téléphone' )); ?>
<?php echo $this -> Form -> input('fax', array('label'=>'Fax')); ?>
<?php echo $this -> Form -> input('mail', array('label'=>'Mail')); ?>




<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>
</div>
<?php endif ?>
