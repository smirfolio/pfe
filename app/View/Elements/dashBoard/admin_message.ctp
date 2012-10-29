 <?php $dermessage= $this->requestAction('/Messages/dernierremessage');  ?>
 <?php //debug($dermessage);die;  ?>
<div>
                       <?php echo __('Dérniers messages') ?></div>
                    <div>
                        
                        <?php foreach ($dermessage as $key => $value): ?>
                              <blockquote>
            
           <p><?php echo _('Envoyé par :')  ?>  <b><?php echo $value['expediteur'];  ?></b></p>
                <?php echo $this->Text->truncate(
                             $value['msg'],
                             70,
                                array(
                                    'ellipsis' => '...',
                                    'exact' => false
                                )
                );   ?>
              
                         <small>Envoyé le:<cite title="Source Title"> <?php echo $value['dateenvoi'];  ?></cite><?php echo _(' De :')  ?> <?php echo $value['sitenom'];  ?></small>
            </blockquote>  
                        <?php endforeach ?>
                        
          
                                 



</div>