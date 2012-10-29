<?php

/**
 *
 */
class ReparatorsController  extends AppController {
    public $uses = array('Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'Site');
    public $helpers = array('Html', 'Session');
 
    
    public function admin_listreparator() {
  
        $condition = array();
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            $condition = $this -> querycond($this -> request['data']['Reparator']);
       //debug($condition);
        }

        $this -> Reparator -> recurcive = 1;

        $reparator = $this -> Reparator -> find('all', array('conditions' => $condition));
        // debug($reparator);die;
      
        $reparators = array();
        foreach ($reparator as $key => $value) {
            $reparators[$key]['id'] = $value['Reparator']['id'];
            $reparators[$key]['ste'] = $value['Reparator']['ste'];
            $reparators[$key]['nom_contact'] = $value['Reparator']['nom_contact'];
            $reparators[$key]['tel'] = $value['Reparator']['tel'];
            $reparators[$key]['fax'] = $value['Reparator']['fax'];
            $reparators[$key]['mail'] = $value['Reparator']['mail'];
			$reparators[$key]['adresse'] = $value['Reparator']['adresse'];
			$reparators[$key]['rate'] = $value['Reparator']['rate'];
        }
        
        
       $nbrvr= count($reparators);
        if ($nbrvr != 0 && ($this -> request -> is('put') || $this -> request -> is('post'))) {
        	   $this -> Session -> setFlash("$nbrvr  Réparateur(s) retrouvé(s) ", 'warninginfo');
        } 
        elseif ($nbrvr == 0) { $this -> Session -> setFlash("Pas de résultats pour cette recherche !", 'warning');
        } 
       
        

        //return json_encode($reparator);
        $this -> set(compact('reparators'));

    }

public function admin_detailreparator($id = null) {
      //  $sites = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
        //$vide = array('' => '');
        //array_unshift($sites, $vide);
        //$this -> set('sites', $sites);
        if (isset($id)) {
            //debug($id);die;
            //@form:off
            $reparator = $this -> Reparator -> find('first', array('conditions' => array('Reparator.id' => $id), 
                                                                 'fields' => array('id', 
                                                                                    'nom_contact', 
                                                                                    'tel', 
                                                                                    'fax', 
                                                                                    'mail', 
                                                                                    'adresse', 
                                                                                    'rate', 
                                                                                    'ste')));
            //@form:on

            $this -> set('reparator', $reparator);
        }
    }













    
    
    public function admin_editreparator() {
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            //	 debug($this->request->data);die;

            if ($this -> Reparator -> save($this->request->data)) {
                $this -> Session -> setFlash('Reparateur enregistré', 'notify');
                $this -> redirect(array('action' => 'listreparator'));

            } else {// $sites = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
        //$vide = array('' => '');
      //  array_unshift($sites, $vide);
        //$this -> set('sites', $sites);
                $this->render('admin_detailreparator');
                 $this -> Session -> setFlash('Reparateur non enregistré', 'error');
               
            }
        }
    }

    public function querycond($params) {//debug($params);die;
        $conditions = array();
        if (isset($params) && @$params['ste'] != '') {
            $conditions += array('Reparator.ste like ?' => '%'.$params['ste'].'%');
        }

        if (isset($params) && @$params['tel'] != '') {
            $conditions += array('Reparator.tel' => $params['tel']);
        }
        if (isset($params) && @$params['contact'] != '') {
            $conditions += array('Reparator.nom_contact like ? ' => '%'.$params['contact'].'%');
        }

        if (isset($params) && @$params['fax'] != '') {
            $conditions += array('Reparator.fax' => $params['fax']);
        }

        return $conditions;

    }

   
     

  

}
?>