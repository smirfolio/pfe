<?php 
   
   
   /**
    * 
    */
   class ReclamationsController  extends AppController {
      	
	
		public function listreclam(){
			$id = $this->iduser();
			
			$reclam = $this->Reclamation->find('all',
			array('conditions'=>array(
				'user_id'=>$id
			),
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
		
		
   }
   
   
   ?>
      