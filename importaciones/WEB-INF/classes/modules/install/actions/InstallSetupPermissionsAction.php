<?php
/** 
 * InstallSetupPermissionsAction
 *
 * @package install 
 */

require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallSetupPermissionsAction extends BaseAction {

	function InstallSetupPermissionsAction() {
		;
	}

	function evaluateBitlevel($level,$bitlevel) {
		//si el valor que queda al restarle el nivel a evaluar es mayor o igual a cero, ese
		//nivel esta seteado
		
		if ($level == 1073741823) {
			return ($bitlevel == $level);
		}
		
		return ((intval($level) & intval($bitlevel)) > 0);
		
	}

	function getAccessToActions($actions) {
		
		$access = array();
		
		foreach ($actions as $action) {
			$lcAction = strtolower(substr($action,0,1)) . substr($action,1,strlen($action)-1);

			$securityAction = SecurityActionPeer::getByNameOrPair($lcAction);
			
		if (!empty($securityAction)) {
			//evaluacion de bitlevels
			$bitlevel = $securityAction->getAccess();
			
			$access[$action] = array();
			$access[$action]['permission'] = array();
			$access[$action]['permission'][1] = $this->evaluateBitlevel(1,$bitlevel);
			$access[$action]['permission'][2] = $this->evaluateBitlevel(2,$bitlevel);
			$access[$action]['permission'][4] = $this->evaluateBitlevel(4,$bitlevel);
			$access[$action]['permission'][all] = $this->evaluateBitlevel(1073741823,$bitlevel);

			$bitLevelAffiliate = $securityAction->getAccessAffiliateUser();
			
			$access[$action]['permissionAffiliate'] = array();
			$access[$action]['permissionAffiliate'][1] = $this->evaluateBitlevel(1,$bitLevelAffiliate);
			$access[$action]['permissionAffiliate'][2] = $this->evaluateBitlevel(2,$bitLevelAffiliate);
			$access[$action]['permissionAffiliate'][4] = $this->evaluateBitlevel(4,$bitLevelAffiliate);
			$access[$action]['permissionAffiliate'][all] = $this->evaluateBitlevel(1073741823,$bitLevelAffiliate);			

			//evaluacion de permisos booleanos
			
			$access[$action]['permissionRegistration'] = $securityAction->getAccessRegistrationUser();
			$access[$action]['noCheckLogin'] = $securityAction->getNoCheckLogin();
		}
		}

		return $access;
	}
	
	function getAccessToModule($module) {
		
		$access = array();
		
		//evaluacion de bitlevels
		$securityModule = SecurityModulePeer::getAccess($module);

		if (!empty($securityModule)) {
		
			$bitlevel = $securityModule->getAccess();
		
			$access['permissionGeneral'] = array();
			$access['permissionGeneral'][1] = $this->evaluateBitlevel(1,$bitlevel);
			$access['permissionGeneral'][2] = $this->evaluateBitlevel(2,$bitlevel);
			$access['permissionGeneral'][4] = $this->evaluateBitlevel(4,$bitlevel);
			$access['permissionGeneral'][8] = $this->evaluateBitlevel(4,$bitlevel);
			$access['permissionGeneral'][16] = $this->evaluateBitlevel(4,$bitlevel);
			$access['permissionGeneral'][all] = $this->evaluateBitlevel(1073741823,$bitlevel);

			$bitLevelAffiliate = $securityModule->getAccessAffiliateUser();
		
			$access['permissionAffiliateGeneral'] = array();
			$access['permissionAffiliateGeneral'][1] = $this->evaluateBitlevel(1,$bitLevelAffiliate);
			$access['permissionAffiliateGeneral'][2] = $this->evaluateBitlevel(2,$bitLevelAffiliate);
			$access['permissionAffiliateGeneral'][4] = $this->evaluateBitlevel(4,$bitLevelAffiliate);
			$access['permissionAffiliateGeneral'][all] = $this->evaluateBitlevel(1073741823,$bitLevelAffiliate);			

			//evaluacion de permisos booleanos
		
			$access['permissionRegistrationGeneral'] = $securityModule->getAccessRegistrationUser();
		}

		return $access;
		
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

		if (!isset($_GET['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}

		$languages = Array();
		foreach ($_GET["languages"] as $languageId) {
			$language = MultilangLanguagePeer::get($languageId);
			$languages[] = $language;
		}
		
		//buscamos todos los modulos sin instalar.

		$modulePath = "WEB-INF/classes/modules/" . $_GET['moduleName'] . "/actions/";
		$directoryHandler = opendir($modulePath);
		$actions = array();
		
		while (false !== ($filename = readdir($directoryHandler))) {
			
			//verifico si es un archivo php
			if (is_file($modulePath . $filename) && (ereg('(.*)Action.php$',$filename,$regs))) {
				array_push($actions,$regs[1]);		
			}
			
		
		}
		closedir($directoryHandler);
		
		//separacion entre accions con par y acciones sin par
		
		foreach ($actions as $action) {

			//separamos los pares de aquellos que no tienen pares
			if (ereg("(.*)([a-z]Do[A-Z])(.*)",$action,$parts)) {
				//armamos el nombre de la posible action sin do				
				$actionWithoutDo = $parts[1].$parts[2][0].$parts[2][3].$parts[3];
			
				if (in_array($actionWithoutDo,$actions)) {			

					$pairActions[$actionWithoutDo] = $action;
				}
		
			}
		}
		
		if (!empty($pairActions)) {

			$withPair = array_keys($pairActions);
			$arrays = array_diff($actions,$withPair);

			$actionsToDelete = array_merge(array_keys($pairActions), array_values($pairActions));
			$withoutPair = array_diff($actions,$actionsToDelete);
			
		}
		else {
			$withoutPair = $actions;
			$withPair = array();
		}	

		$moduleSelected = new SecurityModule();
		$smarty->assign('moduleSelected',$moduleSelected);	

		if (isset($_GET['mode']) && $_GET['mode'] == 'reinstall') {
			
			//obtenemos los permisos ya creados anteriormente.
			// TODO
			$smarty->assign('mode',$_GET['mode']);
			
			$generalAccess = $this->getAccessToModule($_GET['moduleName']);
			$withoutPairAccess = $this->getAccessToActions($withoutPair);
			$withPairAccess = $this->getAccessToActions($withPair);
			
			$moduleSelected = SecurityModulePeer::getAccess($_GET['moduleName']);
			$smarty->assign('moduleSelected',$moduleSelected);

			$smarty->assign('withoutPairAccess',$withoutPairAccess);
			$smarty->assign('withPairAccess',$withPairAccess);
			$smarty->assign('generalAccess',$generalAccess);			
			
		}
		
    	$levels = LevelPeer::getAll();
		$smarty->assign('levels',$levels);
		
		$affiliateLevels = AffiliateLevelPeer::getAll();
		$smarty->assign('affiliateLevels',$affiliateLevels);	
		
		$levelSave = 1073741823;
		$smarty->assign("levelsave",$levelSave);	
		
		$smarty->assign('withoutPair',$withoutPair);
		$smarty->assign('withPair',$withPair);
		$smarty->assign('pairActions',$pairActions);
		$smarty->assign('moduleName',$_GET['moduleName']);
		$smarty->assign('languages',$languages);
		
		return $mapping->findForwardConfig('success');
	}

}
