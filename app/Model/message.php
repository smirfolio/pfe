<?php   
class Message extends AppModel {
    
    
    
     public $belongsTo  = array(
       
        'Userexp'=>array(
            'className' => 'User',
            'foreignKey' => 'expediteur_id',
        ),
        'Userdet'=>array(
            'className' => 'User',
            'foreignKey' => 'destinataire_id',
        )
    );
    
    
    
}
?>