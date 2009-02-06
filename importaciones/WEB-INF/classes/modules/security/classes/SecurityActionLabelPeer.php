<?php

  // include base peer class
  require_once 'om/BaseSecurityActionLabelPeer.php';
  
  // include object class
  include_once 'SecurityActionLabel.php';


/**
 * Skeleton subclass for performing query and update operations on the 'security_actionLabel' table.
 *
 * etiquetas de actions de seguridad
 *
 * @package    security
 */	
class SecurityActionLabelPeer extends BaseSecurityActionLabelPeer {




	/**
*
*	Obtiene etiquetas segun el idioma y action
*	@param string $language idioma
*	@param string $module nombre del modulo
*	@return object $objs etiquetas
*/
	function getByActionAndLanguage($action,$language) {
		try{
		$cond = new Criteria();
		$cond->add(SecurityActionLabelPeer::ACTION, $action);
		$cond->add(SecurityActionLabelPeer::LANGUAGE, $language);
		$obj = SecurityActionLabelPeer::doSelect($cond);
		return $obj[0];
		}catch (PropelException $e) {}
	}


} // SecurityActionLabelPeer
