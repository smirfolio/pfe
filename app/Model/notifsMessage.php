<?php
class NotifsMessage extends AppModel {
    
            var $name = 'NotifsMessage';
            var $useTable = 'notifs_messages';

    public function addnotif($data=null){
        
        if(isset($data)){
            $this->save($data);
        }
    }
    
    public function unreadnotif($user_id=null){
            if(isset($user_id)){
               $countnotif = $this->find('count',array('conditions'=>array(
                        'vue'=>false
                )));
                return $countnotif;
            }
        
        
    }
    
}

?>