<?php
//debug($reclam);

        $this -> Html -> script('/js/gettheme.js', array('inline' => false));
        //  $this->Html->script('/js/jqwidgets/jquery-1.8.2.min.js',
        // array('inline'=>false));
         $this -> Html -> script('jquery-ui', array('inline' => false));
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
        $this -> Html -> script('/js/jqwidgets/jqxdatetimeinput.js', array('inline' => false));
        $this -> Html -> script('/js/jqwidgets/jqxexpander.js', array('inline' => false));
//  debug($voiture);die;
?>
<?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
        $(document).ready(function () {
        // Create jqxExpander
        var theme = getTheme();
        $("#jqxExpander").jqxExpander({ width: '790px',  toggleMode: 'dblclick', expanded: false, theme: 'sndp' });
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

<?php   $this -> Html -> scriptEnd(); ?>

	<div id='jqxExpander'>
		<div>
		<h5>	<?php echo _('Rechercher Reclamation: ')  ?><small>--<?php echo _('Double Click pour ouvrir')  ?></small></h5>
		</div>
		<div>
			<?php echo $this->Form->create('Reclamation',array('action' =>'listreclam'));  ?>
			         <?php echo $this->Form->input('status',array('options' =>$status,'empty'=>'','label' =>'Status :'))  ?>
			         <?php if ($this->Html->isadmin()): ?>
			             <!--   autocomlete  -->
			        
			           <div class="users form">

			           <?php   echo $this->Form->input('username',array('div' =>false,'type'=>'text','id'=>'username','label'=>'Utilisateur :')); ?>
			           
			           </div>
			           <div class='clearfix'> </div>
			           <?php   echo $this->Form->input('user',array('type'=>'hidden','id'=>'user')); ?>
						   <?php //echo $this->Form->input('user',array('label' =>'Utilisateur :'))  ?>
						    <?php echo $this->Form->input('site',array('label' =>'Site  :'))  ?>
					 <?php endif ?>
			        
			           <?php echo $this->Form->input('panne',array('options'=>$pannes,'label' =>'Type Panne :'))  ?>
			
		<p>  <?php echo $this->Form->reset('Reset',array('class'=>'btn', 'div' =>false))  ?>   <?php echo $this->Form->submit('Rechercher',array('class'=>'btn', 'div' =>false))  ?> </p>
		</div>
	</div>

<h3><?php echo __('Liste de vos réclamations') ?></h3>
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
<div style="float: right;">
	<a class="btn btn-primary" href="/Reclamations/addreclam" ><i class="icon-plus icon-white"></i> <?php echo __('Ajout de reclamation') ?></a>
</div>
<script>

$("#ReclamationReset").live("click", function(){  location.reload(); });  

 </script>