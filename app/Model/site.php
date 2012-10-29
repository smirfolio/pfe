<?php
class Site extends AppModel {
     public $actsAs = array('Containable');

	public $name = 'Site';
		
	public $useTable = 'sites';
	
	 
   public $hasMany  = array('Vehicule') ;
	
	  
      
      public function listgov(){
          
          $gov = array(
          'Tunis' => 'Tunis',
          'Ben Arous' => 'Ben Arous',
          'Ariana' => 'Ariana',
          'Mannouba' => 'Mannouba',
          'Nabeul' => 'Nabeul',
          'Sousse' => 'Sousse',
          'Safax' => 'Safax',
          'Tataouine' => 'Tataouine',
          'Bizerte' => 'Bizerte',
          'Jandouba' => 'Jandouba',
          'Zagouan' => 'Zagouan',
          'Sidi Bouzide' => 'Sidi Bouzide',
          'El Gasrine' => 'El Gasrine',
          'El Kairaouen' => 'El Kairaouen',
          'Gbelli' => 'Gbelli',
          
          );
          
          return $gov;
      }
      
}
