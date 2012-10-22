<?php

/**
 *
 */
class VehiculesController  extends AppController {
    public $uses = array('Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'Site');
    public $helpers = array('Html', 'Session');
 
    
    public function admin_listvehicule() {
        
        $listmarque = $this->Vehicule->listemarque();
        $listmodel = $this->Vehicule->listemodel();
        //debug($listmarque);die;
        $listpannes = $this -> Panne -> listepannes();
        $sites = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
        $vide = array('' => '');
        array_unshift($sites, $vide);
        $this -> set('sites', $sites);
        $this -> set('listmodel', $listmodel);
        $this -> set('listmarque', $listmarque);
        $condition = array();
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            $condition = $this -> querycond($this -> request['data']['Vehicule']);
            // debug($condition);
        }

        $this -> Vehicule -> recurcive = 1;

        $vehicules = $this -> Vehicule -> find('all', array('conditions' => $condition));
        //  debug($vehicules);die;
        $voiture = array();
        foreach ($vehicules as $key => $value) {
            $voiture[$key]['id'] = $value['Vehicule']['id'];
            $voiture[$key]['matricule'] = $value['Vehicule']['matricule'];
            $voiture[$key]['marque'] = $value['Vehicule']['marque'];
            $voiture[$key]['date_circulation'] = $value['Vehicule']['date_circulation'];
            $voiture[$key]['active'] = $value['Vehicule']['active'];
            $voiture[$key]['sitenom'] = $value['Site']['nom'];
        }
        
        
        $nbrvr= count($voiture);
        if ($nbrvr != 0 && ($this -> request -> is('put') || $this -> request -> is('post'))) {   $this -> Session -> setFlash("$nbrvr  Véhicule(s) retrouvée(s) ", 'warninginfo');
        } elseif ($nbrvr == 0) { $this -> Session -> setFlash("Pas de résultats pour cette recherche !", 'warning');
        }
       
        

        //return json_encode($vehicules);
        $this -> set(compact('voiture'));

    }

    function admin_activevehicule($id = null) {
        //  debug($id);die;
        if (isset($id)) {
            $data = array('id' => $id, 'active' => 0);

            if ($this -> Vehicule -> save($data)) {
                $this -> Session -> setFlash('Vehicule Désactivé', 'notify');
                $this -> redirect($this -> referer());
            } else {

                $this -> Session -> setFlash('Probléme !!!', 'error');
                $this -> redirect($this -> referer());

            }

        }

        if ($this -> Vehicule -> delete($id)) {
            $this -> Session -> setFlash('Vehicule suprimé', 'notify');
            $this -> redirect($this -> referer());
        }
        //$this->User->delete($this->request->data('Users.id'));

        else { $this -> Session -> setFlash('Probleme supression', 'error');
            $this -> redirect($this -> referer());
        }

    }

    public function admin_detailvehicule($id = null) {
        $sites = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
        $vide = array('' => '');
        array_unshift($sites, $vide);
        $this -> set('sites', $sites);
        if (isset($id)) {
            //debug($id);die;
            //@form:off
            $vehicule = $this -> Vehicule -> find('first', array('conditions' => array('Vehicule.id' => $id), 
                                                                 'fields' => array('matricule', 
                                                                                    'marque', 
                                                                                    'site_id', 
                                                                                    'model', 
                                                                                    'id', 
                                                                                    'energie', 
                                                                                    'puissance', 
                                                                                    'date_circulation', 
                                                                                    'Site.nom', 
                                                                                    'Site.id')));
            //@form:on

            $this -> set('vehicule', $vehicule);
        }
    }

    public function admin_editvehicule() {
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            //	 debug($this->request->data);die;

            if ($this -> Vehicule -> save($this->request->data)) {
                $this -> Session -> setFlash('Véhicule enregistré', 'notify');
                $this -> redirect(array('action' => 'listvehicule'));

            } else { $sites = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
        $vide = array('' => '');
        array_unshift($sites, $vide);
        $this -> set('sites', $sites);
                $this->render('admin_detailvehicule');
                 $this -> Session -> setFlash('Véhicule non enregistré', 'error');
               
            }
        }
    }

    public function querycond($params) {//debug($params);die;
        $conditions = array();
        if (isset($params) && @$params['active'] != '') {
            $conditions += array('Vehicule.active' => $params['active']);
        }

        if (isset($params) && @$params['marque'] != '') {
            $conditions += array('Vehicule.marque' => $params['marque']);
        }
        if (isset($params) && @$params['model'] != '') {
            $conditions += array('Vehicule.model' => $params['model']);
        }

        if (isset($params) && @$params['site'] != '') {
            $conditions += array('Vehicule.site_id' => $params['site']);
        }

        return $conditions;

    }

   
     

  

}
?>