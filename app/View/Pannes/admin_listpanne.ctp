<?php //debug($pannes);die; ?>
<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		return false;
	});
});
<?php   $this -> Html -> scriptEnd(); ?>
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
		
			  <a class='btn' data-confirm="Are you sure you want to delete?" href="<?php echo $this->Html->url(array(
                         'action' => 'deletepanne',
                          $v['Panne']['id']
                         
                        ));
						
						
						
						
						              ?>" >
						               
		    
		    <i class=" icon-ban-circle"></i>
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