<?php
/** 
 * InstallDoSetupPermissionsAction
 *
 * @package install 
 */

require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("SecurityModule.php");


if(false === function_exists('lcfirst'))
{
	/**
	 * Make a string's first character lowercase
	 *
	 * @param string $str
	 * @return string the resulting string.
	 */
	function lcfirst( $str ) {
		$str[0] = strtolower($str[0]);
		return (string)$str;
	}
}

class InstallDoSetupPermissionsAction extends BaseAction {

	function InstallDoSetupPermissionsAction() {
		
	}

	function generateSQLInsertSecurityModule($module,$access,$accessAffiliateUser) {
	
		$query = "INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` ) VALUES ('$module', '$access', '$accessAffiliateUser');";
	
		return $query;
	
	}


	
	/**
	 * Escribe los permisos a la salida 
	 * @param $module modulo al que pertenecen las actions 
	 * @param $permission array de permisos de usuario para las acciones recibido por post
	 * @param $permission array de permisos de afiliado para las acciones recibido por post
	 * @param $fd file descriptor del archivo donde se deberan guardar los permisos
	 *
	 */
	function writeActionsPermissionsToOutput($module,$permission,$permissionAffiliate,$permissionRegistration,$noCheckLoginArray,$fd) {
		
		$sql = SecurityActionPeer::getSQLCleanup($module);	
		fprintf($fd,"%s\n",$sql);
	
		foreach (array_keys($permission) as $action) {
		
			if (isset($permission[$action]['all'])) {
				//para ese action todos los permisos
				$bitLevel = 1073741823;	
			}
			else {
				$bitLevel = 0; 
				
				foreach ($permission[$action]['access'] as $access) {
					$bitLevel += $access;
				
				}
				//El supervisor siempre tiene acceso
				if ($bitLevel > 0)
					$bitLevel += 1;	
			
			}
			
			if (isset($permissionAffiliate[$action]['all'])) {
				//para ese action todos los permisos
				$bitLevelAffiliate = 1073741823;	
			}
			else {
				$bitLevelAffiliate = 0; 
				
				foreach ($permissionAffiliate[$action]['access'] as $access) {
					$bitLevelAffiliate += $access;
				
				}	
			
			}
			
			
			$accessRegistrationUser = 0;
			
			if ($permissionRegistration[$action] == '1') {	
				$accessRegistrationUser = 1;
			}
			
			$noCheckLogin = false;
			
			if ($noCheckLoginArray[$action] == '1') {	
				$noCheckLogin = true;
			}

			//vemos si la accion tiene definido un pair
			$pair = "";
			if (!empty($permission[$action]['pair']))
				$pair = $permission[$action]['pair'];
			
			//TODO FALTA SECCION
			$section = '';
			
			$securityAction = new SecurityAction();
			$lcAction = strtolower(substr($action,0,1)) . substr($action,1,strlen($action)-1);
			$securityAction->setAction($lcAction);
			$securityAction->setModule($module);
			$securityAction->setSection($section);
			$securityAction->setAccess($bitLevel);
			$securityAction->setAccessRegistrationUser($accessRegistrationUser);
			$securityAction->setNoCheckLogin($noCheckLogin);
			$securityAction->setAccessAffiliateUser($bitLevelAffiliate);
			$securityAction->setActive(1);
			if ($pair != "")
				$pair = lcfirst($pair);
			$securityAction->setPair($pair);
			
			$sql = $securityAction->getSQLInsert();	
			fprintf($fd,"%s\n",$sql);

		}
	
	
	}
	
	/**
	 * Escribe los permisos a la salida 
	 * @param $module modulo al que pertenecen las actions 
	 * @param $permission array de permisos de usuario para las acciones recibido por post
	 * @param $permission array de permisos de afiliado para las acciones recibido por post
	 * @param $fd file descriptor del archivo donde se deberan guardar los permisos
	 *
	 */
	function writeGeneralPermissionsToOutput($module,$permission,$permissionAffiliate,$permissionRegistration,$fd) {
	

		if (isset($permission['all'])) {
			//para ese action todos los permisos
			$bitLevel = 1073741823;	
		}
		else {
			$bitLevel = 0; 
			
			foreach ($permission['access'] as $access) {
				$bitLevel += $access;
			
			}	
		
		}
		
		if (isset($permissionAffiliate['all'])) {
			//para ese action todos los permisos
			$bitLevelAffiliate = 1073741823;	
		}
		else {
			$bitLevelAffiliate = 0; 
			
			foreach ($permissionAffiliate['access'] as $access) {
				$bitLevelAffiliate += $access;
			
			}	
		
		}
		
		$accessRegistrationUser = 0;
		
		if ($permissionRegistration == '1') {	
			$accessRegistrationUser = 1;
		}

		$securityModule = new SecurityModule();
		$securityModule->setModule($module);
		$securityModule->setAccess($bitLevel);
		$securityModule->setAccessRegistrationUser($accessRegistrationUser);
		$securityModule->setAccessAffiliateUser($bitLevelAffiliate);
		$securityModule->setNoCheckLogin($_POST["noCheckLoginModule"]);
		
		$sql = $securityModule->getSQLCleanup();
		fprintf($fd,"%s\n",$sql);		
		$sql = $securityModule->getSQLInsert();
		fprintf($fd,"%s\n",$sql);

	
	
	}
	
	function executeSuccess($mapping) {

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		if (!empty($_POST['mode']))
			$queryData .= '&mode=' . $_POST['mode'];
		foreach ($_POST["languages"] as $languageId) 
			$queryData .= '&languages[]=' . $languageId;		
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;

	}

	function execute($mapping, $form, &$request, &$response) {

		BaseAction::execute($mapping, $form, $request, $response);
		global $PHP_SELF;
		//////////
		// Call our business logic from here

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}
		
		//asigno modulo
		$moduleLabel = "Install";
		$smarty->assign("moduleLabel",$moduleLabel);
 	
		$modulePeer = new ModulePeer();
		
		
		if (!isset($_POST['permission']) && (!isset($_POST['moduleName']))) {
			return $mapping->findForwardConfig('failure');
		}

		//salto de paso
		if (isset($_POST['skip'])) {
			return $this->executeSuccess($mapping);
		}

		$permission = $_POST['permission'];
		$permissionAffiliate = $_POST['permissionAffiliate'];
		$permissionGeneral = $_POST['permissionGeneral'];
		$permissionAffiliateGeneral = $_POST['permissionAffiliateGeneral'];
		$permissionRegistrationGeneral = $_POST['permissionRegistrationGeneral'];
		$permissionRegistration = $_POST['permissionRegistration'];
		$noCheckLogin = $_POST['noCheckLogin'];	

		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/setup/';
		
		$module = $_POST['moduleName'];

		//creacion de archivo de salida		
		
		$fd = fopen($modulePath . $module . '-permissions.sql','w');
		if ($fd == false) {
			//error de apertura de archivo a generar
			return $mapping->findForwardConfig('failure');
		}
		
		$this->writeGeneralPermissionsToOutput($module,$permissionGeneral,$permissionAffiliateGeneral,$permissionRegistrationGeneral,$fd);
		$this->writeActionsPermissionsToOutput($module,$permission,$permissionAffiliate,$permissionRegistration,$noCheckLogin,$fd);

		fclose($fd);
		
		//solamente se ejecuta este paso
		if (isset($_POST['stepOnly'])) {
			return $mapping->findForwardConfig('success-step');			
		}
		
		return $this->executeSuccess($mapping);
				
	}

}
