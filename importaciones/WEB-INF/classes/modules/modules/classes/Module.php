<?php

require_once 'om/BaseModule.php';


/**
 * Skeleton subclass for representing a row from the 'modules_module' table.
 *
 *  Registro de modulos
 *
 * @package    modules
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
			$language = Common::getCurrentLanguageCode();
			if(empty($language)) 
				$language='eng';
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
		try {
			include_once 'anmaga/ModuleLabelPeer.php';
			
			global $system;
			$language = Common::getCurrentLanguageCode();
			if(empty($language)) 
				$language='eng';
			
			$moduleLabelInfo = ModuleLabelPeer::getByModuleAndLanguage($this->GetName(),$language);
			if (!empty($moduleLabelInfo))
				return $moduleLabelInfo->getDescription();
			return "";
		} catch (Exception $e) {
			return "";
		}
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
			$securityAccess = SecurityModulePeer::get($this->getName());
			return $securityAccess->getAccess();
		}catch (PropelException $e) {}
	}
	
	/**
	 *
	 *
	 *
	 */
	 function getSQLInsert() {

	 	$moduleName = $this->getName();
		$alwaysActive = $this->getAlwaysActive();
		$hasCategories = $this->getHasCategories();
		$sql .= "INSERT INTO `modules_module` ( `name` , `active` , `alwaysActive`, `hasCategories` ) VALUES ('$moduleName', '1', '$alwaysActive','$hasCategories');";
		 
		 return $sql;
	 
	 }
	
	/**
	 * genera el codigo SQL de limpieza de las tablas afectadas al modulo.
	 * @return string SQL
	 */
	public function getSQLCleanup() {
		
		$sql = "DELETE FROM `modules_module` WHERE `name` = " . "'" . $this->getName() . "'" . ';';
		return  $sql;

	}

	/**
	 * Obtiene las categorias base del modulo
	 * @return array de instancias de Category
	 */
	public function getParentCategories() {
		
		require_once('CategoryPeer.php');
		
		return CategoryPeer::getAllParentsByModule($this->getName());
		
	}


} // Module
