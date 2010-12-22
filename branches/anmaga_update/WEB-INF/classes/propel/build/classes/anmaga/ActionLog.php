<?php

require_once 'om/BaseActionLog.php';


/**
 * Skeleton subclass for representing a row from the 'log_actionLog' table.
 *
 * logs del sistema
 *
 * This class was autogenerated by Propel on:
 *
 * 03/07/07 14:29:12
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class ActionLog extends BaseActionLog {


	/**
	*
	* Obtiene la etiqueta de ese modulo
	*
	* @return string label la etiqueta
	*/
	
	function getLabel(){
		
		try{
		include_once 'anmaga/ActionLogLabelPeer.php';
		global $system;
		$language=$system["config"]["mluse"]["language"];
		if(empty($language)) $language='eng';
		$logLabelInfo=ActionLogLabelPeer::getAllByInfo($this->GetAction(),$this->GetForward(),$language);
		return $logLabelInfo->getLabel();
		}catch (PropelException $e) {}
	}







} // ActionLog
