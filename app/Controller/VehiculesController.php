<?php 
   
   
   /**
    * 
    */
   class VehiculesController  extends AppController {
      		public $uses = array('Panne','Vehicule','Reclamation','Statu','Reparator','Site');
				
				
				 public function admin_listvehicule()
			{
				//$this->Vehicule->recurcive=1;
				$this->paginate = array(
						'limit' =>10
				
				);
				$vehicules = $this->paginate('Vehicule');
							
				$this->set(compact('vehicules'));
				
			
			}
			
			        function admin_deletevehicule(){
			 	
				if ($this->Vehicule->delete($v['Vehicule']['id'])){
					$this->Session->setFlash('Vehicule suprimé','notify');
						$this->redirect($this->referer());
				}
				//$this->User->delete($this->request->data('Users.id'));
				
                      else{ $this->Session->setFlash('Probleme supression','error');
                       $this->redirect($this->referer());
                }
				
				
			 }

			
			 

             
 
			public function admin_detailvehicule( $id=null)
			{
					if(isset($id))	{	
				//debug($id);die;
			 	       $vehicule = $this->Vehicule->find('first',
			           array('conditions'=>array(
				       'Vehicule.id'=>$id
			   			),
	'fields' => array('matricule','marque','site_id','model','id','energie','puissance','date_circulation','Site.nom','Site.id')
			   ));
			   
			   //debug($id);
			 // debug($vehicule) ;die;
			//  $sites= $this->Site->find('list',
			  //array('conditions'=>array('id'=>$id),'fields'=>array('id' ,'nom')));
			    
			  
			  //$this->set('sites',$sites);
			    // debug($sites); 
			   //debug($sites);die;
			   
		             	//$use['Vehicule'] = $vehicule;
		            // methode 1$veh['vehicule'] = $vehicule;
			         //$this->set($veh);    
			           $sites= $this->Site->find('list',array('fields'=>array('id' ,'nom')));
			   $this->set('sites',$sites);
			        $this->set('vehicule',$vehicule); 
			        }
			}
					
					
					
					public function admin_editvehicule(){
					 if(($this->request->is('put') || $this->request->is('post'))) {
			 
		                	 // debug($this->request->data);die;
						      $d = $this->request->data['Vehicule'];
							  
							  
							  
						      }


					}		
			
		 
			 





















}			
			



    
   
   

 ?>