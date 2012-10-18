<?php  
//debug($reclam['User']['id']);
 ?>
 <h4><?php echo __('Traitement de Reclamation') ?> #<?php echo $reclam['Reclamation']['identifiant'] ?></h4>
<div id='center'>
		<?php echo $this->Form->create('Reclamation',array('action'=>'admin_detailreclam'));  ?>
	<table>
	<?php echo $this->Form->hidden('id',array('value'=>$reclam['Reclamation']['id']));  ?>
		<tr width='200px' ><td><b><?php echo __('Créer le') ?></b></td><td><?php echo $this->Time->format('d/M/Y',$reclam['Reclamation']['created']);   ?></td></tr>
		<tr><td><b><?php echo __('Status') ?></b></td><td><?php echo $this->Form->input('statu_id',array('label'=>false,'default'=>$reclam['Statu']['id']));  ?></td><tr><td><b><?php echo __('Panne') ?></b></td><td><?php echo $reclam['Panne']['label'] ?></td></tr>
		<tr><td><b><?php echo __('Vehicule') ?> <?php echo $this->Form->hidden('vehicule_id',array('value'=>$reclam['Reclamation']['vehicule_id']));  ?></b><br><br><br>
			
		</td><td><?php echo $reclam['Vehicule']['matricule'] ?><br><?php echo $reclam['Vehicule']['marque'] ?><br><?php echo $reclam['Vehicule']['model'] ?><br></td></tr>
		<tr><td><b><?php echo __('Réparateur') ?></b></td><td>
			<?php echo $this->Form->input('reparator_id',array('label'=>false,'default'=>$reclam['Reclamation']['reparator_id']));  ?>
			</td></tr>
			
	 <tr><td><b><?php echo __('Détails Pannes') ?></b>
	 	<?php echo $this->Form->hidden('panne_id',array('value'=>$reclam['Reclamation']['panne_id']));  ?>
	 	<?php echo $this->Form->hidden('panne',array('value'=>$reclam['Reclamation']['panne']));  ?>
	 	 <?php echo $this->Form->hidden('user_id',array('value'=>$reclam['User']['id']));  ?>
	 </td><td>
			<?php echo $reclam['Reclamation']['panne']  ?>
			</td></tr>
			
	</table>
 <?php echo $this->Form->end('Submit',array('class'=>'btn')); ?>
</div>

<div id='right'>
	<div id='sidebar'>
	<!--	 <a class="btn btn-danger" href="#"><i class="icon-lock icon-white"></i> <?php echo __('Suspendre Reclamation') ?></a> -->
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
        <?php echo $this->Form->hidden('destinateur_id',array('value'=>$reclam['Reclamation']['user_id']));  ?>
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
        var destinateur_id = $("#MessageSendForm [name='data[Message][destinateur_id]']").val();
       var msg = $("#MessageSendForm [name='data[Message][msg]']").val();
        //alert('i m cliced :'+msg+'/n'+expediteur_id+'/n'+reclamation_id);
        
        
        var dataString = 'reclamation_id='+ reclamation_id + '&expediteur_id=' + expediteur_id +'&destinateur_id='+ destinateur_id  + '&msg=' + msg;  
//alert (dataString);return false;  

$.ajax({  
  type: "POST",  
  url: "/Messages/send",  
  data: dataString,  
  success: function() {  
  //  $('#contact_form').html("<div id='message'></div>");  
  // $('#reponse').html("<h6>Message envoyer</h6>")  
  // .hide()  
   document.getElementById("MessageSendForm").reset();
  }  
});  
 $('.centermessage').load('/Messages/listemessagesajax/'+reclamation_id);

         return false;
    // $("#centermessage").load("index.html")
  });

})
    </script>