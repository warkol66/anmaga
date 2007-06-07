<?php

  // include base peer class
  require_once 'om/BaseSecurityActionPeer.php';
  
  // include object class
  include_once 'SecurityAction.php';

	include_once 'SecurityActionLabelPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'SecurityAction' table.
 *
 * Actions del sistema
 *
 * This class was autogenerated by Propel on:
 *
 * 09/15/06 15:14:50
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package mer
 */	
class SecurityActionPeer extends BaseSecurityActionPeer {

	/**
	* Obtiene todos los actions cargados en la base de datos
	*
	* @return array con los actions cargados
	*/
	function getAll() {
		$cond = new Criteria();
		$todosObj = SecurityActionPeer::doSelect($cond);
		return $todosObj;
  }
  
	/**
	* Obtiene todos los actions cargados en la base de datos por permiso para el bitlevel
	*
	* @param int $bitLevel Bit Level
	* @return array Actions
	*/
	function getAllByBitLevel($bitLevel) {
		$allActions = SecurityActionPeer::getAll();
		return SecurityActionPeer::getOnlyActionsWithAccess($allActions,$bitLevel);
  }
  
	/**
	* Obtiene todos los actions cargados en la base de datos por permiso para el bitlevelUsersByAffiliate
	*
	* @param int $bitLevel Bit Level
	* @return array Actions
	*/
	function getAllByBitLevelUsersByAffiliate($bitLevel) {
		$allActions = SecurityActionPeer::getAll();
		return SecurityActionPeer::getOnlyActionsWithAccess($allActions,$bitLevel);
  }
  
  function getOnlyActionsWithAccess($allActions,$bitLevel) {
		$actions = array();
		foreach ($allActions as $action) {
			if (($action->getAccess() & $bitLevel) > 0)
				$actions[] = $action;
		}
		return $actions;
  }
  
  function getOnlyActionsWithAccessUsersByAffiliate($allActions,$bitLevel) {
		$actions = array();
		foreach ($allActions as $action) {
			if (($action->getAccessUsersByAffiliate() & $bitLevel) > 0)
				$actions[] = $action;
		}
		return $actions;
  }



	/**
	* elimina un action
	* @param string $action nombre del action
	* @return true
	*/
	function delete($action)
		{ 	try{
			$obj = new securityAction();
			$obj = SecurityActionPeer::retrieveByPK($action);
			if(!empty($obj))
				{
					$obj->delete();
				}
		}catch (PropelException $e) {}
		return true;
		}


	/**
	* Limpia el acceso de un determinado action
	*
	* @param string $action con el nombre del action a limpiar
	*/

  function clearAccess($action,$baseLevel) {
		$obj = new securityAction();
		$obj = SecurityActionPeer::retrieveByPK($action);
		$obj->setAccess($baseLevel);
		$obj->save();
		return;
  }

	/**
	* Limpia el acceso UsersByAffiliate de un determinado action
	*
	* @param string $action con el nombre del action a limpiar
	*/

  function clearAccessUsersByAffiliate($action,$baseLevel) {
		$obj = new securityAction();
		$obj = SecurityActionPeer::retrieveByPK($action);
		$obj->setAccessUsersByAffiliate($baseLevel);
		$obj->save();
		return;
  }


	/**
	*  Guarda actions en la base de datos
	*
	* @param string $action con el nombre del action
	* @param string $modulo con el nombre del modulo al cual pertenece el action
	* @param int $access con el numero de acceso que tendr� el action
	* @return true si todo est� ok
	*/

	function addAction($action,$modulo,$access) {
		try{
		$security = new securityAction();
		$security->setAction($action);
		$security->setModule($modulo);
		$security->setSection(1);
		$security->setAccess($access);
		$security->setAccessUsersByAffiliate($access);
		$security->save();
		}catch (PropelException $e) {}
		return;
	}
	
	/**
	*  Guarda un action con su par en la base de datos
	*
	* @param string $action con el nombre del action
	* @param string $modulo con el nombre del modulo al cual pertenece el action
	* @param int $access con el numero de acceso que tendr� el action
	* @param string $pair Nombre del par
	* @return true si todo est� ok
	*/
	function addActionWithPair($action,$modulo,$access,$pair=null,$labels) {
		try{
		$security = new securityAction();
		$security->setAction($action);
		$security->setModule($modulo);
		if ($pair)
			$security->setPair($pair);
		$security->setSection(1);
		$security->setAccess($access);
		$security->setActive(1);
		$security->setAccessUsersByAffiliate($access);
		$security->save();
		}catch (PropelException $e) {}

		foreach ($labels as $language => $label){
				$securityLabelPeer = new SecurityActionLabel();
				$securityLabelPeer ->setAction($action);
				$securityLabelPeer ->setLanguage($language);
				$securityLabelPeer ->setLabel($label);
				$securityLabelPeer->save();
			}
		return true;
	}



	/**
	* Actualiza los actions en la base de datos
	*
	* @param string $action con el nombre del action
	* @param int $access con el numero de acceso que tendr� el action
	* @return true si todo est� ok
	*/

	function setNewAccess($action,$access) {
		$obj = new securityAction();
		$obj = SecurityActionPeer::retrieveByPK($action);
		$obj->setAccess($access);
		$obj->save();
		return;
	}
	
	/**
	* Actualiza el action con el acceso UsersByAffiliate
	*
	* @param string $action con el nombre del action
	* @param int $access con el numero de acceso que tendr� el action
	* @return true si todo est� ok
	*/

	function setNewAccessUsersByAffiliate($action,$access) {
		$obj = new securityAction();
		$obj = SecurityActionPeer::retrieveByPK($action);
		$obj->setAccessUsersByAffiliate($access);
		$obj->save();
		return;
	}

	
	
	/**
	* obtiene un action
	* @param string $action nombre del action
	* @return object $obj action encontrado
	*/

	function get($action) {
		   	$obj = SecurityActionPeer::retrieveByPK($action);
		return $obj;
	}
		
		/*$cond = new Criteria();
		$cond->add(SecurityActionPeer::ACTION, $action);
		$todosObj = SecurityActionPeer::doSelect($cond);
		return $todosObj;
	}
*/


	function getAllByModule($module) {
		$criteria = new Criteria();
		$criteria->add(SecurityActionPeer::MODULE, $module);
    $obj = SecurityActionPeer::doSelect($criteria);
    return $obj;
	}
	
	function getAllByModuleAndBitLevelUsersByAffiliate($module,$bitLevel) {
		$allActions = SecurityActionPeer::getAllByModule($module);
		return SecurityActionPeer::getOnlyActionsWithAccessUsersByAffiliate($allActions,$bitLevel);
	}
	
	function getAllByModuleAndBitLevel($module,$bitLevel) {
		$allActions = SecurityActionPeer::getAllByModule($module);
		return SecurityActionPeer::getOnlyActionsWithAccess($allActions,$bitLevel);
	}

	
	function getAllByAction($action) {
		$criteria = new Criteria();
		$criteria->add(SecurityActionPeer::ACTION, $action);
    if( $obj = SecurityActionPeer::doSelect($criteria) )
			return true;
			else    return false;
	}
	
	function getByPair($pair) {
		$criteria = new Criteria();
		$criteria->add(SecurityActionPeer::PAIR, $pair);
    $objs = SecurityActionPeer::doSelect($criteria);
    if (!empty($objs[0]))
    	return $objs[0];
    else
    	return false;
	}


	function getModules() {
	   
		$criteria = new Criteria();
		$criteria->clearSelectColumns()->addSelectColumn(SecurityActionPeer::MODULE);
		$criteria->setDistinct(MODULE);
	   $rs = BasePeer::doSelect($criteria);
	   $result = array();
	   while($rs->next()) {
		 $result[] = $rs->get(1);
	   }
	   return $result;
	 }

	/**
	* checkea el permiso de un usuario al modulo de un action
	* @param array $user niveles de acceso del usuario
	* @param string $action nombre del action
	* @return true si todo salio ok
	*/
	function checkAccess($user,$action){
		$module=SecurityActionPeer::getModuleByAction($action);
		
		echo "affiliate id es :";
		print_r($user['affiliateId']);
			echo "sip \n";
		
		if ( $user['affiliateId']== 999999 ){
			$moduleLevel=4;
		}
		elseif ($user['affiliateId']== 0 ){
			$moduleLevel=1;
		}
		else $moduleLevel=2;
		
		
		include_once 'SecurityModulePeer.php';
		$securityModule=SecurityModulePeer::get($module);
		print_r($securityModule);
		
		$access=SecurityActionPeer::checkAccessBitToBit($securityModule->getAccess,$moduleLevel);
		echo "\naccess es $access \n";

		//if ($access == 0) return false;

		include_once 'LevelPeer.php';

		//if ( empty($level) || ($level->getBitLevel() & $accessAction) == 0 ) {
		//	header("Location:Main.php?do=noPermission");
		//	exit();
		//}

	}


	/**
	* obtiene el nombre del modulo de un action
	* @param string $action nombre del action
	* @return string $module nombre del modulo del action
	*/
	function getModuleByAction($action) {
			$criteria = new Criteria();
			$criteria->add(SecurityActionPeer::ACTION, $action);
		$obj = SecurityActionPeer::doSelect($criteria);
			return $obj[0]->getModule();

		}

	/**
	 *
	 * Compara 2 numberos bit a bit
	 * @param int $paramUser bit del usuario
	 * @param int $paramModule bit del modulo
	 * @return 1 si un numero se incluye en otro
	 */
	function checkAccessBitToBit($paramModule,$paramUser){
		if ((intval($paramModule) & intval($paramUser)) > 0 )
				return 1;

			return 0;

	}

} // SecurityActionPeer
