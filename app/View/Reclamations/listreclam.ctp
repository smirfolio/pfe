<?php  
//debug($reclam);
 ?>
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
		<th><?php echo __('Action') ?></th>
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
		<td><a class="btn" href="/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>"><i class=" icon-eye-open"></i></a> <a class="btn" href="#"><i class="icon-trash"></i></a></td>
	</tr>
	<?php endforeach ?>
	
	
</table>