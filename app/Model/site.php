<?php
class Site extends AppModel {
     public $actsAs = array('Containable');

	public $name = 'Site';
		
	public $useTable = 'sites';
	
	 
   public $hasMany  = array('Vehicule') ;
	
	  
}
