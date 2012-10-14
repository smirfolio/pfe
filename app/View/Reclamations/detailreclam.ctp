<?php  
//debug($reclam);
 ?>
 <h4><?php echo __('Détail Reclamation') ?> #<?php echo $reclam['Reclamation']['identifiant'] ?></h4>
<div id='center'>
	<table>
		
		<tr width='200px' ><td><b><?php echo __('Créer le') ?></b></td><td><?php echo $this->Time->format('d/M/Y',$reclam['Reclamation']['created']);   ?></td></tr>
		<tr><td><b><?php echo __('Status') ?></b></td><td><?php echo $reclam['Statu']['label'] ?></td></tr>
		<tr><td><b><?php echo __('Panne') ?></b></td><td><?php echo $reclam['Panne']['label'] ?></td></tr>
		<tr><td><b><?php echo __('Vehicule') ?> </b><br><br><br></td><td><?php echo $reclam['Vehicule']['matricule'] ?><br><?php echo $reclam['Vehicule']['marque'] ?><br><?php echo $reclam['Vehicule']['model'] ?><br></td></tr>
		<tr><td><b><?php echo __('Réparateur') ?></b><br><br><br><br></td><td><small><?php echo __('Ste') ?> : </small><?php echo $reclam['Reparator']['ste'] ?><br><small><?php echo __('Nom du Contact') ?> : </small><?php echo $reclam['Reparator']['nom_contact'] ?><br><small><?php echo __('Mail') ?> : </small><?php echo $reclam['Reparator']['mail'] ?><br><small><?php echo __('Tel') ?> : </small><?php echo $reclam['Reparator']['tel'] ?><br></td></tr>
	</table>
 
</div>

<div id='right'>
	<div id='sidebar'>
		 <a class="btn btn-danger" href="#"><i class="icon-lock icon-white"></i> <?php echo __('Suspendre Reclamation') ?></a>
	</div>
	
</div>
<div class="clearfix"></div>
<div class='centermessage'>
    <?php echo $this->element('/message/message',array('id'=>$reclam['Reclamation']['id']));  ?>
    </div>
<div class="clearfix"></div>
 <?php echo $this->Form->create('Message',array('action' =>'send'));  ?>
<div id='centermessagetext'>
   <div id="exp"> <b> <?php echo _('Votre Message :') ?></b></div>
       <?php echo $this->Form->hidden('reclamation_id',array('value'=>$reclam['Reclamation']['id']));  ?>
        <?php echo $this->Form->hidden('expediteur_id',array('value'=>$this->Html->iduser()));  ?>
        <?php echo  $this->Form->textarea('msg',array('rows' => '6', 'class'=>'sizetextarea'));  ?>

    </div>
    <div id='reponse'>
        </div>
<div style="float: right; padding-right: 200px; padding-top: 10px">
 <a class="btn btn-primary" id='send'><i class="icon-envelope icon-white"></i> <?php echo __('Envoyer') ?></a>
</div>
</form>
<script>
$(function() {
  $("#send").click(function() {
     
       var reclamation_id = $("#MessageSendForm [name='data[Message][reclamation_id]']").val();
       var expediteur_id = $("#MessageSendForm [name='data[Message][expediteur_id]']").val();
       var msg = $("#MessageSendForm [name='data[Message][msg]']").val();
       // alert('i m cliced :'+msg+'/n'+expediteur_id+'/n'+reclamation_id);
       var dataString = 'reclamation_id='+ reclamation_id + '&expediteur_id=' + expediteur_id + '&msg=' + msg;  
//alert (dataString);return false;  
//envoi du formulaire pour traitement 
$.ajax({  
  type: "POST",  
  url: "/Messages/send",  
  data: dataString,  
  success: function() {  
    document.getElementById("MessageSendForm").reset(); 
  }  
}); 
//mise a jours de la div des messages 
 $('.centermessage').load('/Messages/listemessagesajax/'+reclamation_id);
         return false;
    // $("#centermessage").load("index.html")
  });

  
})
    </script>