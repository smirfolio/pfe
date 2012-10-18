<?php
class Site extends AppModel {


	public $name = 'Site';
		
	public $useTable = 'sites';
	
	 
   public $hasMany  = 'Vehicule' ;
	
	  
}
