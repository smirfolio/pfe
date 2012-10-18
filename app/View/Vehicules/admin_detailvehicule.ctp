
<h4><?php echo __('Détails Véhicule :'.' '.$vehicule['Vehicule']['matricule']) ?> </h4>

 
<?php echo $this->Session->flash();  ?>
<?php echo $this->Form->create('Vehicule',array('action' =>'admin_editvehicule'));  ?>
             <?php echo $this->Form->input('id',array('value'=>$vehicule['Vehicule']['id']));  ?>
             
           <?php echo $this->Form->input('nom',array('label'=>'Matricule','value'=>$vehicule['Vehicule']['matricule']));  ?>
            <?php echo $this->Form->input('site_id',array('label'=>'Site','value'=>$vehicule['Vehicule']['site_id']));  ?>
           <?php // echo $this->Form->input('nom',array('label'=>'Site','value'=>$vehicule['Site']['nom']));  ?>
           <?php echo $this->Form->input('marque',array('label'=>'marque','value'=>$vehicule['Vehicule']['marque']));  ?>
            <?php echo $this->Form->input('model',array('value'=>$vehicule['Vehicule']['model']));  ?>
           
            
           
             
             <?php echo $this->Form->end('Enregistre');  ?>