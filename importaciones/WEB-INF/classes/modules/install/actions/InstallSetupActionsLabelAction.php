<?php
/** 
 * InstallSetupActionsLabelAction
 *
 * @package install 
 */

require_once("includes/assoc_array2xml.php");
require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallSetupActionsLabelAction extends BaseAction {

	function InstallSetupActionsLabelAction() {
		;
	}

	function filterMessages($module,$messages) {

		$path = "WEB-INF/classes/modules/" . $module . "/actions/";

		$filteredMessages = array();

		foreach ($messages as $key => $value) {
			$actionFile = $path . ucfirst($key) . 'Action.php';
			$actionFileContents = '';
			$actionFileContents = file_get_contents($actionFile);
			if (preg_match('(Common::doLog)',$actionFileContents) >= 1) {	
				$filteredMessages["$key"] = $value;
			}
		}
		
		return $filteredMessages;
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
		foreach ($_GET["languages"] as $languageCode) {
			$language = MultilangLanguagePeer::getLanguageByCode($languageCode);
			$languages[] = $language;
		}
		
		//buscamos todos los actions sin instalar.

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

		$totalActions = array_merge($withPair,$withoutPair);

		
		if (isset($_GET['mode']) && $_GET['mode'] == 'reinstall') {
			
			$smarty->assign('mode',$_GET['mode']);
			
			require_once('ActionLogLabelPeer.php');
			
			$actualMessages = array();
			
			foreach ($messages as $action => $forwards) {
				
				foreach ($forwards as $forward) {
					
					foreach ($languages as $language) {
						$actionLogLabel = ActionLogLabelPeer::getAllByInfo($action,$forward,$language->getCode());
						if (!empty($actionLogLabel))
							$actualMessages[$action][$forward][$language->getCode()] = $actionLogLabel->getLabel();
					}
				}
			}
			$smarty->assign('actualMessages',$actualMessages);
		}
		
		//filtramos aquellos actions que no tienen acciones de log.
		$filteredMessages = $this->filterMessages($_GET['moduleName'],$messages);

		$smarty->assign("languages",$languages);

		$smarty->assign('actions',$totalActions);
		$smarty->assign('messages',$filteredMessages);
		$smarty->assign('moduleName',$_GET['moduleName']);		
		return $mapping->findForwardConfig('success');
	}

}
