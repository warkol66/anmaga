<?php

  // include base peer class
  require_once 'anmaga/om/BaseModulePeer.php';
  
  // include object class
  include_once 'anmaga/Module.php';
  
  // include object class
  include_once 'anmaga/ModuleDependency.php';


  include_once 'anmaga/SecurityActionPeer.php';
  include_once 'anmaga/ActionLogPeer.php';
  include_once 'anmaga/ActionLogLabelPeer.php';
	include_once 'anmaga/ModuleLabelPeer.php';

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


/**
*
*	Obtiene todos los m�dulos almacenados en la base de datos
*	@return object $modules Modulos almacenados en la base de datos
*/
	function getAll() {
		$cond = new Criteria();
		$todosObj = ModulePeer::doSelect($cond);
		return $todosObj;
	}


/**
*
*	Toma un modulo
*	@param string $moduleName nombre del modulo
*	@return object $module nombre del modulo seleccionado
*/
	function get($moduleName) {
		$cond = new Criteria();
		$cond->add(ModulePeer::NAME, $moduleName);
		$obj = ModulePeer::doSelect($cond);
		return $obj[0];
	}
	
	


/**
*
*	Elimina un modulo
*	@param string $moduleName nombre del modulo
*	@return true si se elimin� correctamente
*/
	function delete($moduleName){
		try{
				$obj = new Module();
				$obj = ModulePeer::retrieveByPK($moduleName);
				if(!empty($obj))
					{
						$obj->delete();
					}
			}catch (PropelException $e) {}
			return true;
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

	
/**
*
*	Carga un xml con datos del m�dulo y lo Guarda en la base de datos
*	@param string $moduleName nombre del modulo
*	@return true si se agrego correctamente
*/
	function addAndInstallModule($moduleName) {
		//try{
			$path="WEB-INF/classes/modules/$moduleName/$moduleName.xml";
		
			/////////
			// parte de carga de xml
			require_once('includes/assoc_array2xml.php');
			$converter= new assoc_array2xml;
			$xml = file_get_contents($path);
			$arrayXml = $converter->xml2array($xml);
			//$arrayXml = $converter->xml2array_ns($xml,":");
			
			//print_r($arrayXml);
			//////////
			// seccion de comprobaciones
			if (empty($arrayXml))return false;
			
			$xmlConfig=$arrayXml["moduleInstalation"]["moduleInstalation:config"];
	
			$xmlInfo=$xmlConfig["language"]["eng"];

			if (empty ($xmlInfo["description"]) ) return false;
			if (empty ($xmlInfo["label"]) ) return false;
			if (empty($xmlConfig["alwaysActive"] ) )
				$xmlConfig["alwaysActive"]=0;

			if (!empty($xmlConfig["moduleDependencies"] ) ){
				//////////
				// parte de carga a la DB tabla modules_dependency	
				foreach ($xmlConfig["moduleDependencies"] as $moduleDependency){
					$moduleDep = new ModuleDependencyPeer();
					$dependency=$moduleDep->setDependency($moduleName, $moduleDependency);
					if (!$dependency)
						return false;

				}
			}


			//////////
			// parte de carga a la DB tabla security_module		
			$securityModule=ModulePeer::loadSecurityModule($moduleName,$arrayXml["moduleInstalation"]["moduleInstalation:securityModule"]);

			if(!$securityModule) return false;

			foreach ($arrayXml["moduleInstalation"]["moduleInstalation:actions"] as $actionName => $actionProperties){
				
				//////////
				// parte carga actions a xml de configuracion phpmvc
				//	$phpmvcConfig=ModulePeer::loadPhpmvcConfig($moduleName);
				//if(!$phpmvcConfig) return false;
				
				//////////
				// parte de carga a la DB tabla security_action
				$securityAction=ModulePeer::loadSecurityAction($actionName,$moduleName,$actionProperties["securityAction"]);
	
				if(!$securityAction) return false;


				//////////
				// parte de carga a la DB tabla actionLogs_label
				$actionLogs=ModulePeer::loadActionLogs($actionName,$actionProperties["actionLogs"]);
	
				if(!$actionLogs) return false;

			} // end foreach ($arrayXml["moduleInstalation"]["moduleInstalation:actions"]

		
			//////////
			// parte tablas sql puras			
			$sql=ModulePeer::loadSqlData($arrayXml["moduleInstalation"]["moduleInstalation:sql"]);
			if(!$sql)return false;
			


			//////////
			// parte de carga a la base de datos tabla modules_module

			$newModule=ModulePeer::loadModule($moduleName,$xmlConfig);
			if (!$newModule)
				return false;
			
	//	}catch (PropelException $e) {}
		return true;
	}



	/**
	*
	*	Subfuncion de agregar modulo que agrega los datos de un modulo en las tablas de modulo
	*	@param string $moduleName nombre del modulo
	*	@param array $xmlConfig datos del modulo que provenian del xml config
	*	@return true si se agrego correctamente
	*/

	function loadModule ($moduleName,$xmlConfig){
		try{
			$moduleObj = new Module();
			$moduleObj->setName($moduleName);
			$moduleObj ->setActive(0);
			$moduleObj ->setAlwaysActive($xmlConfig["alwaysActive"]);
			$moduleObj ->save();
			foreach ($xmlConfig["language"] as $language => $data){
					$moduleLabelObj = new ModuleLabel();
					$moduleLabelObj->setName($moduleName);
					$moduleLabelObj->setLanguage($language);
					$moduleLabelObj->setDescription($data["description"]);
					$moduleLabelObj->setLabel($data["label"]);
					$moduleLabelObj->save();

			}

			return true;
		}catch (PropelException $e) {}
	}





	/**
	*
	*	Subfuncion de agregar modulo que agrega datos del modulo en la parte security
	*	@param string $actionName nombre del action
	*	@param string $moduleName nombre del modulo
	*	@param array $actionProperties propiedades del action
	*	@return true si se agrego correctamente
	*/

	function loadSecurityAction($actionName,$moduleName,$actionProperties){
		@include_once('SecurityActionPeer.php');
			if (class_exists('SecurityActionPeer')){
				$securityActionPeer = new SecurityActionPeer();
				//////////
				// si en el xml se carga all como bitlevel, significa que ser� nivel m�ximo
				// el nivel m�ximo est� seteado como 1073741823 (2�30-1)
				if ($actionProperties["usersBitLevel"] == 'all')
					$actionProperties["usersBitLevel"] =1073741823;

				$securityActionPeer->addActionWithPair($actionName, $moduleName, $actionProperties["usersBitLevel"],$actionProperties["actionPair"],$actionProperties["label"]);
				return true;
			}
			else return false;
	}


	/**
	*
	*	Subfuncion de agregar modulo que agrega datos del modulo en la parte security_module
	*	@param string $moduleName nombre del modulo
	*	@param int $actionProperties propiedades del modulo
	*	@return true si se agrego correctamente
	*/

	function loadSecurityModule($moduleName,$moduleProperties){
		@include_once('SecurityModulePeer.php');
			if (class_exists('SecurityModulePeer')){
				$securityModulePeer = new SecurityModulePeer();
				//////////
				// si en el xml se carga all como bitlevel, significa que ser� nivel m�ximo
				// el nivel m�ximo est� seteado como 1073741823 (2�30-1)
				if ($moduleProperties == 'all')
					$moduleProperties =1073741823;

				$securityModulePeer->addModule($moduleName, $moduleProperties);
				return true;
			}
			else return false;
	}

	/**
	*
	*	Subfuncion de agregar modulo que agrega datos del modulo en la tabla logs
	*	@param string $actionName nombre del action
	*	@param array $actionProperties propiedades del action a agregar 
	*	@return true si se agrego correctamente
	*/
	function loadActionLogs($actionName,$actionProperties){
		@include_once('ActionLogLabelPeer.php');
		if (class_exists('ActionLogLabelPeer')){
		
			foreach ($actionProperties as $forward => $label){
				foreach ($label as $languageLabel =>$labelName){
					
					$actionLogLabel = new ActionLogLabelPeer();
					//////////
					// $moduleName = nombre modulo
					// $actionName
					// $label = contenido de etiqueta, ejemplo "entrar a module list"
					// $language = tipo de idioma de etiqueta, posible contenido = label, esp, eng
					// $forward = tipo de forward, posible contenido= success, failure
						//ejemplo:	$moduleName=modules
						//			$actionName=modulesList
						//			$label= Entrar a listar modulos
						//			$language= esp
						//			$forward= success
					
					$actionLogLabel->add($actionName,$languageLabel,$labelName,$forward);
				}

			} //end foreach ($actionProperties
			return true;
		}
		else return false;
	}


	/**
	*
	*	Subfuncion de agregar modulo que agrega tablas sql
	*	@param string $sql variable que contiene codigo sql
	*	@return true si se agrego correctamente
	*/
	function loadSqlData($sql){
		foreach ($sql as $eachQuery){
			 $con = Propel::getConnection(ModulePeer::DATABASE_NAME);
			 $stmt = $con->createStatement();

			 $rs = $stmt->executeUpdate($eachQuery);
		}
		return true;
	}


	/**
	*
	*	Subfuncion de agregar modulo que agrega informacion al xml "phpmvc-config"
	*	@param string $moduleName nombre del modulo
	*	@return true si se agrego correctamente
	*/
	function loadPhpmvcConfig($moduleName){
		

		$date=date('Ydm_His');

		//////////
		// la parte a cargar
		$phpmvcInstalationPath="WEB-INF/classes/modules/$moduleName/phpmvc-config-$moduleName.xml";

		$xmlPhpmvc=fopen($phpmvcInstalationPath,"rb");
		$xmlPhpmvcLoad=(fread($xmlPhpmvc,filesize($phpmvcInstalationPath)));

		
		//////////
		// comparationLine contiene la primer linea de nuestro xml a ejecutar, que contiene un tag html
		fseek($xmlPhpmvc,0);
		$comparationLine=fgets($xmlPhpmvc);

		$buffer="";
		//////////
		// el xml original
		$configPhpmvcPath="WEB-INF/phpmvc-config.xml";
		$configPhpmvc=fopen($configPhpmvcPath,"rb+");


		
		//////////
		// el xml resultante
		$configPhpmvcResult=fopen("$configPhpmvcPath.$date.tmp","wb");

		if ($configPhpmvc) {
			$buffer = fgets($configPhpmvc);
			while (!feof($configPhpmvc) && $buffer!="<!-- instalation tag-->\r\n") {
				
				//////////
				// si el modulo ya estaba instalado en el xml...
				if ($buffer == $comparationLine){
					fclose($configPhpmvcResult);
					fclose($configPhpmvc);
					fclose($xmlPhpmvc);
					return false;
				}
				fputs($configPhpmvcResult,$buffer);	
				$buffer = fgets($configPhpmvc);
				}
			fwrite($configPhpmvcResult,$xmlPhpmvcLoad);
			fputs($configPhpmvcResult,"\r\n\r\n\r\n");
			while(!feof($configPhpmvc)){
				fputs($configPhpmvcResult,$buffer);	
				$buffer = fgets($configPhpmvc);
			}

			//////////
			// cierro archivos
			fclose($configPhpmvcResult);
			fclose($configPhpmvc);
			fclose($xmlPhpmvc);


			//////////
			// dejo archivo anterior como backup, renombro archivo resultante como original
			rename($configPhpmvcPath,"$configPhpmvcPath$date.backup");
			rename("$configPhpmvcPath.$date.tmp",$configPhpmvcPath);
			unlink("$configPhpmvcPath.$date.tmp");
		}
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
			$moduleObj ->save();
			}catch (PropelException $e) {}
			
			$cond = new Criteria();
			$cond->add(ModuleLabelPeer::NAME, $module);
			
			global $system;
			$language=$system["config"]["mluse"]["language"];
			if(empty($language)) $language='eng';

			$cond->add(ModuleLabelPeer::LANGUAGE, $language);
			$moduleLabel = ModuleLabelPeer::doSelect($cond);

			$moduleLabel[0]->setDescription($description);
			$moduleLabel[0] ->setLabel($label);
			$moduleLabel[0] ->save();

			return true;
		}



	/**
	*
	*	Checkea las dependencias de un modulo
	*	@param string $moduleName nombre del modulo
	*	@return object $dependencies dependencias del modulo
	*/
	//useless
	/*function hasDependencies ($moduleName){
			$obj = new Module();
			$obj = ModulePeer::retrieveByPK($moduleName);
	}
	*/


	/**
	*
	*	Checkea el estado de una dependencia
	*	@param string $dependencyName nombre de la dependencia
	*	@return true si esta activada, false si est� desactivada
	*/
	function dependencyStatus ($dependencyName){
			$obj = new Module();
			$obj = ModulePeer::retrieveByPK($dependencyName);
			if($obj){
				if (!$obj->getAlwaysActive() ){
					if(!$obj->getActive() ) {
						return 0;
					}
				}	
			}
			else return 0;
			return 1;
	}

} // ModulePeer
