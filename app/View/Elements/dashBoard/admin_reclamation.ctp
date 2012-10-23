 <?php $nreclam = $this->requestAction('/Reclamations/dernierreclamadmin'); 
  
//$m= current($m);
 //  debug($nreclam);  die;
//echo json_encode($nreclam)
  ?>
     
    <?php  $this->Html->scriptStart(array('inline'=>false)); ?>
     /////// 
        $(document).ready(function () {
    // prepare the data
   
  //  var source ={
   //     datatype: "json",
    //    datafields: [{ name: 'identifiant' },{ name: 'created' },{ name: 'usernom' },{ name: 'sitenom' },{ name: 'vehicule' },],
     //   url: 'Reclamations/dernierreclamadmin'
   // };
   var data = <?php echo json_encode($nreclam)  ?>;
     var source =
            {
                localdata: data,
                datatype: "array"
            };
            
    $("#jqxgrid").jqxGrid({
        width: 380,
       autoheight: true,
        source: source,
        theme: 'sndp',
        columns: [
            { text: 'Id Reclam', datafield: 'identifiant',width: 100},
            { text: 'Créer le', datafield: 'created',width: 100},
            { text: 'Reclamateur', datafield: 'usernom',width: 100},
            { text: 'Site', datafield: 'sitenom',width: 75},
            { text: 'Matricule Voi', datafield: 'vehicule',width: 100}
        ]
    });
});

    <?php   $this->Html->scriptEnd(); ?>    
 
 <div>
    <?php echo __('Dérnieres reclamations') ?></div>
   
     <div id='jqxWidget' style="font-size: 9px; font-family: Verdana; float: left;">
        <div id="jqxgrid"></div>
    </div>