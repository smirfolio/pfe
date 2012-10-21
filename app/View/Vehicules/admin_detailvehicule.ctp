
<?php  

  $this -> Html -> script('gettheme', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcore.js', array('inline' => false));
    //$this -> Html -> script('/js/jqwidgets/jqxlistbox.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcalendar.js', array('inline' => false));
   
    $this -> Html -> script('/js/jqwidgets/jqxtooltip.js', array('inline' => false));
      $this -> Html -> script('/js/jqwidgets/globalization/jquery.global.js', array('inline' => false));

 ?>

<?php if (isset($vehicule)): ?>
	<h4><?php echo __('Détails Véhicule :'.' '.$vehicule['Vehicule']['matricule']) ?>
</h4>
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Vehicule', array('action' => 'admin_editvehicule')); ?>
<?php echo $this -> Form -> input('id', array('value' => $vehicule['Vehicule']['id'])); ?>

<?php echo $this -> Form -> input('matricule', array('label' => 'Matricule', 'value' => $vehicule['Vehicule']['matricule'])); ?>
<?php echo $this -> Form -> input('site_id', array('label' => 'Site', 'value' => $vehicule['Vehicule']['site_id'])); ?>
<?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom'])); ?>
<?php echo $this -> Form -> input('marque', array('label' => 'marque', 'value' => $vehicule['Vehicule']['marque'])); ?>
<?php echo $this -> Form -> input('model', array('value' => $vehicule['Vehicule']['model'])); ?>

<?php echo $this -> Form -> end('Enregistre'); ?>
<?php else: ?>
	<h4><?php echo __('Ajout  Véhicule :') ?>
</h4><?php //debug($sites);die;  ?>
<?php echo $this -> Session -> flash(); ?>
<?php echo $this -> Form -> create('Vehicule', array('action' => 'admin_editvehicule')); ?>
<?php echo $this -> Form -> input('id'); ?>

<?php echo $this -> Form -> input('matricule', array('label' => 'Matricule')); ?>
<?php echo $this -> Form -> input('site_id', array('label' => 'Site', 'options' => $sites)); ?>
<?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom'])); ?>
<?php echo $this -> Form -> input('marque', array('label' => 'marque')); ?>
<?php echo $this -> Form -> input('model'); ?>
<div class='input text'>
<label for="VehiculeDateCirculation"><?php echo _('Date de mise en circulation') ?></label>

<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>

            $(document).ready(function () {//alert('im here do i fonction');
                var theme = getTheme();
                // Create a jqxDateTimeInput
                $("#DateCircul").jqxDateTimeInput({width: '250px', height: '25px', theme: 'sndp',formatString: "MM-dd-yyyy h:mm" });
                 $('#DateCircul').bind('valuechanged', function (event) {
                     var date = event.args.date;
                            date =date.toISOString();
                            date =date.replace("T"," ");
                            date =date.substring(0, date.length - 5);
                            $("#datecircul").val(date);
                     
            });
            
            });
<?php   $this -> Html -> scriptEnd(); ?>    

<div id='DateCircul'> </div> <div id='Events'></div>
</div>
<br>
<?php echo $this -> Form -> hidden('date_circulation',array('id' =>'datecircul')); ?>

<?php echo $this -> Form -> button('Enregistre',array('class = "btn"')); ?>
<?php endif ?>
