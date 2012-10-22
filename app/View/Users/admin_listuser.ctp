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
		if ( $v['User']['etat']==0 )
			{
				echo '<span class="label label-important">Désactivé</span>';
				 }
			      else {

			      	echo '<span class="label label-success">Actif</span>';
			      	   }

			?></td>
		<td>
		    <a class='btn' href="<?php echo $this->Html->url(array(
                         'action' => 'detailuser',
                         $v['User']['id']
                        ));              ?>" >
		    
		    <i class=" icon-pencil"></i>
		   </a>
		
			<?php 

			if ( $v['User']['etat']==0 )
			{
			echo $this->Html->link(
			"Activer",  array('action' => 'activate', $v['User']['id']), array('class'=>'btn'),
			'Voulez vous vraiment activer cet utilisateur ');
			}
			else 
				{echo $this->Html->link(  
			"Désactiver",array('action' => 'desactvate', $v['User']['id']), array('class'=>'btn'),
			'Voulez vous vraiment désactiver cet utilisateur ');

			}
			  ?>
</td>
	</tr>
	<?php endforeach ?>
	
	
</table>
<?php 
 
echo $this->Paginator->numbers() ; 
?>

<div style="float: right;">
    <a class="btn btn-primary" href="/admin/Users/detailuser" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout Utilisateur') ?></a>
</div>