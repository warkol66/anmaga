<?php

  // include base peer class
  require_once 'om/BaseModuleLabelPeer.php';
  
  // include object class
  include_once 'ModuleLabel.php';


/**
 * Skeleton subclass for performing query and update operations on the 'modules_label' table.
 *
 * Etiquetas de modulos 
 *
 * @package    modules
 */	
class ModuleLabelPeer extends BaseModuleLabelPeer {

/**
*
*	Obtiene etiquetas segun el idioma y modulo
*	@param string $language idioma
*	@param string $module nombre del modulo
*	@return object $objs etiquetas
*/
	function getByModuleAndLanguage($module,$language) {
		try{
		$cond = new Criteria();
		$cond->add(ModuleLabelPeer::NAME, $module);
		$cond->add(ModuleLabelPeer::LANGUAGE, $language);
		$obj = ModuleLabelPeer::doSelect($cond);
		return $obj[0];
		}catch (PropelException $e) {}
	}


	/**
	 * genera el codigo SQL de limpieza de las tablas afectadas al modulo.
	 * @return string SQL
	 */
	public static function getSQLCleanup($moduleName) {
		
		$sql = "DELETE FROM `modules_label` WHERE `name` = " . "'" . $moduleName . "'" . ';';
		return  $sql;

	}

} // ModuleLabelPeer
