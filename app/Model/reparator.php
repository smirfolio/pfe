<?php
class Reparator extends AppModel {


    var $name = 'Reparator';
		
	var $useTable = 'reparators';
	
	 public $validate = array(
      /*
      'identifiant' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez choisir un identifiant'
        ), */
        'ste' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez Saisir le nom de la société'
        ),
        'tel' => array(
            'rule'       => 'numeric',
            'message'    => 'Vous saisir le téléphone',
            'required' => true,
        ),
        
        'adresse' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez saisir l\'adresse',
            'required' => true,
        )
        ,
        'mail' => array(
            'rule'       => 'email',
            'message'    => 'Vous devez saisir un mail valide',
            'required' => false,
        )
    );
}