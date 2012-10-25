<?php
class NotifsReclamationsController  extends AppController {
    public $uses = array('NotifsReclamation');
   
   
    public function nbreclam() {//debug($numbnotifreclam);debug($this->request);die;
        $this -> layout = false; 
        $numbnotifreclam = $this->NotifsReclamation->unreadnotif($this->iduser());
       // debug($numbnotifreclam);die;
       //$this -> autoRender = false;
       return $numbnotifreclam;
    }
    
    
}

?>