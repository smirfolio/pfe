<?php
class Panne extends AppModel {



public $name = 'Panne';
		
	public $useTable = 'pannes';
	
	 public $validate = array(
	  /*
	  'identifiant' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez choisir un identifiant'
        ), */
        
        'label' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez saisir le type de panne',
            'required' => true,
            
        ),
         'description' => array(
         //   'rule'       => 'notEmpty',
           // 'message'    => 'Vous devez saisir le type de panne',
            'required' => false,
            
        )
    );
	public function listepannes(){
		$list = array(
		''=>'',
		1 => 'Panne électrique',
		2 => 'Panne Moteur', 
		3 => 'Panne Chassie',
		4 => 'Autre'
		);
        
		$list = $this->find('list', array('fields'=>array('id','label')));
        //  debug($list);die;
		return $list;
		
	}
	
}