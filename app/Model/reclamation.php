<?php
class Reclamation extends AppModel {
         public $actsAs = array('Containable');
	  public $validate = array(
	  /*
	  'identifiant' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez choisir un identifiant'
        ), */
        'vehicule_id' => array(
                'rule'     => 'numeric',
                'required' => true,
                'message'  => 'Vous devez choisir le vehicule en pannes'
        ),
        'panne' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez détailler la pannes',
            'required' => true,
        ),
        'panne_id' => array(
            'rule'       => 'numeric',
            'message'    => 'Vous devez choisir une pannes',
            'required' => true,
        )
    );
	
	 public $belongsTo  = array(
	    'User',
        'Statu',
        'Panne',
        'Vehicule', 
        'Reparator'=>array(
			'className' => 'Reparator',
			'foreignKey' => 'reparator_id',
		)
    );
    
    public $hasMany  = array('NotifsReclamation'=>array(
            'conditions'=>array('NotifsReclamation.vue' =>0),
            'fields' =>array('reclamation_id','vue','id'),
            'limit' =>'1'
            ),
            'NotifsMessage'=>array(
            'conditions'=>array('NotifsMessage.vue' =>0),
            'foreignKey'    => 'reclamation_id',
            'fields' =>array('reclamation_id','vue','id','expediteur_id'),
            'limit' =>'1'
            )
            );
            
 
    
    
 
    public function afterFind($results, $primary = false){
      if((isset($results[0]['Reclamation']['upnotif']) && $results[0]['Reclamation']['upnotif']==1) &&  isset($results[0]['NotifsReclamation'][0]['vue'])&& $results[0]['NotifsReclamation'][0]['vue']===false){
               App::import('Model', 'NotifsReclamation');
         $NotifsReclamation = new NotifsReclamation();
        $notif = array(
            
            'vue'=>1
        );
        
        if( $_SESSION['Auth']['User']['role'] =='admin'){
            
              $condi = array(
        'id'=>$results[0]['NotifsReclamation'][0]['id']
        );
        }
        else{  $condi = array(
        
        'id'=>$results[0]['NotifsReclamation'][0]['id'],
        'user_id != '=> $_SESSION['Auth']['User']['id']
        
        );
}
      
        // debug($results);die;
        $NotifsReclamation->updateAll($notif,$condi);
         // debug($results);die;
      }
   //  debug($results);die;
   
        if(((isset($results[0]['Reclamation']['upnotif']) && $results[0]['Reclamation']['upnotif']==1) && (isset($results[0]['NotifsMessage'][0]['vue']) &&$results[0]['NotifsMessage'][0]['vue']===false)) && $results[0]['NotifsMessage'][0]['expediteur_id'] != $_SESSION['Auth']['User']['id']){
               App::import('Model', 'NotifsMessage');
         $NotifsMessage = new NotifsMessage();
        $notifmsg = array(
            'NotifsMessage.vue'=>1
        );
     //    debug($results);die;
     $NotifsMessage->updateAll($notifmsg,array('NotifsMessage.reclamation_id' => $results[0]['NotifsMessage'][0]['reclamation_id']));
        //  debug($error);die;
      }
        
        return $results;
    }

    public function afterSave($options = array()) {
  
       //debug(data['Reclamation']['vehicule_id']);die;
        $update = isset($this->data['Reclamation']['update'])?$this->data['Reclamation']['update']:null;
        
         if(empty($update) || $update=null) {//debug($this->data['Reclamation']);die;
              
         App::import('Model', 'NotifsReclamation');
         $NotifsReclamation = new NotifsReclamation();
        $notif = array(
            'vehicule_id'=>$this->data['Reclamation']['vehicule_id'],
            'user_id'=>$this->data['Reclamation']['user_id'],
            'reclamation_id'=>$this->data['Reclamation']['id'],
            'vue'=>0
        );
        
     
     $update=2;
     // Activation desactivation vheicule si reclamation crée et statur !=annulé ou réparé
         }
         
         
     if (isset($update) && $update==2){
        //   debug($this->data);die;
         $idvehhicule = $this->find('first', array('conditions'=>array('Reclamation.id'=>$this->data['Reclamation']['id']), 'fields'=>array('Reclamation.vehicule_id')));
       $idvehhicule= current($idvehhicule);
         $status = $this->data['Reclamation']['statu_id'];
           App::import('Model', 'Vehicule');
         $Vehicule = new Vehicule();
         if($status==5 || $status == 4){
            
            
        $active = array(
            'id'=>$idvehhicule['vehicule_id'],
            'active'=>1
        );
               $Vehicule->save($active);
         }
         else{  //debug($this->data['Reclamation']);die;
              $active = array(
            'id'=>$idvehhicule['vehicule_id'],
            'active'=>0
        );
               $Vehicule->save($active);
             
         }
         
         
     }
    return true;
}
    
    
	

	
	 
}