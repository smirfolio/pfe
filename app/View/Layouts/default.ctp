<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>SNDP </title>
   <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('jquery');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
  </head>
  <body> 
    <div id="wrapper"> 
      <div id="bg"> 
        <div id="header"></div>  
        <div id="page"> 
          <div id="container"> 
            <!-- Title -->  
            <div id="topTitle"></div>  
            <!-- banner -->  
            <div id="banner"></div>  
            <!-- end banner -->  
            <!-- horizontal navigation -->  
            <div id="nav1"> 
              <ul>
                <li id="current" style="border:none">
                  <a href="#" shape="rect"><?php echo _('Acceuil');  ?></a>
                </li>
                <li>
                  <a href="/Reclamations/listreclam" shape="rect"><?php echo _('Reclamation');   ?></a>
                </li>
                <?php if ($this->Html->isadmin()): ?>
                    <li>
                  <a href="#" shape="rect"><?php echo _('Admin');   ?></a>
                </li>
                <?php endif ?>
                 <li>
                  <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false))  ?>
                </li>
              </ul> 
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
              <a href="http://www.dotemplate.com" shape="rect">Templates</a> maker
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
