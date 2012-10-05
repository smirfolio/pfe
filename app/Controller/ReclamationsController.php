<?php 
   
   
   /**
    * 
    */
   class ReclamationsController  extends AppController {
      	public $uses = array('Panne','Vehicule','Reclamation');
			public $helpers = array('Html', 'Session','Form');
		public function listreclam(){
			$id = $this->iduser();
			 if ($this->isadmin()) {
			 	$condition = array();
				 
			 } else {
				 $condition = array('user_id'=>$id);
			 }
			 
			$reclam = $this->Reclamation->find('all',
			array('conditions'=>$condition,
			'fields' =>array(
				'id','identifiant','created','Statu.label','Vehicule.matricule','Panne.label','Reparator.ste'
			)
			
			)
			);
			$rec['reclam'] = $reclam;
			$this->set($rec);
			//debug($reclam);die;
			
		}
		public function detailreclam($id){
			
			$reclam = $this->Reclamation->find('first',
			array('conditions'=>array(
				'Reclamation.id'=>$id
			)
			)
			);
			$rec['reclam'] = $reclam;
			$this->set($rec);
			//debug($reclam);die;
		}
		
		public function addreclam(){
			$lastid =  $this->Reclamation->find('first',array('fields'=>array('Reclamation.id'),'order'=>'Reclamation.id DESC'));
			$idder = $lastid['Reclamation']['id']+1;
			
			$idder.='/'.date('Y');
			$listpannes = $this->Panne->listepannes();
			$vehicules = $this->Vehicule->listvehicules($this->usersite());
			$vide =array(
			''=>''
			);
			array_unshift($vehicules,$vide);
			$this->set('identifiant',$idder);
			$this->set('vehicules',$vehicules);
			$this->set('pannes',$listpannes);
		if($this->request->is('put') || $this->request->is('post')) {
			$this->request->data['Reclamation']['identifiant'] =$idder;
			$this->request->data['Reclamation']['statu_id'] =1;
			$this->request->data['Reclamation']['user_id'] = $this->iduser();
		//	debug($this->request->data);die;
					if( $this->Reclamation->save($this->request->data)) {	 
		 				 $this->Session->setFlash('Réclamation enregistré', 'notify');
				$this->redirect(array('action' => 'listreclam'));
		 			}
					else {
						$this->Session->setFlash('Erreur Enregistrement', 'error');
						}
			}
		}
		
		public function admin_editreclam(){}
		
		
   }
   
   
   ?>
      