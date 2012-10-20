 

 
  <?php 
   $this->Html->script('/js/gettheme.js', array('inline'=>false));
 //  $this->Html->script('/js/jqwidgets/jquery-1.8.2.min.js', array('inline'=>false));
   
	 	 $this->Html->script('/js/jqwidgets/jqxcore.js', array('inline'=>false));
	 	
		  
	 	  $this->Html->script('/js/jqwidgets/jqxbuttons.js', array('inline'=>false));
	 	   $this->Html->script('/js/jqwidgets/jqxscrollbar.js', array('inline'=>false));
	 	 $this->Html->script('/js/jqwidgets/jqxlistbox.js', array('inline'=>false));
	 	 $this->Html->script('/js/jqwidgets/jqxdropdownlist.js', array('inline'=>false));
		 $this->Html->script('/js/jqwidgets/jqxgrid.js', array('inline'=>false));
	 	  $this->Html->script('/js/jqwidgets/jqxgrid.sort.js', array('inline'=>false));
		   $this->Html->script('/js/jqwidgets/jqxgrid.pager.js', array('inline'=>false));
		    $this->Html->script('/js/jqwidgets/jqxdata.js', array('inline'=>false));
	 	  $this->Html->script('/js/jqwidgets/jqxgrid.selection.js', array('inline'=>false));
	 	 $this->Html->script('/js/jqwidgets/jqxpanel.js', array('inline'=>false));
	 	$this->Html->script('/js/jqwidgets/jqxcheckbox.js', array('inline'=>false)); 
	 	 $this->Html->script('/js/jqwidgets/jqxcalendar.js', array('inline'=>false)); 
	 	 $this->Html->script('/js/jqwidgets/jqxdatetimeinput.js', array('inline'=>false));
	 	  $this->Html->script('/js/jqwidgets/jqxgrid.storage.js', array('inline'=>false));
	 	  $this->Html->script('/js/jqwidgets/globalization/jquery.global.js', array('inline'=>false));
	 //	debug($voiture);die;
 ?>
	<?php  $this->Html->scriptStart(array('inline'=>false)); ?>
         
          $(document).ready(function () {
            var data = <?php echo json_encode($voiture)  ?>;
           
            var source =
            {
                localdata: data,
                datatype: "array"
            };
             var cellsrenderer = function (row, column, value) {
             	if (value==false)
              {  return ' <span class="label label-important"><?php echo _('Oui') ?></span>';}
              else {return ' <span class="label label-success"><?php echo _('Nom') ?></span>';}
            }
            var cellsrenderer2 = function (row, column, value) {
           return '<a href=\"detailvehicule/'+value+'\">Editier</a> | <a href=\"deletevehicule/'+value+'\">Supp</a>';
            }
            $("#jqxgrid").jqxGrid(
            {
            	theme: 'sndp',
                width: 780,
                 sortable: true,
                source: source,
                pageable: true,
                autoheight: true,
               // pagerrenderer: pagerrenderer,
                columns: [
                  { text: 'Matricule', datafield: 'matricule', width: 150 },
                  { text: 'Marque', datafield: 'marque', width: 120 },
                  { text: 'DM Circulation', datafield: 'date_circulation', width: 180 },
                  { text: 'En panne', datafield: 'active', width: 80, cellsalign: 'right',cellsrenderer: cellsrenderer },
                  { text: 'Site', datafield: 'sitenom', width: 120, cellsalign: 'right'   },
                   { text: 'Action', datafield: 'id', width: 130, cellsalign: 'right',cellsrenderer: cellsrenderer2  }
                   

                ]
            });
        });
        
	 	 
<?php   $this->Html->scriptEnd(); ?>		 
	 	 
	 	 
		

 <?php 
echo $this->Session->flash(); ?>
   
 
<div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
 <!--      
<table class="table table-bordered">
	<tr>
		<td>Mtricule</td>
		<td>Marque</td>
		<td>Modèle</td>
		<td>Site</td>
		<td>Action</td>
	</tr>
	<?php // foreach ($vehicules as $k => $v): // $v=current($v);?> 
		<?php 
		//echo json_encode($vehicules);
		//debug($v);die;  ?>
		<tr>
		<td><?php //echo $v['Vehicule']['matricule'] ?></td>
		<td><?php //echo $v['Vehicule']['marque'] ?></td>
		<td><?php //echo $v['Vehicule']['model'] ?></td>
		<td><?php //echo $v['Site']['nom'] ?>  </td>
	 
		<td><?php //echo $this->Html->link("Editer", array('action' => 'detailvehicule', $v['Vehicule']['id'] ));  ?> 
			| 
			 <?php //echo $this->Html->link("Supprimer", array('action' => 'detailvehicule', $v['Vehicule']['id'] ));  ?> 
        </td>
	</tr>
	<?php //endforeach ?>
	
	
</table>
-->