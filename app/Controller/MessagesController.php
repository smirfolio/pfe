<?php 
   
   /**
    * 
    */
    
   class MessagesController  extends AppController {
       
        public $uses = array('Message');
        public $helpers = array('Html', 'Session','Form','Js');
       //public $helpers = array('Js' => array('Jquery'));
       function listemessages($id=null){
          
           if(isset($id)){
               $messages = $this->Message->find('all', array('conditions' => array(
                    'reclamation_id' =>$id
               
               )));
               
               
           }
         
           return $messages;
          // debug($messages); die;
           
           
       }
       
        function listemessagesajax($id=null){
           // debug($id);die;
           $this->layout = false;
           if(isset($id)){
               $messages = $this->Message->find('all', array('conditions' => array(
                    'reclamation_id' =>$id
               
               )));
               
               
           }
           $this->set('m',$messages);
         //  $this->autoRender = false;   
          // return $messages;
          // debug($messages); die;
           
           
       }
       
       
         
   }
   
   
   ?>