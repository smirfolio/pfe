


<?php

/**
 *
 */
class PannesController  extends AppController {
    public $uses = array('Panne', 'Vehicule', 'Reclamation', 'Statu', 'Reparator', 'Site');
    public $helpers = array('Html', 'Session');
 
    
    public function admin_listpanne() {
        
        
      
       
        //  debug($listgov);
        $condition = array();
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
            $condition = $this -> querycond($this -> request['data']['Panne']);
           
        }
 $pannes = $this -> Panne -> find('all',array('conditions'=>$condition));
		  //  debug($sites);die;
     //   $this -> Site -> recurcive = 1;

       // $vehicules = $this -> Vehicule -> find('all', array('conditions' => $condition));
     //// debug($pannes);die;
        //$panne = array();
        //foreach ($pannes as $key => $value) {
          //  $pannes[$key]['id'] = $value['Panne']['id'];
            //$pannes[$key]['label'] = $value['Panne']['label'];
          //  $site[$key]['gouvernerat'] = $value['Panne']['gouvernerat'];
			//$site[$key]['adresse'] = $value['Panne']['adresse'];
				//$site[$key]['tel'] = $value['Panne']['tel'];
			//$site[$key]['nbrvehicule'] =count($value['Vehicule']);
			 
			//$site[$key]['nbrvehiculepanne'] =count($value['Vehicule']['active'],array('conditions'=>$conditionpanne));
			 //$nbrvehicule= count($sites[$key]['Vehicule']);
			 //$this -> set('nbrvehicule', $nbrvehicule);
			 //debug($nbrvehicule);die;
           // $site[$key]['date_circulation'] = $value['Site']['date_circulation'];
            //$site[$key]['active'] = $value['Vehicule']['active'];
            //$site[$key]['sitenom'] = $value['Site']['nom'];
                      
            
            
       // }
        
        
        $nbrvr= count($pannes);
        if ($nbrvr != 0 && ($this -> request -> is('put') || $this -> request -> is('post'))) {   $this -> Session -> setFlash("$nbrvr  Panne(s) retrouvée(s) ", 'warninginfo');
        } elseif ($nbrvr == 0) { $this -> Session -> setFlash("Pas de résultats pour cette recherche !", 'warning');
        }
       
        

        //return json_encode($vehicules);
        $this -> set(compact('pannes'));

    }


    public function admin_detailpanne($id = null) {
          
      
        
    	 if (isset($id)) {
        $panne = $this -> Panne -> find('first',array('conditions' => array('Panne.id' => $id),
                                                                            'fields'=> array(
                                                                                             'id',
                                                                                             'label',
                                                                                             'description',
                                                                                             )));
     
      
        $this -> set('panne', $panne);
		
		 }
        
    }

    public function admin_editpanne() {
        if (($this -> request -> is('put') || $this -> request -> is('post'))) {
         // debug($this->request->data);die;

            if ($this -> Panne -> save($this->request->data)) {
                $this -> Session -> setFlash('Panne enregistré', 'notify');
                $this -> redirect(array('action' => 'listpanne'));

            } else { 
                $this->render('admin_detailpanne');
                 $this -> Session -> setFlash('Panne non enregistré', 'error');
               
            }
        }
    }

   public function admin_deletepanne($id = null){
   	if(isset($id)){
   		
		
		
		//$this->Panne->delete($id);
		//$this-> redirect($this->referer());
   	}
   	
	
	
	
	
	
	
   }
   
     

  

}
?>