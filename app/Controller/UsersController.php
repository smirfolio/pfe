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
				
				$users = $this->User->find('all');
				//$user['user'] = $users;
				$this->set('user',$users );
			
			}

			
			public function admin_profile(){
				//echo 'hello im here'; die;
				
				
				
			}







   }
   
   

 ?>