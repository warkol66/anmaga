<?php

require_once 'om/BaseSecurityAction.php';


/**
 * Skeleton subclass for representing a row from the 'SecurityAction' table.
 *
 * Actions del sistema
 *
 * This class was autogenerated by Propel on:
 *
 * 09/15/06 15:14:50
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class SecurityAction extends BaseSecurityAction {


	/**
	*
	* Obtiene la etiqueta de ese Action
	*
	* @return string label la etiqueta
	*/
	
	function getLabel(){
		
		try{
		global $system;
		$language=$system["config"]["mluse"]["language"];
		include_once 'anmaga/SecurityActionLabelPeer.php';
		$language='eng';
		$actionLabelInfo=SecurityActionLabelPeer::getByActionAndLanguage($this->GetAction(),$language);
		return $actionLabelInfo->getLabel();
		}catch (PropelException $e) {}
	}








} // SecurityAction
