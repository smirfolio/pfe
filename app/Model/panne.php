<?php
class Panne extends AppModel {

	public function listepannes(){
		$list = array(
		''=>'',
		1 => 'Panne électrique',
		2 => 'Panne Moteur', 
		3 => 'Panne Chassie',
		4 => 'Autre'
		);
		
		return $list;
		
	}
	
}