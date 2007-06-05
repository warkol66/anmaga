<?php

  // include base peer class
  require_once 'anmaga/om/BaseModuleLabelPeer.php';
  
  // include object class
  include_once 'anmaga/ModuleLabel.php';


/**
 * Skeleton subclass for performing query and update operations on the 'modules_label' table.
 *
 * Etiquetas de modulos 
 *
 * This class was autogenerated by Propel on:
 *
 * 06/01/07 13:20:48
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package anmaga
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


} // ModuleLabelPeer
