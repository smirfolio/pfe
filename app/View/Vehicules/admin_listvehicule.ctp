<?php 

 

echo $this->Session->flash();  ?>
<table class="table table-bordered">
	<tr>
		<td>Mtricule</td>
		<td>Marque</td>
		<td>Modèle</td>
		<td>Site</td>
		<td>Action</td>
	</tr>
	<?php foreach ($vehicules as $k => $v): // $v=current($v);?> <?php //debug($v);die;  ?>
		<tr>
		<td><?php echo $v['Vehicule']['matricule'] ?></td>
		<td><?php echo $v['Vehicule']['marque'] ?></td>
		<td><?php echo $v['Vehicule']['model'] ?></td>
		<td><?php echo $v['Site']['nom'] ?>  </td>
	 
		<td><?php echo $this->Html->link("Editer", array('action' => 'detailvehicule', $v['Vehicule']['id'] ));  ?> 
			| 
			 <?php echo $this->Html->link("Supprimer", array('action' => 'detailvehicule', $v['Vehicule']['id'] ));  ?> 
        </td>
	</tr>
	<?php endforeach ?>
	
	
</table>
<?php 
 
echo $this->Paginator->numbers() ; 
?>