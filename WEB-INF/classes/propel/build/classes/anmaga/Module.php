<?php

require_once 'anmaga/om/BaseModule.php';


/**
 * Skeleton subclass for representing a row from the 'modules_module' table.
 *
 *  Registro de modulos
 *
 * This class was autogenerated by Propel on:
 *
 * 03/28/07 13:59:17
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package anmaga
 */	
class Module extends BaseModule {

	
	
	/**
	*
	* Obtiene la etiqueta de ese modulo
	*
	* @return string label la etiqueta
	*/
	
	function getLabel(){
		
		try{
		include_once 'anmaga/ModuleLabelPeer.php';
		global $system;
		$language=$system["config"]["mluse"]["language"];
		if(empty($language)) $language='eng';
		$moduleLabelInfo=ModuleLabelPeer::getByModuleAndLanguage($this->GetName(),$language);
		return $moduleLabelInfo->getLabel();
		}catch (PropelException $e) {}
	}

	
		
	/**
	*
	* Obtiene la descripcion de ese modulo
	*
	* @return string description la descripcion
	*/
	function getDescription(){
		try{
			include_once 'anmaga/ModuleLabelPeer.php';
			
			global $system;
			$language=$system["config"]["mluse"]["language"];
			if(empty($language)) $language='eng';
			
			$moduleLabelInfo=ModuleLabelPeer::getByModuleAndLanguage($this->GetName(),$language);
			return $moduleLabelInfo->getDescription();
		}catch (PropelException $e) {}
	}

	/**
	*
	* Obtiene el accesso de ese modulo
	*
	* @return string access el acceso
	*/
	function getAccess(){
		try{
			include_once 'anmaga/SecurityModulePeer.php';
			$securityAccess=SecurityModulePeer::GetAccess($this->GetName());
			return $securityAccess->getAccess();
		}catch (PropelException $e) {}
	}




} // Module
