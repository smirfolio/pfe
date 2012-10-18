<?php
class User extends AppModel {
        public $name = 'User';
       //  public $actsAs = array('Containable');
            public $belongsTo = array('Site'=>array(
                        'className' => 'Site',
                        'foreignKey' => 'site_id'
                        ));
    
 
        
	function beforeSave($option = array()){
		
		if(!empty($this->data['User']['password'])){
			
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
			
		}
		
		
		
	}
	
}