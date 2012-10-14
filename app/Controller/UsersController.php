<?php 
   
   
   /**
    * 
    */
   class UsersController  extends AppController {
      
	  
	   
	   		public function login() {
	   			if ($this->request->is('post')){
	   				if($this->Auth->login()){
	   					//debug($this->Session->read());die;
	   					return $this->redirect($this->Auth->redirect());
	   				}
					else {
						 $this->Session->setFlash('Votre login ou votre mot de passe est incorect', 'error');
					}
	   			}
				

	}
			public function logout(){
				$this->Session->destroy();
				$this->Session->setFlash('Vous êtes déconnecté', 'notify');
				$this->redirect('/');
			}
	   
			 public function admin_listuser()
			{
				
				$this->paginate = array(
						'limit' =>10 
				
				);
				$users =   $this->paginate('User');
							
				$this->set(compact('users'));
				
				//$users = $this->User->find('all');
				//$user['user'] = $users;
				 //$this->paginate = array('User'=> array('Limit' => 1));
				// $this->Paginate('User',array('id'=> $user['User']['id']));
				 //$this->set($users['User']['id']);						
			}
			
			
			 function admin_delete(){
			 	
				if ($this->User->delete($v['User']['id'])){
					$this->Session->setFlash('Utilisateur suprimé','notify');
						$this->redirect($this->referer());
				}
				//$this->User->delete($this->request->data('Users.id'));
				
                      else{ $this->Session->setFlash('Probleme supression','error');
                       $this->redirect($this->referer());
                }
				
				
			 }

			
			public function admin_profile(){
				//echo 'hello im here'; die;
				
				
				
			}

            public function admin_desactvate($id=null){
            			//	debug($id);die;	
						if(isset($id))	{	
			 	$data = array(
			 	'id' => $id,
			 	'etat' => 1);
				if ( $this->User->save($data))
				{
					$this->Session->setFlash('Utilisateur désactivé','notify');
						$this->redirect($this->referer());
					}
					else{ $this->Session->setFlash('Probleme Désactivation','error');
                    $this->redirect($this->referer());
                    }
                    }

}
			public function admin_activate($id=null){
            			//	debug($id);die;	
						if(isset($id))	{	
			 	$data = array(
			 	'id' => $id,
			 	'etat' => 0);
				if ( $this->User->save($data))
				{
					$this->Session->setFlash('Utilisateur activé','notify');
						$this->redirect($this->referer());
					}
					else{ $this->Session->setFlash('Probleme activation','error');
                    $this->redirect($this->referer());
                    }
                    }

}
			public function admin_edituser()
			{
				
				
			}
			



   }
   
   

 ?>