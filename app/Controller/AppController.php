<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Session', 'Auth');
	 public $helpers =array('Session');
	function beforeFilter(){
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' =>'login', 'admin' =>false);
		$this->Auth->authorize =array('Controller');
		if(isset($this->request->params['action']) && $this->request->params['action']=='login') {$this->layout='login';}
		
		if(isset($this->request->params['prefix']) && $this->request->params['prefix']=='admin') {$this->layout='admin';}
		//debug($this->request);die;
	}
	
	function isAuthorized($user){
		if(!isset($this->request->params['prefix'])){
					return true;
		}
		 
			$roles =array(
			 'admin'=> 10,
			 'user' => 5
			);
		
		if(isset($roles[$this->request->params['prefix']])){
			$lvlAction =  $roles[$this->request->params['prefix']];
			$lvlUser 	= $roles[$user['role']];
			if($lvlUser >=$lvlAction){
				return true;
			}
				else{
					$this->Session->setFlash('Vous n\'êtes pas autorisé à acceder à cet page ', 'error');
					 return false;}			
		}
		return false;
	}
	
	 function isadmin(){
	 	//debug($this->Session->read('Auth.User.role'));die;
	 	if ($this->Session->read('Auth.User.role')=='admin')
		{return true;}
		else{return false;}
		
	}
	 
	  function iduser(){
		return $this->Session->read('Auth.User.id');
		
	 }
	  
	  function usersite(){
		return $this->Session->read('Auth.User.site_id');
		
	 }
	 
	
}
