<?php
//debug($reclam);

//debug(json_encode($sites));die;
$this -> Html -> script('/js/gettheme.js', array('inline' => false));
//  $this->Html->script('/js/jqwidgets/jquery-1.8.2.min.js',
// array('inline'=>false));
$this -> Html -> script('jquery-ui', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxcore.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxcalendar.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxbuttons.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxscrollbar.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxlistbox.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxdropdownlist.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxgrid.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxgrid.sort.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxgrid.columnsresize.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxgrid.pager.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxdata.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxgrid.selection.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxpanel.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxcheckbox.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxchart.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxtooltip.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/globalization/jquery.global.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxexpander.js', array('inline' => false));
//  debug($voiture);die;
?>
<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
///JChrt
$(document).ready(function () {
// prepare chart data as an array
var data = <?php echo json_encode($sites)  ?>;
// prepare jqxChart settings
var settings = {
title: "Statistique des pannes par site",
description: "Nombre de reclamation en cours reflete le nombre des véhicule en panne",
enableAnimations: true,
showLegend: true,
padding: { left: 5, top: 5, right: 5, bottom: 5 },
titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
source: data,
categoryAxis:
{
text: 'Category Axis',
textRotationAngle: 315,
dataField: 'sites',
showTickMarks: true,
tickMarksInterval: 1,
tickMarksColor: '#888888',
unitInterval: 1,
showGridLines: false,
gridLinesInterval: 1,
gridLinesColor: '#888888',
axisSize: 'auto'
},
colorScheme: 'scheme04',
seriesGroups:
[
{
type: 'stackedcolumn100',
columnsGapPercent: 100,
seriesGapPercent: 5,
valueAxis:
{
unitInterval:10,
minValue: 0,
maxValue: 100,
displayValueAxis: true,
description: 'Nombre totale Véhicule',
axisSize: 'auto',
tickMarksColor: '#888888'
},
series: [
{ dataField: 'nbrpanne', displayText: 'En panne' },
{ dataField: 'nbrvalide', displayText: 'Véhicules disponibles' }

]
}
]
};
// setup the chart
$('#jqxChart').jqxChart(settings);
});

//jgrid tab
///////
$(document).ready(function () {
// prepare the data

//  var source ={
//     datatype: "json",
//    datafields: [{ name: 'identifiant' },{ name: 'created' },{ name: 'usernom' },{ name: 'sitenom' },{ name: 'vehicule' },],
//   url: 'Reclamations/dernierreclamadmin'
// };
var data = <?php echo json_encode($reclam)  ?>;
var role = <?php $role = $this -> Html -> isadmin();
    if (isset($role) && $role != false) { echo $this -> Html -> isadmin();
    } else {echo 0;
    }
    ?>;
    var iduser = <?php $iduser = $this -> Html -> iduser();
    if (isset($iduser) && $iduser != false) { echo $this -> Html -> iduser();
    } else {echo null;
    }
    
  ?>;
//console.log(role);
var source =
{
localdata: data,
datatype: "array"
};

var vuestat = function (row, column, value) {
    if (role ==1){
if (value===false)
{  return ' <span class="label label-important"><?php echo _('Non') ?></span>';}
else {return ' <span class="label label-success"><?php echo _('Oui') ?></span>';}}


};
var msgstat = function (row, column, value) {//console.log(value);
if (value!='')
    if(value!=iduser){
{  return '<span class="label label-important"><i class="icon-envelope icon-white"></i></span>';}}
else {return '';}


};

 var convdate = function (row, column, value) {
          return  $.format.date(value, "dd/MM/yyyy");
            }
            

var editaction = function (row, column, value) {
if (role ==1){
return '<a class="btn" href="/admin/Reclamations/detailreclam/'+value+'" ><i class=" icon-eye-open"></i></a><a class="btn" href="/admin/Reclamations/suspreclam/'+value+'"><i class="icon-ban-circle"></i></a>';
}
else {
return '<a class="btn" href="/Reclamations/detailreclam/'+value+'" ><i class=" icon-eye-open"></i></a>';
}
}

$("#jqxgrid").jqxGrid({
width: 790,
autoheight: true,
source: source,
theme: 'sndp',
pageable: true,
sortable: true,
columnsresize: true,
columns: [
{ text: 'Id Reclam', datafield: 'identifiant',width: 75},
{ text: 'Réclamateur', datafield: 'reclamateur',width: 155},
{ text: 'Panne', datafield: 'panne',width: 120},
{ text: 'Matricule', datafield: 'vehimatricul',width: 100},
{ text: 'Status', datafield: 'status',width: 100},
{ text: 'Vue', datafield: 'vue',width: 40,cellsrenderer: vuestat},
{ text: 'Msg', datafield: 'msg',width: 25,cellsrenderer: msgstat},
{ text: 'Créer le', datafield: 'reclamdate',width: 105,cellsrenderer:convdate},
{ text: 'Action', datafield: 'reclamid',width: 95,cellsrenderer: editaction}

]
});

});

     

// Expander tab
$(document).ready(function () {
// Create jqxExpander
var theme = getTheme();
$("#jqxExpander").jqxExpander({ width: '790px',  toggleMode: 'dblclick', expanded: false, theme: 'sndp' });
});

// Expander tab2
$(document).ready(function () {
// Create jqxExpander
var theme = getTheme();
$("#jqxExpander2").jqxExpander({ width: '790px',  toggleMode: 'dblclick', expanded: false, theme: 'sndp' });
});

///Autocomplete
$(document).ready(function(){
// Caching the movieName textbox:
var username = $('#username');

// Defining a placeholder text:
username.defaultText('Recherche utilisateur..');

// Using jQuery UI's autocomplete widget:
username.autocomplete({
minLength    : 1,
source        : 'searchuser',
select: function( event, ui ) {

document.getElementById('user').value =ui.item.nom;
//   console.log(ui.item.nom);
}
});

});

// A custom jQuery method for placeholder text:

$.fn.defaultText = function(value){

var element = this.eq(0);
element.data('defaultText',value);

element.focus(function(){
if(element.val() == value){
element.val('').removeClass('defaultText');
}
}).blur(function(){
if(element.val() == '' || element.val() == value){
element.addClass('defaultText').val(value);
}
});

return element.blur();
}

//date piquer date de debu ////////////////////
$(document).ready(function () {//alert('im here do i fonction');
var theme = getTheme();
// Create a jqxDateTimeInput
$("#Datedeb").jqxDateTimeInput({width: '220px', height: '25px', theme: 'sndp',formatString: "MM-dd-yyyy h:mm" });
$('#Datedeb').bind('valuechanged', function (event) {
var date = event.args.date;
date =date.toISOString();
date =date.replace("T"," ");
date =date.substring(0, date.length - 5);
$("#datedeb").val(date);

});

});
//date piquer date de fin ////////////////////
$(document).ready(function () {//alert('im here do i fonction');
var theme = getTheme();
// Create a jqxDateTimeInput
$("#Datefin").jqxDateTimeInput({width: '220px', height: '25px', theme: 'sndp',formatString: "MM-dd-yyyy h:mm" });
$('#Datefin').bind('valuechanged', function (event) {
var date = event.args.date;
date =date.toISOString();
date =date.replace("T"," ");
date =date.substring(0, date.length - 5);
$("#datefin").val(date);

});

});

<?php   $this -> Html -> scriptEnd(); ?>

<div id='jqxExpander'>
	<div>
		<h5> <?php echo _('Rechercher Déclaration: ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
	</div>
	<div>
		<?php echo $this -> Form -> create('Reclamation', array('action' => 'listreclam')); ?>
		<div class='left' style="float: left; position: relative; width: 400px">
			<div class='input text'>
				<label for="datedebu"><?php echo _('Déclarations de la date de ') ?></label>
				<div id='Datedeb'></div>
				<div id='Events'></div>
			</div>
			<?php echo $this -> Form -> hidden('datedeb', array('id' => 'datedeb')); ?>
			<div class='input text'>
                <label for="datefin"><?php echo _('à la date de : ') ?></label>
                <div id='Datefin'></div>
                <div id='Events'></div>
            </div>
            <?php echo $this -> Form -> hidden('datefin', array('id' => 'datefin')); ?>
			<?php echo $this->Form->input('status',array('options' =>$status,'empty'=>'','label' =>'Status :'))  ?>
			
		</div>
		<div class='right' >
			<?php if ($this->Html->isadmin()): ?>
			<!--   autocomlete  -->
			<div class="users form">
				<?php   echo $this -> Form -> input('username', array('div' => false, 'type' => 'text', 'id' => 'username', 'label' => 'Utilisateur :')); ?>
			</div>
			<?php   echo $this -> Form -> input('user', array('type' => 'hidden', 'id' => 'user')); ?>
			<?php //echo $this->Form->input('user',array('label'
                // =>'Utilisateur :')) ?>
			<?php echo $this->Form->input('site',array('options'=>$siteslist,'label' =>'Site  :','empty'=>''))  ?>
			<?php endif ?>
			<?php echo $this->Form->input('panne',array('options'=>$pannes,'label' =>'Type Panne :', 'empty'=>''))  ?>
		</div>
		<div class='clearfix'></div>
		<p>
			<?php echo $this->Form->reset('Reset',array('class'=>'btn', 'div' =>false))  ?>   <?php echo $this->Form->submit('Rechercher',array('class'=>'btn', 'div' =>false))  ?>
		</p>
	</div>
</div>
<div id='jqxExpander2'>
	<div>
		<h5> <?php echo _('Statistique Déclaration: ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
	</div>
	<div>
		<div id='jqxChart' style="width:680px; height:400px;"></div>
	</div>
</div>

<h3><?php echo __('Liste de vos déclarations') ?></h3>

<div id='jqxWidget' style="font-size: 9px; font-family: Verdana; float: left;">
	<div id="jqxgrid"></div>
</div>
<?php //die; ?>
<!--
<table class="table table-striped table-bordered">
<thead>
<tr>
<th><?php echo __('Identifiant') ?></th>
<th><?php echo __('Panne') ?></th>
<th><?php echo __('Matricule') ?></th>

<th><?php echo __('Status') ?></th>
<th></th>
<th><?php echo __('Créer le') ?></th>
<th><?php //echo __('Action') ?></th>
</tr>
</thead>
<?php foreach ($reclam as $k => $v): ?>
<tr>
<td><?php echo $v['Reclamation']['identifiant'] ?></td>
<td><?php echo $v['Panne']['label']  ?></td>

<td><?php echo $v['Vehicule']['matricule']  ?></td>

<td><?php echo $v['Statu']['label']  ?></td>
<td>
<?php if ($this->Html->isadmin()): ?>
<?php if (isset($v['NotifsReclamation'][0]) && $v['NotifsReclamation'][0]['vue']===false): ?>
<span class="label label-important"><?php echo _('Nouvel') ?></span>
<?php else: ?>
<span class="label label-success"><?php echo _('Vue') ?></span>
<?php endif ?>
<?php endif ?>

<?php if ((isset($v['NotifsMessage'][0]) && $v['NotifsMessage'][0]['vue']===false) && $v['NotifsMessage'][0]['expediteur_id']!=$this->Html->iduser()): ?>
<span class="label label-important"><i class="icon-envelope icon-white"></i></span>
<?php endif ?>

</td>
<td><?php echo $this -> Time -> format('d/M/Y', $v['Reclamation']['created']); ?></td>
<?php if ($this->Html->isadmin()): ?>
<td><a class="btn" href="/admin/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" ><i class=" icon-eye-open"></i></a><a class="btn" href="/admin/Reclamations/suspreclam/<?php echo $v['Reclamation']['id'] ?>"><i class="icon-ban-circle"></i></a>

</td>
<?php else: ?>
<td><a class="btn" href="/Reclamations/detailreclam/<?php echo $v['Reclamation']['id'] ?>" title='<?php echo __('Détails reclamation') ?>'
><i class=" icon-eye-open"></i></a></td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
-->

<div style="padding-top:10px; float: right;">
	<a class="btn btn-primary" href="/Reclamations/addreclam" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de déclaration') ?></a>
</div>
<script>
	$("#ReclamationReset").live("click", function() {
		location.reload();
	});

</script>