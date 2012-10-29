<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
  	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>SNDP </title>
    
   <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('jqx.base');
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('sndp');
		echo $this->Html->script('bootstrap');
		
		echo $this->Html->script('jquery');
        echo  $this -> Html -> script('jqdateformat');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

  </head>
  <body> 
    <div id="wrapper"> 
      <div id="bg"> 
      	
        <div id="header"></div>  
        	<?php echo $this->element('topnav') ?>
        <div id="page"> 
          <div id="container"> 
            <!-- Title -->  
            <div id="topTitle"></div>  
            <!-- banner -->  
            <div id="banner"></div>  
            <!-- end banner -->  
            <!-- horizontal navigation -->  
            <div id="nav1"> 
             <?php echo $this->element('menu') ?>
            </div>  
            <!-- end horizontal navigation -->  
            <!--  content -->  
            <div id="content" style="padding-top: 25px"> 
             <?php echo $this->Session->flash(); ?>
              <?php echo $this->fetch('content'); ?>
              <div class="clear" style="height:40px"></div> 
            </div>  
            <!-- end content --> 
          </div>  
          <!-- end container --> 
        </div>  
        <div id="footerWrapper"> 
          <div id="footer"> 
            <p style="padding-top:10px"> 
              <!-- 
DO NOT REMOVE OR MODIFY THE FOOTER LINK BELOW.
If you want to remove this link please make a 10 dollars donation at www.dotemplate.com
-->  
              <a href="#" shape="rect">SNDP</a> 2012
            </p> 
          </div> 
        </div> 
      </div> 
    </div> 
      <?php debug($this->Session->read()); ?>
    <?php debug($this->request->params);  ?>
	<?php echo $this->element('sql_dump'); ?>
  </body>
</html>
