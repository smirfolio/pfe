<?php
class Vehicule extends AppModel {
    public $name = 'Vehicule';
    
     public $actsAs = array('Containable');
    
    public $belongsTo = 'Site';
    
     public $validate = array(
      /*
      'identifiant' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez choisir un identifiant'
        ), */
        'matricule' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Vous devez Saisir le matricule'
        ),
        'site_id' => array(
            'rule'       => 'numeric',
            'message'    => 'Vous devez Choisir le site',
            'required' => true,
        ),
        'marque' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez choisir la marque du véhicule',
            'required' => true,
        ),
        'model' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez choisir le model du véhicule',
            'required' => true,
        )
        ,
        'date_circulation' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez choisir la date de mise en circulation du véhicule',
            'required' => true,
        )
    );
    
    

    public function listvehicules($site) {
        if ($_SESSION['Auth']['User']['role'] == 'admin') {
            $liste = $this -> find('all', array('conditions' => array('active' => 1), 'fields' => array('id', 'matricule', 'marque')));

        } else {
            $liste = $this -> find('all', array('conditions' => array('site_id' => $site, 'active' => 1), 'fields' => array('id', 'matricule', 'marque')));

        }
        $listvhicule = array();
        foreach ($liste as $key => $value) {
            $listvhicule[$liste[$key]['Vehicule']['id']] = $liste[$key]['Vehicule']['matricule'] . ' ' . $liste[$key]['Vehicule']['marque'];
        }
        //	debug($listvhicule);
        return $listvhicule;
    }
    
    public function listemarque(){
         $optionmarque = $this -> find('all', array('fields' =>'DISTINCT marque'));
            $optv=array();
            foreach ($optionmarque as $key => $value) {
                $optv[$value['Vehicule']['marque']] = $value['Vehicule']['marque']; 
                }
        return $optv;
    }

     public function listemodel(){
         $optionmarque = $this -> find('all', array('fields' =>'DISTINCT model'));
            $optv=array();
            foreach ($optionmarque as $key => $value) {
                $optv[$value['Vehicule']['model']] = $value['Vehicule']['model']; 
                }
        return $optv;
    }

}
