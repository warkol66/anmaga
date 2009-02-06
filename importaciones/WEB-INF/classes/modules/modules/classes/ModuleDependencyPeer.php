<?php

  // include base peer class
  require_once 'om/BaseModuleDependencyPeer.php';
  
  // include object class
  include_once 'ModuleDependency.php';


/**
 * Skeleton subclass for performing query and update operations on the 'modules_dependency' table.
 *
 * Dependencia de modulos 
 *
 * @package    modules
 */	
class ModuleDependencyPeer extends BaseModuleDependencyPeer {


	/**
	*
	*	Subfuncion de agregar modulo que agrega las dependencias de un modulo
	*	@param string $moduleName nombre del modulo
	*	@param string $dependency dependencia
	*	@return true si se agrego correctamente
	*/
	function setDependency ($moduleName,$dependency){
		try{
			$obj = new ModuleDependency();
			$obj->setModuleName($moduleName);
			$obj->setDependence($dependency);
			$obj->save();
			return true;
		}catch (PropelException $e) {}
  }


	/**
	*
	*	Toma un modulo
	*	@param string $moduleName nombre del modulo
	*	@return object $module nombre del modulo seleccionado
	*/
	function get($moduleName) {
		$cond = new Criteria();
		$cond->add(ModuleDependencyPeer::MODULENAME, $moduleName);
		$todosObj = ModuleDependencyPeer::doSelect($cond);
		return $todosObj;
	}



} // ModuleDependencyPeer
