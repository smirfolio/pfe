
<table class="table table-bordered">
	<tr>
		<td>nom</td>
		<td>login</td>
		<td>mail</td>
		<td>Action</td>
	</tr>
	<?php foreach ($user as $k => $v):  $v=current($v);?>
		<tr>
		<td><?php echo $v['nom'] ?></td>
		<td><?php echo $v['username'] ?></td>
		<td><?php echo $v['mail'] ?></td>
		<td>edit | Supp</td>
	</tr>
	<?php endforeach ?>
	
	
</table>