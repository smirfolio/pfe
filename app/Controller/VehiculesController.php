<?php 
   
   
   /**
    * 
    */
   class VehiculesController  extends AppController {
      
	  
	   
			 
	   
			 public function admin_listvehicule()
			{
				
				$this->paginate = array(
						'limit' =>10 
				
				);
				$vehicules =   $this->paginate('Vehicule');
							
				$this->set(compact('vehicules'));
				
				//$users = $this->User->find('all');
				//$user['user'] = $users;
				 //$this->paginate = array('User'=> array('Limit' => 1));
				// $this->Paginate('User',array('id'=> $user['User']['id']));
				 //$this->set($users['User']['id']);						
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
				       'id'=>$id
			   			),
			   			'fields' => array('username','role','site_id','nom','id','mail','etat')
			   ));
			   
			   $sites= $this->Site->find('list',array('fields'=>array('id' ,'nom')));
			   $this->set('sites',$sites);
			   //debug($sites);die;
		              	$use['user'] = $user;
			//$mavariable = 150;
			            $this->set($use);
			
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