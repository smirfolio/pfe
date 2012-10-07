<?php
class Reclamation extends AppModel {

	  public $validate = array(
	  /*
	  'identifiant' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez choisir un identifiant'
        ), */
        'vehicule_id' => array(
                'rule'     => 'numeric',
                'required' => true,
                'message'  => 'Vous devez choisir le vehicule en pannes'
        ),
        'panne' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez détailler la pannes',
            'required' => true,
        ),
        'panne_id' => array(
            'rule'       => 'numeric',
            'message'    => 'Vous devez choisir une pannes',
            'required' => true,
        )
    );
	
	
	
	
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