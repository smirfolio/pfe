<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	
	 function isadmin(){
	 	if (CakeSession::read('Auth.User.role')=='admin')
		{return true;}
		else{return false;}
		
	}
	 function iduser(){
	 	
		return CakeSession::read('Auth.User.id');
		
	 }
	 function nameuser(){
	 	
		return CakeSession::read('Auth.User.nom');
		 }
	 
	  function myrole(){
	 	
		return CakeSession::read('Auth.User.role');
		 }
      
      public function mylink($title, $url = null, $options = array(), $confirmMessage = false,$iclass=null) {
        $escapeTitle = true;
        if ($url !== null) {
            $url = $this->url($url);
        } else {
            $url = $this->url($title);
            $title = htmlspecialchars_decode($url, ENT_QUOTES);
            $title = h(urldecode($title));
            $escapeTitle = false;
        }

        if (isset($options['escape'])) {
            $escapeTitle = $options['escape'];
        }

        if ($escapeTitle === true) {
            $title = h($title);
        } elseif (is_string($escapeTitle)) {
            $title = htmlentities($title, ENT_QUOTES, $escapeTitle);
        }

        if (!empty($options['confirm'])) {
            $confirmMessage = $options['confirm'];
            unset($options['confirm']);
        }
        if ($confirmMessage) {
            $confirmMessage = str_replace("'", "\'", $confirmMessage);
            $confirmMessage = str_replace('"', '\"', $confirmMessage);
            $options['onclick'] = "return confirm('{$confirmMessage}');";
        } elseif (isset($options['default']) && $options['default'] == false) {
            if (isset($options['onclick'])) {
                $options['onclick'] .= ' event.returnValue = false; return false;';
            } else {
                $options['onclick'] = 'event.returnValue = false; return false;';
            }
            unset($options['default']);
        }
        $mytag='<a href="%s"%s><i class="%s"></i>%s</a>';
        return sprintf($mytag, $url, $this->_parseAttributes($options),$iclass, $title);
    }
      
	  
}
