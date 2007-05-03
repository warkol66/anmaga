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
	//global $modulesPath;


class ModulePeer extends BaseModulePeer {



	function getAll() {
		$cond = new Criteria();
		$todosObj = ModulePeer::doSelect($cond);
		return $todosObj;
	}


	function get($moduleName) {
		   	$obj = ModulePeer::retrieveByPK($moduleName);
		return $obj;
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



/**
*
*	Actualiza estado de un modulo
*	@param string $moduleName nombre del modulo
*	@param string $active nuevo estado del modulo
*	@return true si se actualiz� correctamente
*/
	function setActive ($moduleName,$active){
		$obj = new Module();
		$obj = ModulePeer::retrieveByPK($moduleName);
		$obj->setActive($active);
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


/*function addModule($module,$description,$label) {
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
	}*/

/*function addModule($moduleName,$label,$description) {
		try{
			$path="WEB-INF/classes/modules/$moduleName/$moduleName.xml";
		
		require_once('includes/assoc_array2xml.php');
		$converter= new assoc_array2xml;
		$a=$converter->xml2array($path);
		print_r($a);
		die();

$xml=simplexml_load_file($path);
		//if($xml=simplexml_load_file($path))
	//	{
			//echo "ok";
			//print_r($xml);
			//die();
			$akk=$xml->label;

			$moduleObj = new Module();
			$moduleObj->setName($moduleName);
			$moduleObj ->setDescription($description);
			$moduleObj ->setLabel($label);
			$moduleObj ->setActive(0);
			$moduleObj ->setAlwaysActive(1);
			$moduleObj ->save();
	//	}
		}catch (PropelException $e) {}
		return true;
	}*/

	function addModule($moduleName) {
		try{
			$path="WEB-INF/classes/modules/$moduleName/$moduleName.xml";
		
		/*require_once('includes/assoc_array2xml.php');
		$converter= new assoc_array2xml;
		$a=$converter->xml2array($path);
		print_r($a);
		die();*/

$xml=simplexml_load_file($path);
		//if($xml=simplexml_load_file($path))
	//	{
			//echo "ok";
			//print_r($xml);
			//die();
			$akk=$xml->label;

			$moduleObj = new Module();
			$moduleObj->setName($moduleName);
			$moduleObj ->setDescription("descripcion aca");
			$moduleObj ->setLabel();
			$moduleObj ->setActive(0);
			$moduleObj ->setAlwaysActive(1);
			$moduleObj ->save();
	//	}
		}catch (PropelException $e) {}
		return true;
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