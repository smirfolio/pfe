<?php
class Reclamation extends AppModel {

	
	 public $belongsTo  = array(
        'Statu',
        'Panne',
        'Vehicule', 
        'Reparator'=>array(
			'className' => 'Reparator',
			'foreignKey' => 'reparator_id',
		)
    );
	
	
	
	 
}