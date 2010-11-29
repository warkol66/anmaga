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
	 * Initializes internal state of Content object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

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
