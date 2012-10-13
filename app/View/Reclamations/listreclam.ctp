<?php  
//debug($reclam);  
 ?>
 	<?php  $this->Html->scriptStart(array('inline'=>false)); 
 	?>
 $('#example').tooltip(
	placement :'right'

)
 <?php   $this->Html->scriptEnd(); ?>	
 <h3><?php echo __('Liste de vos réclamations') ?></h3>
<table class="table table-striped table-bordered">
	<thead>
	<tr>
		<th><?php echo __('Identifiant') ?></th>
		<th><?php echo __('Panne') ?></th>
		<th><?php echo __('Matricule') ?></th>
	
		<th><?php echo __('Réparateur Ste') ?></th>
		
		<th><?php echo __('Status') ?></th>
		<th><?php echo __('Créer le') ?></th>
		<th><?php //echo __('Action') ?></th>
	</tr>
	</thead>
	<?php foreach ($reclam as $k => $v): ?>
		<tr>
		<td><?php echo $v['Reclamation']['identifiant'] ?></td>
		<td><?php echo $v['Panne']['label']  ?></td>
		
		<td><?php echo $v['Vehicule']['matricule']  ?></td>
		
		<td><?php echo $v['Reparator']['ste']  ?></td>
		
		<td><?php echo $v['Statu']['label']  ?></td>
		<td><?php echo $this->Time->format('d/M/Y',$v['Reclamation']['created']);   ?></td>
		<?php if ($this->Html->isadmin()): ?>
		<td><a class="btn" href="/admin/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" ><i class=" icon-eye-open"></i></a><a class="btn" href="#"><i class="icon-trash"></i></a></td>
		<?php else: ?>
		<td><a class="btn" href="/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" title='<?php echo __('Détails reclamation') ?>'><i class=" icon-eye-open"></i></a></td>
		
		<?php endif;  ?>
	</tr>
	<?php endforeach ?>
</table>
<div style="float: right;">
<a class="btn btn-primary" href="/Reclamations/addreclam" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de reclamation') ?></a>
</div>