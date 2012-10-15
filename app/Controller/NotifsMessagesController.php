<?php
class NotifsMessagesController  extends AppController {
    public $uses = array('NotifsMessage','Reclamation');
   
   
    public function nbremsg() {
        
        $numbnotifmessag = $this->NotifsMessage->unreadnotif($this->iduser());
       // debug($numbnotifreclam);die;
       return $numbnotifmessag;
    }
    
    
}

?>