<?php

  // include base peer class
  require_once 'anmaga/om/BaseModulePeer.php';
  
  // include object class
  include_once 'anmaga/Module.php';
  
  // include object class
  include_once 'anmaga/ModuleDependency.php';


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

	

	function addModule($moduleName) {
		try{
			$path="WEB-INF/classes/modules/$moduleName/$moduleName.xml";
		
			/////////
			// parte de carga de xml
			require_once('includes/assoc_array2xml.php');
			$converter= new assoc_array2xml;
			$xml = file_get_contents($path);
			$arrayXml = $converter->xml2array($xml);

			
			//////////
			// seccion de comprobaciones
			
			if (empty($arrayXml))return false;
			
			if (empty ($arrayXml["config"]["description"]) ) return false;
			if (empty ($arrayXml["config"]["label"]) ) return false;
			
			if (empty($arrayXml["config"]["alwaysActive"] ) )
				$arrayXml["config"]["alwaysActive"]=0;

			if (!empty($arrayXml["config"]["moduleDependencies"] ) ){
				foreach ($arrayXml["config"]["moduleDependencies"] as $moduleDependency){
					$moduleDep = new ModuleDependencyPeer();
					$moduleDep->setDependency($moduleName, $moduleDependency);
				}
			}

			//////////
			// parte de carga a la base de datos
			$moduleObj = new Module();
			$moduleObj->setName($moduleName);
			$moduleObj ->setDescription($arrayXml["config"]["description"]);
			$moduleObj ->setLabel($arrayXml["config"]["label"]);
			$moduleObj ->setActive(0);
			$moduleObj ->setAlwaysActive($arrayXml["config"]["alwaysActive"]);
			$moduleObj ->save();
		}catch (PropelException $e) {}
		return true;
	}




/**
*
*	Actualiza en la base de datos m�dulos
*	@param string $moduleName nombre del modulo
*	@param string $description descripcion del modulo
*	@param string $label etiqueta del m�dulo
*	@return true si se agrego correctamente
*/

function updateModule($module,$description,$label) {
		try{
		$moduleObj = new Module();
		$moduleObj = ModulePeer::retrieveByPK($module);
		$moduleObj ->setDescription($description);
		$moduleObj ->setLabel($label);

		$moduleObj ->save();
		}catch (PropelException $e) {}
		return true;
	}

} // ModulePeer