<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>SNDP </title>
   <?php
		echo $this->Html->meta('icon');

		 echo $this->Html->css('login');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery');

		echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
  </head>
  <body> 
  	 
  	 	 	   
  	<div id="login"> <h1><?php echo _('Déclaration des Pannes Véhicules S.N.D.P')  ?></h1> <!-- #login_panel -->	
  		 <?php echo $this->Html->image('logosndp.png', array('class'=>'img-rounded','alt' => 'AGIL'));  ?>
  		 
  		 <?php echo $this->Session->flash(); ?>
	
 <div id="login_panel"> 
			<?php echo $this->fetch('content'); ?>
			 </div>
			<div class="clear" style="height:0px"></div> 
	</div>  	
  <!-- #login -->

 
 
               
          
 
   
    
  </body>
</html>
 <?php //debug($this->Session->read()); ?>
	<?php //echo $this->element('sql_dump'); ?>