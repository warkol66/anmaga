<?php

require 'actionlogs/classes/om/BaseActionlog.php';


/**
 * Skeleton subclass for representing a row from the 'actionlogs_log' table.
 *
 * logs del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    actionlogs.classes
 */
class Actionlog extends BaseActionlog {

	/**
	 * Initializes internal state of Actionlog object.
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
	* Obtiene la etiqueta de ese modulo
	*
	* @return string label la etiqueta
	*/
	
	function getLabel(){
		
		try{
		include_once 'ActionlogLabelPeer.php';
		global $system;
		$language = Common::getCurrentLanguageCode();
		if(empty($language))
			$language='eng';
		$logLabelInfo=ActionlogLabelPeer::getAllByInfo($this->GetAction(),$this->GetForward(),$language);
		return $logLabelInfo;
		}catch (PropelException $e) {}
	}


	public function getSecurityAction() {
		
		$result = parent::getSecurityAction();
		
		//si es un action con Do, buscamos la informacion sin el do
		//ya que en ese caso se da de alta como pair
		if (empty($result) && (ereg("(.*)([a-z]Do[A-Z])(.*)",$this->getAction(),$parts))) {
			
			$actionWithoutDo = $parts[1].$parts[2][0].$parts[2][3].$parts[3];
			$result = SecurityActionPeer::get($actionWithoutDo);		
		
		}
		
		return $result;
	
	}

	function getAffiliateUser(){
		$criteria = new Criteria();
		require_once('AffiliateUserPeer.php');
		return AffiliateUserPeer::get($this->getAffiliateId());
	}


} // Actionlog