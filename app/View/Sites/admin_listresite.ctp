 
  <?php
    $this -> Html -> script('/js/gettheme.js', array('inline' => false));
    //  $this->Html->script('/js/jqwidgets/jquery-1.8.2.min.js', array('inline'=>false));

    $this -> Html -> script('/js/jqwidgets/jqxcore.js', array('inline' => false));
   

    $this -> Html -> script('/js/jqwidgets/jqxbuttons.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxscrollbar.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxlistbox.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdropdownlist.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxgrid.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxgrid.sort.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxgrid.pager.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdata.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxgrid.selection.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxpanel.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcheckbox.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxcalendar.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
   // $this -> Html -> script('/js/jqwidgets/jqxgrid.storage.js', array('inline' => false));
    $this -> Html -> script('/js/jqwidgets/globalization/jquery.global.js', array('inline' => false));
     $this -> Html -> script('/js/jqwidgets/jqxexpander.js', array('inline' => false));
    //	debug($voiture);die;
 ?>
	<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
         $("#VehiculeReset").live("click", function(){  location.reload(); });  
         
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
           return '<a  class="btn" href=\"/admin/Vehicules/detailvehicule/'+value+'\"><i class=\" icon-pencil\"></i></a> <!-- <a  class="btn" href=\"/admin/Vehicules/activevehicule/'+value+'\"><i class="icon-ban-circle"></a> -->';
            }
            
            var convdate = function (row, column, value) {
          return  $.format.date(value, "dd/MM/yyyy");
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
                  { text: 'DM Circulation', datafield: 'date_circulation', width: 180,cellsrenderer: convdate },
                  { text: 'En panne', datafield: 'active', width: 80, cellsalign: 'right',cellsrenderer: cellsrenderer },
                  { text: 'Site', datafield: 'sitenom', width: 120, cellsalign: 'right'   },
                   { text: 'Action', datafield: 'id', width: 130, cellsalign: 'right',cellsrenderer: cellsrenderer2  }
                   

                ]
            });
        });
        
	 	 
	 	 $(document).ready(function () {
        // Create jqxExpander
        var theme = getTheme();
        $("#jqxExpander").jqxExpander({ width: '790px',  toggleMode: 'dblclick', expanded: false, theme: 'sndp' });
        });
        
        
       
<?php   $this -> Html -> scriptEnd(); ?>		 
	 	 
	 	 
		

 <?php
    echo $this -> Session -> flash();
 ?>
   
 
    <div id='jqxExpander'>
        <div>
        <h5>    <?php echo _('Rechercher Véhicule : ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
        </div>
        <div>
            <?php echo $this->Form->create('Vehicule',array('action' =>'admin_listvehicule'));  ?>
                    <div class='left' style="float: left; position: relative; width: 400px">
                     <?php echo $this->Form->input('active',array('options' =>array('0'=>'Oui','1'=>'Nom'),'empty'=>'','label' =>'en Panne :'))  ?>
                     <?php if ($this->Html->isadmin()): ?>
                      
                            <?php echo $this->Form->input('site',array('label' =>'Site  :'))  ?>
                     <?php endif ?>
                    
                       <?php //echo $this->Form->input('panne',array('options'=>$pannes,'label' =>'Type Panne :'))  ?>
            </div>
            <div class='right' >
                  
                       <?php   echo $this->Form->input('marque',array('empty'=>'','type'=>'select','id'=>'marque','options'=>$listmarque)); ?>
                 <?php //echo $this->Form->input('marque',array('options'=>$pannes,'label' =>'Marque:'))  ?>
                  <?php echo $this->Form->input('model',array('options'=>$listmodel,'label' =>'Model :','empty'=>''))  ?>
                </div>
                <div class='clearfix'> </div>
                <div class='bonton' >
       <p>  <?php echo $this->Form->reset('Reset',array('class'=>'btn', 'div' =>false))  ?>   <?php echo $this->Form->submit('Rechercher',array('class'=>'btn', 'div' =>false))  ?></p> 
       </div>
        </div>
    </div>
    <div class='clearfix'> </div>
    <br>
<div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
        <div style="float: right;">
<a class="btn btn-primary" href="/admin/Vehicules/detailvehicule/" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de vehicule') ?></a>
</div>

