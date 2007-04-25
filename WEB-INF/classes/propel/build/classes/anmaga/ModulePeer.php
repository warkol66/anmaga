<?php

  // include base peer class
  require_once 'anmaga/om/BaseModulePeer.php';
  
  // include object class
  include_once 'anmaga/Module.php';


/**
 * Skeleton subclass for performing query and update operations on the 'modules_module' table.
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
class ModulePeer extends BaseModulePeer {


	function getAll() {
		$cond = new Criteria();
		$todosObj = ModulePeer::doSelect($cond);
		return $todosObj;
	}



	
	
	function delete($module)
		{ 	try{
			$obj = new Module();
			$obj = ModulePeer::retrieveByPK($module);
			if(!empty($obj))
				{
					$obj->delete();
				}
		}catch (PropelException $e) {}
		return;
		}


	/**
	* Limpia el acceso activo de un modulo
	*
	* @param string $action con el nombre del modulo a limpiar
	*/

  function clearActive($module) {
		$obj = new Module();
		$obj = ModulePeer::retrieveByPK($module);
		$obj->setActive(0);
		$obj->save();
		return;
  }

	
	//////
	// add module version 1
	
	/*function addModule($module,$label,$description) {
		try{
		$module = new Module();
		$module ->setName($module);
		$module ->setLabel($label);
		$module ->setDescription($description);
		$module ->setActive(1);
		$module ->setAlwaysActive(0);
		$module ->save();
		}catch (PropelException $e) {}
		return;
	}*/


function addModule($module,$description,$label) {
		try{
		$moduleObj = new Module();
		$moduleObj->setName($module);
		$moduleObj ->setDescription($description);
		$moduleObj ->setLabel($label);
		$moduleObj ->setActive(1);
		$moduleObj ->setAlwaysActive(0);
		$moduleObj ->save();
		}catch (PropelException $e) {}
		return;
	}

function updateModule($module,$description,$label) {
		try{
		$moduleObj = new Module();
		$moduleObj = ModulePeer::retrieveByPK($module);
		$moduleObj ->setDescription($description);
		$moduleObj ->setLabel($label);
		$moduleObj ->setActive(1);
		$moduleObj ->setAlwaysActive(0);
		$moduleObj ->save();
		}catch (PropelException $e) {}
		return;
	}

} // ModulePeer
