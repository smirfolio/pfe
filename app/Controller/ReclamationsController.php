<?php

/**
 *
 */
class ReclamationsController  extends AppController {
    public $uses = array('Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'NotifsReclamation', 'Site', 'User');
    public $helpers = array('Html', 'Session', 'Form', 'Js');
    var $components = array('RequestHandler');

  
    public function listreclam() {
        $optionstatus = $this -> Statu -> find('list', array('fields' => array('id', 'label')));
        $listpannes = $this -> Panne -> listepannes();
        $siteslist = $this -> Site -> find('list', array('fields' => array('id', 'nom')));
     
        $this -> set('siteslist', $siteslist);
        $this -> set('status', $optionstatus);
        $this -> set('pannes', $listpannes);

        $condition = array();
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            $condition = $this -> querycond($this -> request['data']['Reclamation']);
             //debug($condition);die;
        }

        $id = $this -> iduser();
        if ($this -> isadmin()) {
            $condition = $condition;
        } else {
            unset($condition['Reclamation.user_id']);
            $condition += array('Reclamation.user_id' => $id);
        }

        //debug($condition);die;
        $this -> Reclamation -> recursive = 2;
        $reclam = $this -> Reclamation -> find('all', array('conditions' => $condition, 
                                                            array('fields' => array('identifiant', 'created', 'user_id'), 
                                                            'contain' => array('User.nom', 
                                                                               'User' => array('Site' => array('fields' => array('nom'))), 
                                                                               'Vehicule' => array('fields' => array('matricule'))))));
        //Debug($reclam);die;
        $reclamjeson =array();
        foreach ($reclam as $key => $value) {
            $reclamjeson[$key]['identifiant'] = $value['Reclamation']['identifiant'];
            $reclamjeson[$key]['reclamateur'] = $value['User']['nom'];
            $reclamjeson[$key]['panne'] = $value['Panne']['label'];
            $reclamjeson[$key]['status'] = $value['Statu']['label'];
            $reclamjeson[$key]['vehimatricul'] = $value['Vehicule']['matricule'];
            $reclamjeson[$key]['reclamdate'] = $value['Reclamation']['created'];
            $reclamjeson[$key]['reclamid'] = $value['Reclamation']['id'];
            $reclamjeson[$key]['vue'] = isset($value['NotifsReclamation'][0]['vue'])?$value['NotifsReclamation'][0]['vue']:'';
        }
        $nbrreclam = count($reclam);
        if ($nbrreclam != 0 && ($this -> request -> is('put') || $this -> request -> is('post'))) {   $this -> Session -> setFlash("$nbrreclam  Reclamation(s) retrouvée(s) ", 'warninginfo');
        } elseif ($nbrreclam == 0) { $this -> Session -> setFlash("Pas de résultats pour cette recherche !", 'warning');
        }
        
        $site = $this->etatparcsite();
        $sit['sites'] = $site;
        $this -> set($sit);
        $rec['reclam'] = $reclamjeson;
        $this -> set($rec);
        // debug($reclam);die;

    }

    public function detailreclam($id) {
        $reclam = $this -> Reclamation -> find('first', array('conditions' => array('Reclamation.id' => $id)));
        $rec['reclam'] = $reclam;
        $this -> set($rec);
        //debug($reclam);die;
    }

    public function addreclam() {
        $lastid = $this -> Reclamation -> find('first', array('fields' => array('Reclamation.id'), 'order' => 'Reclamation.id DESC'));
        $idder = $lastid['Reclamation']['id'] + 1;
        $idder .= '/' . date('Y');
        if ($this -> request -> is('put') || $this -> request -> is('post')) {
            $this -> request -> data['Reclamation']['identifiant'] = $idder;
            $this -> request -> data['Reclamation']['statu_id'] = 1;
            $this -> request -> data['Reclamation']['user_id'] = $this -> iduser();
            //  debug($this->request->data);die;

            if ($this -> Reclamation -> save($this -> request -> data)) {
                //     $this->NotifReclamation->addnotif();
                $this -> Session -> setFlash('Réclamation enregistré', 'notify');
                $this -> redirect(array('action' => 'listreclam'));
            } else {
                $identifiant = $idder;
                $this -> Session -> setFlash('Erreur Enregistrement', 'error');
            }
        } else {

            $listpannes = $this -> Panne -> listepannes();
            $vehicules = $this -> Vehicule -> listvehicules($this -> usersite());
            // $vide = array('' => '');
            //  array_unshift($vehicules, $vide);
            $this -> set('identifiant', $idder);
            $this -> set('vehicules', $vehicules);
            $this -> set('pannes', $listpannes);
        }
    }

    public function admin_detailreclam($id = null) {
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            //	$this->Reclamation->id =
            // $this->request->data['Reclamation']['id'];
            //debug($this->request->data);die;
            /*	$data= array('id'=>$this->request->data['Reclamation']['id'],
             'statu_id'=>$this->request->data['Reclamation']['statu_id'],
             'reparator_id'=>$this->request->data['Reclamation']['reparator_id'],
             'vehicule_id'=>$this->request->data['Reclamation']['vehicule_id'],
             'panne_id'=>$this->request->data['Reclamation']['panne_id'],
             'panne'=>$this->request->data['Reclamation']['panne'],
             );*/
            //debug($this->request->data);die;
            $this -> request -> data['Reclamation']['update'] = 2;
            $this -> Reclamation -> save($this -> request -> data, $validate = false);
            $this -> Session -> setFlash('Réclamation enregistré', 'notify');
            $this -> redirect(array('action' => 'listreclam', 'admin' => false));

        }

        if (isset($id)) {
            $statu = $this -> Statu -> find('list', array('fields' => array('id', 'label')));
            $this -> set('status', $statu);
            $reparator = $this -> Reparator -> find('all', array('fields' => array('id', 'ste')));

            $rep = array('' => '');
            foreach ($reparator as $key => $value) {//debug($value);die;
                $rep[$value['Reparator']['id']] = $value['Reparator']['ste'];
                //debug($rep);die;
            }
            //	array_unshift($rep,$vide);
            $this -> set('reparators', $rep);
            //debug($rep);die;
            $reclam = $this -> Reclamation -> find('first', array('conditions' => array('Reclamation.id' => $id)));
            $rec['reclam'] = $reclam;
            $this -> set($rec);
            //debug($reclam);die;
        }
    }

    public function admin_suspreclam($id = null) {

        if (isset($id)) {
            $this -> data = array('id' => $id, 'update' => 2, 'statu_id' => 5);
            //debug($this->Reclamation->validationErrors);die;
            //debug($data);die;
            if ($this -> Reclamation -> save($this -> data, $validate = false)) {
                $this -> Session -> setFlash('Réclamation annulée', 'notify');
                $this -> redirect('listreclam');
            } else { $this -> Session -> setFlash('Probleme annulation', 'error');
                $this -> redirect($this -> referer());
            }
        }

    }

    public function suspreclam($id = null) {

        if (isset($id)) {
            $this -> data = array('id' => $id, 'update' => 2, 'statu_id' => 5);
            //debug($this->Reclamation->validationErrors);die;
            //debug($data);die;
            if ($this -> Reclamation -> save($this -> data, $validate = false)) {
                $this -> Session -> setFlash('Réclamation annulée', 'notify');
                $this -> redirect('listreclam');
            } else { $this -> Session -> setFlash('Probleme annulation', 'error');
                $this -> redirect($this -> referer());
            }
        }

    }

    public function dernierreclamadmin() {
        $this -> layout = false;
        $this -> Reclamation -> recursive = 3;
        //@form:off
        $reclam = $this -> Reclamation -> find('all', array(
            'limit' => 7, 
            'fields' => array('identifiant', 
                              'created', 
                              'user_id'), 
            'contain' => array('User.nom', 
                                'User' => array('Site' => array('fields' => array('nom'))), 
                                'Vehicule' => array('fields' => array('matricule'))))
                                );
        //@form:on
        $reclamjson = array();
        foreach ($reclam as $k => $v) {//ebug($v);die;
            $reclamjson[$k]['identifiant'] = $v['Reclamation']['identifiant'];
            $reclamjson[$k]['created'] = $v['Reclamation']['created'];
            $reclamjson[$k]['usernom'] = $v['User']['nom'];
            $reclamjson[$k]['sitenom'] = $v['User']['Site']['nom'];
            $reclamjson[$k]['vehicule'] = $v['Vehicule']['matricule'];

        }
        $this -> autoRender = false;
        return $reclamjson;

    }

    public function querycond($params) {//debug($params);die;
        $conditions = array();
        if (isset($params) && @$params['datedeb'] != '' && empty($params['datefin'])) {
            $lengh=strlen($params['datedeb']);
            $datedeb =substr_replace($params['datedeb'], '23:00:00', 11, $lengh);//debug($params['datedeb']); debug($datedeb);die;
            $conditions += array('Reclamation.created >=' => $datedeb);
        }
         if (isset($params) && @$params['datefin'] != '' && empty($params['datedeb'])) {
              $lengh=strlen($params['datefin']);
            $datefin =substr_replace($params['datefin'], '23:00:00', 11, $lengh);//debug($params['datefin']); debug($datefin);die;
            $conditions += array('Reclamation.created <=' => $datefin);
        }
         
         if (isset($params) && @$params['datefin'] != '' && @$params['datedeb']!='') {
             $lengh=strlen($params['datedeb']);
            $datedeb =substr_replace($params['datedeb'], '23:00:00', 11, $lengh);
            $lengh=strlen($params['datefin']);
            $datefin =substr_replace($params['datefin'], '23:00:00', 11, $lengh);
            $conditions += array('Reclamation.created BETWEEN ? AND ?' => array($datedeb,$datefin));
        }
        if (isset($params) && @$params['status'] != '') {
            $conditions += array('Reclamation.statu_id' => $params['status']);
        }

        if (isset($params) && @$params['panne'] != '') {
            $conditions += array('Reclamation.panne_id' => $params['panne']);
        }
        if (isset($params) && @$params['user'] != '' && isset($params) && @$params['user']!='Recherche utilisateur..') {
            $conditions += array('Reclamation.user_id' => $params['user']);
        }

        if (isset($params) && @$params['site'] != '') {
            $conditions += array('User.site_id' => $params['site']);
        }

        return $conditions;

    }

    public function searchuser($str = null) {

        if ($this -> RequestHandler -> isAjax()) {
            // Configure::write ( 'debug', 0 );
            $this -> autoRender = false;
            $users = $this -> User -> find('all', array('conditions' => array('User.username LIKE' => '%' . $_GET['term'] . '%')));
            $i = 0;
            $response = array();
            foreach ($users as $user) {
                $response[$i]['value'] = $user['User']['username'];
                $response[$i]['label'] = $user['User']['username'];
                $response[$i]['nom'] = $user['User']['id'];
                $i++;
            }
            echo json_encode($response);
        } else {
            if (!empty($this -> data)) {
                // $this -> set('users', $this -> paginate(array('User.nom LIKE'
                // => '%' . $this -> data['User']['username'] . '%')));
            }
        }

        // debug($str);die;

    }

    public function etatparcsite() {

        $etat = $this -> Vehicule -> find('all', array('fields' => array('Vehicule.id', 'Vehicule.site_id', 'COUNT(`Vehicule`.`id`) as nbr'), 'group' => 'site_id', 'conditions' => array('active' => false), 'contain' => array('Site' => array('fields' => array('nom')))));
        /*
         $etat = $this->Site->find('all',array('fields'=>array('id','nom'),

         'contain'=>array('Vehicule'=>array(
         'conditions' =>array('active'=>false),
         'fields'=>array('id','COUNT(`Vehicule`.`id`) as nbrpanne GROUPED BY
        `site_id`'),

         )))); */
        $statpanne = array();
        foreach ($etat as $key => $value) {

            $statpanne[$key]['totalvehicule'] = $this -> Vehicule -> find('count', array('conditions' => array('site_id' => $value['Vehicule']['site_id'])));
            $statpanne[$key]['nbrpanne'] = $value[0]['nbr'];
            $statpanne[$key]['pcent'] = ($value[0]['nbr'] * 100) / $statpanne[$key]['totalvehicule'];
            $statpanne[$key]['sites'] = $value['Site']['nom'];
            $statpanne[$key]['nbrvalide'] = $statpanne[$key]['totalvehicule']- $value[0]['nbr'];
        }
        return $statpanne;
        //debug($statpanne);
        //die ;

    }

}
?>
