
<?php  
//debug($reparator);die;
  $this -> Html -> script('gettheme', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcore.js', array('inline' => false));
    //$this -> Html -> script('/js/jqwidgets/jqxlistbox.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcalendar.js', array('inline' => false));
   
    $this -> Html -> script('/js/jqwidgets/jqxtooltip.js', array('inline' => false));
      $this -> Html -> script('/js/jqwidgets/globalization/jquery.global.js', array('inline' => false));
  $this -> Html -> script('/js/jqwidgets/jqxrating.js', array('inline' => false));
 ?>
 <script type="text/javascript">
        $(document).ready(function () {
            // Create jqxRating.
            $("#jqxRating").jqxRating({ width: 350, height: 35});
                   
         $('#jqxRating').jqxRating({disabled:true,value:<?php if(isset($reparator['Reparator']['rate'])){echo $reparator['Reparator']['rate'];}else{echo 0;} ?>});  
          $("#jqxRating").bind('change', function (event) {
                document.getElementById("ReparatorRate").value=event.value;
               // console.log(event.value);
               
            });
          
        });
       
        
    </script>
    
    
    
    
    
    
    
<?php if (isset($reparator)): ?>
	<h4><?php echo __('Détails Réparateur :'.' '.$reparator['Reparator']['ste']) ?>
</h4>
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Reparator', array('action' => 'admin_editreparator')); ?>
<?php echo $this -> Form -> input('id', array('value' => $reparator['Reparator']['id'])); ?>
 
<?php //echo $this -> Form -> input('rate', array('label' => 'Note','type'=>'text', 'value' => $reparator['Reparator']['rate'], 'class' => 'controls controls-row'
   //,'placeholder'=>'.span5' )); ?>
 
<?php echo $this -> Form -> input('ste', array('label' => 'Société', 'value' => $reparator['Reparator']['ste'])); ?>
<div class='right' >
Note :	
<div id='jqxRating'>
    </div>
    
</div>

 
<?php echo $this -> Form -> input('rate', array('type' => 'hidden', 'value' => $reparator['Reparator']['rate'])); ?>

 
<?php echo $this -> Form -> input('nom_contact', array('label' => 'Contact', 'value' => $reparator['Reparator']['nom_contact'])); ?>
<?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom'])); ?>
<?php echo $this -> Form -> input('tel', array('label' => 'Téléphone', 'value' => $reparator['Reparator']['tel'])); ?>
<?php echo $this -> Form -> input('fax', array('label'=>'Fax','value' => $reparator['Reparator']['fax'])); ?>
<?php echo $this -> Form -> input('mail', array('label'=>'Mail','value' => $reparator['Reparator']['mail'])); ?>
<?php echo $this -> Form -> input('adresse', array('label'=>'Adresse','value' => $reparator['Reparator']['adresse'])); ?>



<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>


<?php else: ?>
	<h4><?php echo __('Ajout  Réparateur :') ?>
</h4><?php //debug($sites);die;  ?>
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Reparator', array('action' => 'admin_editreparator')); ?>
<?php echo $this -> Form -> input('id'); ?>

<?php echo $this -> Form -> input('ste', array('label' => 'Société' )); ?>
<?php echo $this -> Form -> input('nom_contact', array('label' => 'Contact' )); ?>
<?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom'])); ?>
<?php echo $this -> Form -> input('tel', array('label' => 'Téléphone' )); ?>
<?php echo $this -> Form -> input('fax', array('label'=>'Fax')); ?>
<?php echo $this -> Form -> input('mail', array('label'=>'Mail')); ?>
<?php echo $this -> Form -> input('adresse', array('label'=>'Adresse')); ?>



<?php echo $this -> Form -> end(array('label'=>'Enregistrer','div'=>false, 'class'=>'btn btn-primary')); ?>

<?php endif ?>
