<?php
class NotifsReclamationsController  extends AppController {
    public $uses = array('NotifsReclamation');
   
   
    public function nbreclam() {
        $numbnotifreclam = $this->NotifsReclamation->unreadnotif($this->iduser());
       // debug($numbnotifreclam);die;
       return $numbnotifreclam;
    }
    
    
}

?>