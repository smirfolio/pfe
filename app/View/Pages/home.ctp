	<?php 

		 $this->Html->script('/js/gettheme.js', array('inline'=>false));
	 	 $this->Html->script('/js/jqwidgets/jqxcore.js', array('inline'=>false));
		 $this->Html->script('/js/jqwidgets/jqxwindow.js', array('inline'=>false));
		 $this->Html->script('/js/jqwidgets/jqxdocking.js', array('inline'=>false));
         
          $this->Html->script('/js/jqwidgets/jqxbuttons.js', array('inline'=>false));
           $this->Html->script('/js/jqwidgets/jqxscrollbar.js', array('inline'=>false));
            $this->Html->script('/js/jqwidgets/jqxmenu.js', array('inline'=>false));
             $this->Html->script('/js/jqwidgets/jqxdata.js', array('inline'=>false));
              $this->Html->script('/js/jqwidgets/jqxgrid.js', array('inline'=>false));
	if($this->Html->isadmin()){$url ='admin_';}
    else{$url='';}
	?>

	
	
    		<?php  $this->Html->scriptStart(array('inline'=>false)); ?>
    		
		    $(document).ready(function () {
            
            var theme = getTheme();
             $('#docking').jqxDocking({ theme: 'sndp', orientation: 'horizontal', width: 800, mode: 'docked' });
              $('#docking').jqxDocking('hideAllCloseButtons');
            $('#docking').jqxDocking('showAllCollapseButtons');

            $('#docking').jqxDocking('disableWindowResize', 'window0');
            $('#docking').jqxDocking('disableWindowResize', 'window1');
            $('#docking').jqxDocking('disableWindowResize', 'window2');
            $('#docking').jqxDocking('disableWindowResize', 'window3');
            $('#docking').jqxDocking('disableWindowResize', 'window4');

        });
        
   
        
	<?php   $this->Html->scriptEnd(); ?>	
	
<h3><?php echo __('DashBoard') ?></h3>
 <div id='jqxWidget'>
        <div id="docking" style="float: left;">
            <div style="overflow: hidden;">
                <div id="window0" style="height: 300px">
                   <?php echo $this->element('/dashBoard/'.$url.'message') ?>
                   
                </div>
                <div id="window1" style="height: 300px;">
                      <?php echo $this->element('/dashBoard/'.$url.'reclamation') ?>
                </div>
            </div>
            <div style="overflow: hidden;">
                <div id="window2" style="height: 300px">
                   <?php echo $this->element('/dashBoard/'.$url.'parc') ?>
                </div>
            </div>
        </div>
    </div>
