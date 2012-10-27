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
        public function dernierremessage(){
            
              $this -> layout = false;
        $this -> Message -> recursive = 2;
        //@form:off
        $message = $this -> Message -> find('all', array(
            //'limit' => 3, 
            'conditions'=>array('expediteur_id !=' =>$this->iduser()),
            'fields' => array('msg', 
                              'created', 
                              'expediteur_id'), 
            'contain' => array('Userexp.nom','Userexp' => array(
                                                'Site' => array('fields' => array('nom')))
                               )));
             //debug($message);die;
        //@form:on
        $messagejson = array();
        foreach ($message as $k => $v) {//ebug($v);die;
            $messagejson[$k]['expediteur'] = $v['Userexp']['nom'];
            $messagejson[$k]['dateenvoi'] = $v['Message']['created'];
            $messagejson[$k]['msg'] = $v['Message']['msg'];
            $messagejson[$k]['sitenom'] = $v['Userexp']['Site']['nom'];
        

        }//debug($messagejson);die;
        $this -> autoRender = false;
        return $messagejson;
            
            
            
        }
       
       
           
   }
   
   
   ?>