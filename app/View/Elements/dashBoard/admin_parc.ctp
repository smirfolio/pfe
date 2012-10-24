 <?php $stat= $this->requestAction('/Reclamations/etatparcsite');  ?>
 <?php //debug($stat);die;  ?>
 <div>
                        <?php echo __('Etat du parc Roulant par Site') ?></div>
                    <div>
                       <?php foreach ($stat as $key => $value): ?>
                           
                       
                   <blockquote>
                       <h5> <?php echo $value['sites'];  ?></h5>
                       <?php echo _('Pourcentage de véhicules indisponibles :')  ?> <?php echo $value['pcent'];  ?>%
                       <small><?php echo _('Total véhicules :');  ?> <?php  echo $value['totalvehicule']; ?></small>
                       </blockquote>       

<?php endforeach ?> 

                    </div>