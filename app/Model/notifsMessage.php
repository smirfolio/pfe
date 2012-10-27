<?php
class NotifsMessage extends AppModel {
    
            var $name = 'NotifsMessage';
            var $useTable = 'notifs_messages';
   /*  public $belongsTo  = 'Message'array(
       
        'Message'=>array(
            'className' => 'Message',
            'foreignKey' => 'message_id',
        )
    );*/
    public function addnotif($data=null){
        
        if(isset($data)){
            $this->save($data);
        }
    }
    
    public function unreadnotif($user_id=null){
            if(isset($user_id)){
               $countnotif = $this->find('count',array('conditions'=>array(
                        'expediteur_id !=' => $user_id,
                        'destinateur_id ' => $user_id,
                        'vue'=>false
                )));
                return $countnotif;
            }
        
        
    }
    
}

?>