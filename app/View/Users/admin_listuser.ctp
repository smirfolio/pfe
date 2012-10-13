<?php echo $this->Session->flash();  ?>
<table class="table table-bordered">
	<tr>
		<td>nom</td>
		<td>login</td>
		<td>mail</td>
		<td>Etat</td>
		<td>Action</td>
	</tr>
	<?php foreach ($users as $k => $v): // $v=current($v);?> <?php //debug($v);die;  ?>
		<tr>
		<td><?php echo $v['User']['nom'] ?></td>
		<td><?php echo $v['User']['username'] ?></td>
		<td><?php echo $v['User']['mail'] ?></td>
		<td><?php 
		if ( $v['User']['etat']==1 )
			{
				echo '<span class="label label-important">Désactivé</span>';
				 }
			      else {

			      	echo '<span class="label label-success">Actif</span>';
			      	   }

			?></td>
		<td><?php echo $this->Html->link("Editer", array('action' => 'edit', $v['User']['id'] ));  ?> 
			| 
			<?php 

			if ( $v['User']['etat']==1 )
			{
			echo $this->Html->link(  
			"Activer", array('action' => 'activate', $v['User']['id']), null,
			'Voulez vous vraiment désactiver cet utilisateur ' );
			}
			else 
				{echo $this->Html->link(  
			"Désactiver", array('action' => 'desactvate', $v['User']['id']), null,
			'Voulez vous vraiment désactiver cet utilisateur ' );

			}
			  ?>
</td>
	</tr>
	<?php endforeach ?>
	
	
</table>
<?php 
 
echo $this->Paginator->numbers() ; 
?>