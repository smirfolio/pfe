	<?php 

		 $this->Html->script('/js/gettheme.js', array('inline'=>false));
	 	 $this->Html->script('/js/jqwidgets/jqxcore.js', array('inline'=>false));
		 $this->Html->script('/js/jqwidgets/jqxwindow.js', array('inline'=>false));
		 $this->Html->script('/js/jqwidgets/jqxdocking.js', array('inline'=>false));
	
	?>
	
	
    		<?php  $this->Html->scriptStart(array('inline'=>false)); ?>
		    $(document).ready(function () {
            
            var theme = getTheme();
             $('#docking').jqxDocking({ theme: theme, orientation: 'horizontal', width: 800, mode: 'docked' });
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
                   <?php echo $this->element('/dashBoard/message') ?>
                   
                </div>
                <div id="window1" style="height: 300px">
                      <?php echo $this->element('/dashBoard/reclamation') ?>
                </div>
            </div>
            <div style="overflow: hidden;">
                <div id="window2" style="height: 300px">
                   <?php echo $this->element('/dashBoard/parc') ?>
                </div>
            </div>
        </div>
    </div>
