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
		<th></th>
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
		<td>
		    <?php if ($this->Html->isadmin()): ?>
		     <?php if (isset($v['NotifsReclamation'][0]) && $v['NotifsReclamation'][0]['vue']===false): ?>
                <span class="label label-important"><?php echo _('Nouvel') ?></span>
                <?php else: ?>
                     <span class="label label-success"><?php echo _('Vue') ?></span>
            <?php endif ?>
            <?php endif ?>
            
		</td>
		<td><?php echo $this->Time->format('d/M/Y',$v['Reclamation']['created']);   ?></td>
		<?php if ($this->Html->isadmin()): ?>
		<td><a class="btn" href="/admin/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" ><i class=" icon-eye-open"></i></a><a class="btn" href="/admin/Reclamations/suspreclam/<?php echo $v['Reclamation']['id'] ?>"><i class="icon-ban-circle"></i></a>
		   
		</td>
		<?php else: ?>
		<td><a class="btn" href="/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" title='<?php echo __('Détails reclamation') ?>'><i class=" icon-eye-open"></i></a></td>
		<?php endif;  ?>
	</tr>
	<?php endforeach; ?>
</table>
<div style="float: right;">
<a class="btn btn-primary" href="/Reclamations/addreclam" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de reclamation') ?></a>
</div>