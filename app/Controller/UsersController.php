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
						'limit' =>1 
				
				);
				$users =   $this->paginate('User');
							
				$this->set(compact('users'));
				
				//$users = $this->User->find('all');
				//$user['user'] = $users;
				 //$this->paginate = array('User'=> array('Limit' => 1));
				//$this->Paginate('User',array('id'=> $user['User']['id']));
				 //$this->set($users['User']['id']);						
			}
			
			
			 function admin_delete(){
			 	$this->Session->setFlash('Utilisateur suprimé','notify'/* paramétre du couleur du msg : , array('type'=>'warning')*/);
				$this->User->delete($v['User']['id']);
				//$this->User->delete($this->request->data('Users.id'));
				$this->redirect($this->referer());
				
				
				
			 }

			
			public function admin_profile(){
				//echo 'hello im here'; die;
				
				
				
			}







   }
   
   

 ?>