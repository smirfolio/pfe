<?php echo $this->Session->flash();  ?>
<table class="table table-bordered">
	<tr>
		<td>nom</td>
		<td>login</td>
		<td>mail</td>
		<td>Action</td>
	</tr>
	<?php foreach ($users as $k => $v): // $v=current($v);?> <?php //debug($v);die;  ?>
		<tr>
		<td><?php echo $v['User']['nom'] ?></td>
		<td><?php echo $v['User']['username'] ?></td>
		<td><?php echo $v['User']['mail'] ?></td>
		<td><?php echo $this->Html->link("Editer", array('action' => 'edit', $v['User']['id'] ));  ?> 
			| 
			<?php echo $this->Html->link("Supprimer", array('action' => 'delete', $v['User']['id']), null,
			'Voulez vous vraiment suoorimer cet utilisateur ' );  ?>
</td>
	</tr>
	<?php endforeach ?>
	
	
</table>
<?php 
 
echo $this->Paginator->numbers() ; 
?>