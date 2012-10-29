<?php

/**
 *
 */
class SitesController  extends AppController {
    public $uses = array('Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'Site');
    public $helpers = array('Html', 'Session');
 
    
    public function admin_listsite() {
        
     //   $listmarque = $this->Vehicule->listemarque();
       // $listmodel = $this->Vehicule->listemodel();
        //debug($listmarque);die;
        //$listpannes = $this -> Panne -> listepannes();
       
        //$vide = array('' => '');
        //array_unshift($sites, $vide);
        //$this -> set('sites', $sites);
        //$this -> set('listmodel', $listmodel);
        //$this -> set('listmarque', $listmarque);
        $condition = array();
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            $condition = $this -> querycond($this -> request['data']['Site']);
            // debug($condition);
        }
 $sites = $this -> Site -> find('all');
		  //  debug($sites);die;
        $this -> Site -> recurcive = 1;

       // $vehicules = $this -> Vehicule -> find('all', array('conditions' => $condition));
        //  debug($vehicules);die;
        $site = array();
        foreach ($sites as $key => $value) {
            $site[$key]['id'] = $value['Site']['id'];
            $site[$key]['nom'] = $value['Site']['nom'];
            $site[$key]['gouvernerat'] = $value['Site']['gouvernerat'];
			$site[$key]['adresse'] = $value['Site']['adresse'];
				$site[$key]['tel'] = $value['Site']['tel'];
			$site[$key]['nbrvehicule'] =count($value['Vehicule']);
			 
			//$site[$key]['nbrvehiculepanne'] =count($value['Vehicule']['active'],array('conditions'=>$conditionpanne));
			 //$nbrvehicule= count($sites[$key]['Vehicule']);
			 //$this -> set('nbrvehicule', $nbrvehicule);
			 //debug($nbrvehicule);die;
           // $site[$key]['date_circulation'] = $value['Site']['date_circulation'];
            //$site[$key]['active'] = $value['Vehicule']['active'];
            //$site[$key]['sitenom'] = $value['Site']['nom'];
                      
            
            
        }
        
        
        $nbrvr= count($site);
        if ($nbrvr != 0 && ($this -> request -> is('put') || $this -> request -> is('post'))) {   $this -> Session -> setFlash("$nbrvr  Site(s) retrouvée(s) ", 'warninginfo');
        } elseif ($nbrvr == 0) { $this -> Session -> setFlash("Pas de résultats pour cette recherche !", 'warning');
        }
       
        

        //return json_encode($vehicules);
        $this -> set(compact('site'));

    }


    public function admin_detailsite($id = null) {
    	 if (isset($id)) {
        $site = $this -> Site -> find('first',array('conditions' => array('Site.id' => $id),
                                                                            'fields'=> array(
                                                                                             'id',
                                                                                             'nom',
                                                                                             'gouvernerat',
                                                                                             'adresse',
                                                                                             'tel',
                                                                                             'fax',
                                                                                             'mail')));
     
      
        $this -> set('site', $site);
		
		 }
        
    }

    public function admin_editsite() {
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            //	 debug($this->request->data);die;

            if ($this -> Site -> save($this->request->data)) {
                $this -> Session -> setFlash('Site enregistré', 'notify');
                $this -> redirect(array('action' => 'listsite'));

            } else { 
                $this->render('admin_detailsite');
                 $this -> Session -> setFlash('Site non enregistré', 'error');
               
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