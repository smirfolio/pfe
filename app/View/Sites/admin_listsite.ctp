 
  <?php
  // debug($site);die;
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
    
 ?>
	<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
         $("#VehiculeReset").live("click", function(){  location.reload(); });  
         
          $(document).ready(function () {
            var data = <?php echo json_encode($site)  ?>;
            
          

            var source =
            {
                localdata: data,
                datatype: "array"
            };
             
            var cellsrenderer2 = function (row, column, value) {
           return '<a  class="btn" href=\"/admin/Sites/detailsite/'+value+'\"><i class=\" icon-pencil\"></i></a>  <a  class="btn" href=\"/admin/Site/deletesite/'+value+'\"><i class="icon-ban-circle"></a> ';
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
                  { text: 'Nom', datafield: 'nom', width: 150 },
                  { text: 'Gouvernerat', datafield: 'gouvernerat', width: 100 },
                  { text: 'Adresse', datafield: 'adresse', width: 200 },
                   { text: 'Téléphone', datafield: 'tel', width: 120 },
                  { text: 'Nbr Vehicule', datafield: 'nbrvehicule', width: 120} ,
                   { text: 'Action', datafield: 'id', width: 90, cellsalign: 'right',cellsrenderer: cellsrenderer2  }
                  
                   
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
        <h5>    <?php echo _('Rechercher Site : ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
        </div>
        <div>
            <?php echo $this->Form->create('Site',array('action' =>'admin_listsite'));  ?>
                    <div class='left' style="float: left; position: relative; width: 400px">
                     <?php // echo $this->Form->input('active',array('options' =>array('0'=>'Oui','1'=>'Nom'),'empty'=>'','label' =>'en Panne :'))  ?>
                     <?php if ($this->Html->isadmin()): ?>
                      
                            <?php echo $this->Form->input('site',array('label' =>'Site  :'))  ?>
                             <?php echo $this->Form->input('gov',array('empty'=>'','type'=>'select','options'=>$listgov,'label' =>'Gouvernerat de :'))  ?>
                     <?php endif ?>
                    
                       <?php //echo $this->Form->input('panne',array('options'=>$pannes,'label' =>'Type Panne :'))  ?>
            </div>
            <div class='right' >
                  
                       <?php   //echo $this->Form->input('marque',array('empty'=>'','type'=>'select','id'=>'marque','options'=>$listmarque)); ?>
                 <?php //echo $this->Form->input('marque',array('options'=>$pannes,'label' =>'Marque:'))  ?>
                  <?php //echo $this->Form->input('model',array('options'=>$listmodel,'label' =>'Model :','empty'=>''))  ?>
                </div>
                <div class='clearfix'> </div>
                <div class='bonton' >
       <p> <?php echo $this->Form->reset('reset',array('class'=>'btn', 'div' =>false))  ?>    <?php echo $this->Form->submit('Rechercher',array('class'=>'btn', 'div' =>false))  ?></p> 
       </div>
        </div>
    </div>
    <div class='clearfix'> </div>
    <br>
<div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
        <div style="float: right;">
<a class="btn btn-primary" href="/admin/Sites/detailsite/" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de site') ?></a>
</div>

