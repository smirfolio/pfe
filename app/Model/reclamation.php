<?php
class Reclamation extends AppModel {

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
      if(isset($results[0]['NotifsReclamation'][0]['vue'])&& $results[0]['NotifsReclamation'][0]['vue']===false){
               App::import('Model', 'NotifsReclamation');
         $NotifsReclamation = new NotifsReclamation();
        $notif = array(
            'id'=>$results[0]['NotifsReclamation'][0]['id'],
            'vue'=>1
        );
        // debug($results);die;
        $NotifsReclamation->save($notif);
         // debug($results);die;
      }
     
   
        if((isset($results[0]['NotifsMessage'][0]['vue'])&& $results[0]['NotifsMessage'][0]['vue']===false) && $results[0]['NotifsMessage'][0]['expediteur_id'] != $_SESSION['Auth']['User']['id']){
               App::import('Model', 'NotifsMessage');
         $NotifsMessage = new NotifsMessage();
        $notifmsg = array(
            'NotifsMessage.vue'=>1
        );
     //    debug($results);die;
     $NotifsMessage->updateAll($notifmsg,array('NotifsMessage.reclamation_id' =>$results[0]['NotifsMessage'][0]['reclamation_id']));
        //  debug($error);die;
      }
        
        return $results;
    }

    public function afterSave($options = array()) {
        // debug($this->data['Reclamation']['update']);die;
         if(empty($this->data['Reclamation']['update']) || $this->data['Reclamation']['update']!=1) {
         App::import('Model', 'NotifsReclamation');
         $NotifsReclamation = new NotifsReclamation();
        $notif = array(
            'vehicule_id'=>$this->data['Reclamation']['vehicule_id'],
            'user_id'=>$this->data['Reclamation']['user_id'],
            'reclamation_id'=>$this->data['Reclamation']['id'],
            'vue'=>0
        );
        
     $NotifsReclamation->addnotif($notif);
         }
    return true;
}
    
    
	

	
	 
}