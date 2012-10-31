<?php

/**
 *
 */
class ReclamationsController  extends AppController {
    public $uses = array('Message','Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'NotifsReclamation', 'Site', 'User');
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
       // Debug($reclam);die;
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
           // $reclamjeson[$key]['msg'] = isset($value['NotifsMessage'][0]['vue'])?$value['NotifsMessage'][0]['vue']:'';
             $reclamjeson[$key]['msg'] =isset($value['NotifsMessage'][0]['expediteur_id'])?$value['NotifsMessage'][0]['expediteur_id']:'';
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
			$site = $this-> Site -> find('first', array('conditions'=>array('Site.id'=>$reclam['Vehicule']['site_id'])));
			$sit['site']= $site;
			 $this -> set('site',$site);
			 
			 
            $this -> set($rec);
			
             //debug($site);die;
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
               $this -> redirect($this -> referer());
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

    public function etatparcsite($option=null) {
        
        $conditions = array('active' => false);
        if($this->isadmin()!=true && $option==1)
                 {      
                      $conditions+=array('Vehicule.site_id'=>$this->usersite()) ;  
                         
                     //debug($conditions);die;
                 }
        
  

        $etat = $this -> Vehicule -> find('all', array('fields' => array('Vehicule.id', 'Vehicule.site_id', 'COUNT(`Vehicule`.`id`) as nbr'), 'group' => 'site_id', 'conditions' => $conditions, 'contain' => array('Site' => array('fields' => array('nom')))));
        /*
         $etat = $this->Site->find('all',array('fields'=>array('id','nom'),

         'contain'=>array('Vehicule'=>array(
         'conditions' =>array('active'=>false),
         'fields'=>array('id','COUNT(`Vehicule`.`id`) as nbrpanne GROUPED BY
        `site_id`'),

         )))); */
          if($this->isadmin()!=true && $option==1)
                 {
                      $statpanne = array();
        foreach ($etat as $key => $value) {

            $totalvehi = $this -> Vehicule -> find('count', array('conditions' => array('site_id' => $value['Vehicule']['site_id'])));
          //  $statpanne[$key]['nbrpanne'] = $value[0]['nbr'];
            $statpanne[$key]['Panne'] = ($value[0]['nbr'] * 100) / $totalvehi;
             $statpanne[$key]['Valide'] = 100 -  $statpanne[$key]['Panne'] ;
        //    $statpanne[$key]['sites'] = $value['Site']['nom'];
        //    $statpanne[$key]['nbrvalide'] = $statpanne[$key]['totalvehicule']- $value[0]['nbr'];
            }
        $stat = array(
        0 =>array('Label' =>'En Panne',
                    'valeur' =>    $statpanne[0]['Panne']),
        1=>array('Label' =>'Valide',
                    'valeur' =>    $statpanne[0]['Valide'])
        
        );
         $statpanne =array();
         $statpanne = $stat;
       // debug($statpanne);die;
         
                 }
          else{
        $statpanne = array();
        foreach ($etat as $key => $value) {

            $statpanne[$key]['totalvehicule'] = $this -> Vehicule -> find('count', array('conditions' => array('site_id' => $value['Vehicule']['site_id'])));
            $statpanne[$key]['nbrpanne'] = $value[0]['nbr'];
            $statpanne[$key]['pcent'] = ($value[0]['nbr'] * 100) / $statpanne[$key]['totalvehicule'];
            $statpanne[$key]['sites'] = $value['Site']['nom'];
            $statpanne[$key]['nbrvalide'] = $statpanne[$key]['totalvehicule']- $value[0]['nbr'];
        }
        }
        return $statpanne;
        //debug($statpanne);
        //die ;

    }
                      
public function admin_viewpdf($id = null) 
    {
   	//debug($id);die;
if (!$id) {
$this->Session->setFlash('Sorry, there was no PDF selected.');
$this->redirect(array('action'=>'listreclam'), null, true);
}
$reclam = $this -> Reclamation -> find('first', array('conditions' => array('Reclamation.id' => $id)));
        $rec['reclam'] = $reclam;
		
		
		$site = $this-> Site -> find('first', array('conditions'=>array('Site.id'=>$reclam['Vehicule']['site_id'])));
			$sit['site']= $site;
			 $this -> set('site',$site);
        $this -> set($rec);
		//debug($id);die;
 // $pdf-> process (Router :: url ('/ admin /', true) ); 
$this->layout = 'pdf'; //this will use the pdf.ctp layout
$this->render();
 
}

 public function userdernierremessage(){
            
              $this -> layout = false;
        $this -> Reclamation -> recursive = 3;
	//	 debug($message);die; 
        //@form:off
        $reclam = $this ->  Reclamation -> find('all', array('conditions'=>array('user_id'=>$this->iduser()),
        
          //  'limit' => 3, 
            
            'fields' => array('id', 
                              'User_id','identifiant'), 
            'contain' => array(
            'User'=>array('fields'=>array('nom')),
            
            'Message'=>array('Userexp'=>array('fields'=>array('nom')),'limit' =>2,'fields'=>array('msg','expediteur_id','created'))
                               )));
          //debug($reclam);die;
        //@form:on
        $messagejson = array();
		$item =0;
        foreach ($reclam as $k => $v) {//debug($v);
        	
			
			foreach ($v['Message'] as $key => $value) {//debug($v);
				//debug($value);die;
			$messagejson[$item]['identifiant'] = $v ['Reclamation']['identifiant'];
            //$messagejson[$item]['expediteur'] = $v['User']['nom'];
        	$messagejson[$item]['expediteur'] = $value['Userexp']['nom'];
            $messagejson[$item]['dateenvoi'] = $value['created'];
            $messagejson[$item]['msg'] = $value['msg'];
            $item++;
			}
		
        }//debug($messagejson);die;
        $this -> autoRender = false;
        return $messagejson;
            
            
           //   debug($message);die; 
        }

}
?>
