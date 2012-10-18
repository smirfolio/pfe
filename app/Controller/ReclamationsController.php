<?php 
   
   
   /**
    * 
    */
   class ReclamationsController  extends AppController {
      	public $uses = array('Panne','Vehicule','Reclamation','Statu','Reparator','NotifsReclamation');
			public $helpers = array('Html', 'Session','Form');
            
		public function listreclam(){
			$id = $this->iduser();
			 if ($this->isadmin()) {
			 	$condition = array();
			     } 
			         else {
				     $condition = array('user_id'=>$id);
			      }
			 
			$reclam = $this->Reclamation->find('all',
			array('conditions'=>$condition,
			'fields' =>array(
				'id','identifiant','created','Statu.label','Vehicule.matricule','Panne.label','Reparator.ste'))
			);
            
			$rec['reclam'] = $reclam;
			$this->set($rec);
			//debug($reclam);die;
			
		}
        
		public function detailreclam($id){
			$reclam = $this->Reclamation->find('first',
			array('conditions'=>array(
				'Reclamation.id'=>$id))
			);
			$rec['reclam'] = $reclam;
			$this->set($rec);
			//debug($reclam);die;
		}
		
		public function addreclam(){
		    $lastid =  $this->Reclamation->find('first',array('fields'=>array('Reclamation.id'),'order'=>'Reclamation.id DESC'));
                    $idder = $lastid['Reclamation']['id']+1;
                    $idder.='/'.date('Y');
		      if($this->request->is('put') || $this->request->is('post')) {
            $this->request->data['Reclamation']['identifiant'] =$idder;
            $this->request->data['Reclamation']['statu_id'] =1;
            $this->request->data['Reclamation']['user_id'] = $this->iduser();
        //  debug($this->request->data);die;
       
                    if( $this->Reclamation->save($this->request->data)) {
                          //     $this->NotifReclamation->addnotif();
                         $this->Session->setFlash('Réclamation enregistré', 'notify');
                $this->redirect(array('action' => 'listreclam'));
                    }
                    else {
                        $this->Session->setFlash('Erreur Enregistrement', 'error');
                        }
            }
              
        else {
        			
        			$listpannes = $this->Panne->listepannes();
        			$vehicules = $this->Vehicule->listvehicules($this->usersite());
        			$vide =array(
        			''=>''
        			);
        			array_unshift($vehicules,$vide);
        			$this->set('identifiant',$idder);
        			$this->set('vehicules',$vehicules);
        			$this->set('pannes',$listpannes);
            }		
}
		
		public function admin_detailreclam($id=null){
					if(($this->request->is('put') || $this->request->is('post'))) {
			//	$this->Reclamation->id = $this->request->data['Reclamation']['id'];
				//debug($this->request->data);die;
			/*	$data= array('id'=>$this->request->data['Reclamation']['id'],
				'statu_id'=>$this->request->data['Reclamation']['statu_id'],
				'reparator_id'=>$this->request->data['Reclamation']['reparator_id'],
				'vehicule_id'=>$this->request->data['Reclamation']['vehicule_id'],
				'panne_id'=>$this->request->data['Reclamation']['panne_id'],
				'panne'=>$this->request->data['Reclamation']['panne'],
				);*/
			//debug($this->request->data);die;
			$this->request->data['Reclamation']['update'] = 2;
					$this->Reclamation->save($this->request->data,$validate=false) ;
		 				 $this->Session->setFlash('Réclamation enregistré', 'notify');
						 $this->redirect(array('action' => 'listreclam','admin'=>false));
		 			
					
			}

					
			if(isset($id)){
					$statu = $this->Statu->find('list',array('fields'=>array('id','label')));
					$this->set('status',$statu);
					$reparator = $this->Reparator->find('all',array('fields'=>array('id','ste')));
				
						$rep = array(
						''=>''
						);
					foreach ($reparator as $key => $value) {//debug($value);die;
						$rep[$value['Reparator']['id']] = $value['Reparator']['ste'];
						//debug($rep);die;
					}
				//	array_unshift($rep,$vide);
					$this->set('reparators',$rep);
					//debug($rep);die;
					$reclam = $this->Reclamation->find('first',
						array('conditions'=>array(
							'Reclamation.id'=>$id
								))
							);
			$rec['reclam'] = $reclam;
			$this->set($rec);
			//debug($reclam);die;
			}
		}
		
		
		  public function admin_suspreclam($id=null)
		{
			
			if(isset($id))	{	
			 	$data = array(
			 	'id' => $id,
			 	'statu_id' => 5);
			//	$this->Reclamation->save($data, $validate=false);
				//debug($this->Reclamation->validationErrors);die;
				//debug($data);die;
				if ( $this->Reclamation->save($data, $validate=false))
				{
					$this->Session->setFlash('Réclamation annulée','notify');
						$this->redirect($this->referer());
					}
					else{ $this->Session->setFlash('Probleme annulation','error');
                    $this->redirect($this->referer());
                    }
                    }
			
			
		}
		 public function suspreclam($id=null)
		{
			
			if(isset($id))	{	
			 	$data = array(
			 	'id' => $id,
			 	'update' =>2,
			 	'statu_id' => 5);
			//	$this->Reclamation->save($data, $validate=false);
				//debug($this->Reclamation->validationErrors);die;
				//debug($data);die;
				if ( $this->Reclamation->save($data, $validate=false))
				{
					$this->Session->setFlash('Réclamation annulée','notify');
						$this->redirect('listreclam');
					}
					else{ $this->Session->setFlash('Probleme annulation','error');
                    $this->redirect($this->referer());
                    }
                    }
			
			
		}
        public function dernierreclamadmin(){
             $this->layout = false;
           $this->Reclamation->recursive = 3;
         //  $this->Reclamation->contain();
            $reclam = $this->Reclamation->find('all',array('limit'=>10,
                                                           'fields'=>array('identifiant','created','user_id'),
                                                           'contain'=> array('User.nom',
                                                                             'User'=>array('Site'=>array('fields'=>array('nom'))),
                                                                             'Vehicule'=>array('fields'=>array('matricule'))
                                                                                                                                  )
                                                           )
                                              );
                                              $reclamjson = array(); 
                                              foreach ($reclam as $k => $v) {//ebug($v);die;
                                                 $reclamjson[$k]['identifiant'] = $v['Reclamation']['identifiant'];
                                                 $reclamjson[$k]['created'] = $v['Reclamation']['created'];
                                                  $reclamjson[$k]['usernom'] = $v['User']['nom'];
                                                  $reclamjson[$k]['sitenom'] = $v['User']['Site']['nom'];
                                                  $reclamjson[$k]['vehicule'] = $v['Vehicule']['matricule'];
                                                  
                                              }
                                               $this->autoRender = false;   
                                              return $reclamjson;
           
        }
		
		
		
   }
   
   
   ?>
      