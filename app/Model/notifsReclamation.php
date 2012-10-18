<?php
class NotifsReclamation extends AppModel {
    
            var $name = 'NotifsReclamation';
            var $useTable = 'notifs_reclamations';

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