<?php $m = $this->requestAction('Messages/listemessages/'.$id); 
//$m= current($m);
//debug($m); die;
    
  ?>
<h5><?php echo __('Fille des Messages') ?></h5>
    <?php foreach ($m as $key => $value):  ?>
        <?php //debug($value);die;  ?>
        <div id='centermessage'>
    <div id="exp">  <?php echo _('De la part de :') ?><?php echo $value['Userexp']['nom'] ?></div>
    <div id="date"> <?php echo _('Envoyéer Le :') ?> <?php echo $value['Message']['created'] ?></div>
    <div id="message"> <?php echo $value['Message']['msg'] ?> </div>
    
</div>
    <?php endforeach ?>

