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
           // debug($messages); die;
           return $messages;
          // debug($messages); die;
           
           
       }
       
       function send(){
           $this->layout = false;
           if(($this->request->is('put') || $this->request->is('post')) && (isset($this->request->data['msg']) && $this->request->data['msg']!='' )) {
                 // debug($this->request->data);die;
                
                    if( $this->Message->save($this->request->data)) {    
              
                    }
                    else {
                       
                        }
             //  debug($this->request->data);
           }  
           $this->autoRender = false;   
       }
       
        function listemessagesajax($id=null){
         //   debug($id);die;
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