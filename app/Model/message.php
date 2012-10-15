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
    
    
     public $hasMany  = array('NotifsMessage'=>array(
            'conditions'=>array('NotifsMessage.vue' =>0),
            'fields' =>array('reclamation_id','vue','id'),
            'limit' =>'1'
            ));
    
    
      public function afterSave($options = array()) {
       //  debug($this->data);die;
         if(empty($this->data['Message']['update']) || $this->data['Message']['update']!=1) {
         App::import('Model', 'NotifsMessage');
         $NotifsMessage = new NotifsMessage();
        $notif = array(
            'expediteur_id'=>$this->data['Message']['expediteur_id'],
            'destinateur_id'=>$this->data['Message']['destinateur_id'],
            'message_id'=>$this->data['Message']['id'],
            'reclamation_id'=>$this->data['Message']['reclamation_id'],
            'vue'=>0
        );
        
     $NotifsMessage->addnotif($notif);
         }
    return true;
}
    
}
?>