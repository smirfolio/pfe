 
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
	  $this -> Html -> script('/js/jqwidgets/jqxrating.js', array('inline' => false));
  //debug($reparators);die;
 ?>
	<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
         $("#ReparatorReset").live("click", function(){  location.reload(); });  
         
          $(document).ready(function () {
            var data = <?php echo json_encode($reparators)  ?>;
            
          

            var source =
            {
                localdata: data,
                datatype: "array"
            };
             var cellsrenderer = function (row, column, value) {
             	if (value==false)
              {  return ' <a  class="btn" href=\"/admin/Reparators/detailreparator/'+value+'\"><i class=\" icon-pencil\"></i></a> <!-- <a  class="btn" href=\"/admin/Reparators/deletreparator/'+value+'\"><i class="icon-ban-circle"></a>';}
              else {return ' <span class="label label-success"><?php echo _('Nom') ?></span>';}
            }
            var cellsrenderer2 = function (row, column, value) {
           return '<a  class="btn" href=\"/admin/Reparators/detailreparator/'+value+'\"><i class=\" icon-pencil\"></i></a>   <a  class="btn" href=\"/admin/Reparators/deletreparator/'+value+'\"><i class="icon-ban-circle"></a>';
            }
            
            var convdate = function (row, column, value) {
          return  $.format.date(value, "dd/MM/yyyy");
            }
            
            $("#jqxgrid").jqxGrid(
            {
            	theme: 'sndp',
                width: 790,
                 sortable: true,
                source: source,
                pageable: true,
                autoheight: true,
               // pagerrenderer: pagerrenderer,
                columns: [
                  { text: 'Société', datafield: 'ste', width: 150 },
                  { text: 'Contact', datafield: 'nom_contact', width: 120 },
                  { text: 'Tel', datafield: 'tel', width:  80,cellsrenderer: convdate },
                  { text: 'Fax',  datafield: 'fax', width:  80,cellsrenderer: convdate },
                  { text: 'adresse', datafield: 'adresse', width: 120, cellsalign: 'right'   },
                   { text: 'Mail', datafield: 'mail', width:150, cellsalign: 'right'   },
                  
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
        <h5>    <?php echo _('Rechercher Réparateur : ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
        </div>
        <div>
            <?php echo $this->Form->create('Reparator',array('action' =>'admin_listreparator'));  ?>
                    <div class='left' style="float: left; position: relative; width: 400px">
                    
                      
                            <?php echo $this->Form->input('ste',array('label' =>'Société  :'))  ?>
                     <?php //endif ?>
                    
                       <?php  echo $this->Form->input('contact',array('label' =>'Contact  :'))  ?>
            </div>
            <div class='right' >
                  
                      <?php   echo $this->Form->input('tel',array('label' =>'Téléphone  :')); ?>
                 <?php //echo $this->Form->input('marque',array('options'=>$pannes,'label' =>'Marque:'))  ?>
                  <?php echo $this->Form->input('fax',array( 'label' =>'Fax :' ))  ?>
                </div>
                <div class='clearfix'> </div>
                <div class='bonton' >
       <p>  <?php //echo $this->Form->reset('reset',array('class'=>'btn', 'div' =>false))  ?> 
       	  <?php echo $this->Form->submit('Rechercher',array('class'=>'btn', 'div' =>false))  ?></p> 
       </div>
        </div>
    </div>
    <div class='clearfix'> </div> 
    <br>
<div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
        <div style="float: right;">
<a class="btn btn-primary" href="/admin/Reparators/detailreparator/" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de réparateur') ?></a>
</div>

