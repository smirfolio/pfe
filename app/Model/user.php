<?php
class User extends AppModel {

	function beforeSave($option = array()){
		
		if(!empty($this->data['User']['password'])){
			
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
			
		}
		
		
		
	}
	
}