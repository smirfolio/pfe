<?php
class Vehicule extends AppModel {

	public function listvehicules($site){
		$liste = $this->find('all',
		array('conditions'=>array('sites_id'=>$site),
		'fields'=>array('id','matricule','marque')
		));
		$listvhicule =array();
		foreach ($liste as $key => $value) {
			$listvhicule[$liste[$key]['Vehicule']['id']]= $liste[$key]['Vehicule']['matricule'].' '.$liste[$key]['Vehicule']['marque'];
		}
		
	return $listvhicule;	
	}
	
}