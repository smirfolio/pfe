<?php
class Vehicule extends AppModel {
  public  $name='Vehicule';
 public $belongsTo  = 'Site' ;

	public function listvehicules($site){
	    if($_SESSION['Auth']['User']['role'] =='admin'){
	           $liste = $this->find('all',
        array('conditions'=>array('active' =>1),
        'fields'=>array('id','matricule','marque')
        ));
       
	    }
        else{
                $liste = $this->find('all',
        array('conditions'=>array('sites_id'=>$site,'active' =>1),
        'fields'=>array('id','matricule','marque')
        ));
      
        }
	  $listvhicule =array();
        foreach ($liste as $key => $value) {
            $listvhicule[$liste[$key]['Vehicule']['id']]= $liste[$key]['Vehicule']['matricule'].' '.$liste[$key]['Vehicule']['marque'];
        }
		
	return $listvhicule;	
	}
	
	
	
	
	
}