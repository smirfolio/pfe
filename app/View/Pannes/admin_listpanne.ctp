<?php //debug($pannes);die; ?>

<?php echo $this->Session->flash();  ?>
<table class="table table-bordered">
	<tr>
		<td>Code</td>
		<td>Type Panne</td>
		 <td>Description Panne</td>
		<td>Action</td>
	</tr>
	<?php foreach ($pannes as $k => $v): // $v=current($v);?> <?php //debug($v);die;  ?>
		<tr>
		<td><?php echo $v['Panne']['id'] ?></td>
		<td width="150px"><?php echo $v['Panne']['label'] ?></td>
		<td width="450px"><?php echo $v['Panne']['description'] ?></td>
		 
		 
		<td>
		    <a class='btn' href="<?php echo $this->Html->url(array(
                         'action' => 'detailpanne',
                         $v['Panne']['id']
                        ));              ?>" >
		    
		    <i class=" icon-pencil"></i>
		   </a>
		<?php echo  $this->Html->mylink('', array('action' => 'deletepanne',  $v['Panne']['id']), array('class'=>'btn'), __('Etes vous sure de vouloire supprimer?'),"icon-ban-circle");  ?>
			
		    
		    
		   </a>
</td>
	</tr>
	<?php endforeach ?>
	
	
</table>
<?php 
 
//echo $this->Paginator->numbers() ; 
?>

<div style="float: right;">
    <a class="btn btn-primary" href="/admin/Pannes/detailpanne" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout Type de Panne') ?></a>
</div>