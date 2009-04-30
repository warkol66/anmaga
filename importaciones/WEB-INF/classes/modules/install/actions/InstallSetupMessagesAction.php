<?php
/** 
 * InstallSetupMessagesAction
 *
 * @package install 
 */

require_once("includes/assoc_array2xml.php");
require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallSetupMessagesAction extends BaseAction {

	function InstallSetupMessagesAction() {
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
		foreach ($_GET["languages"] as $languageId) {
			$language = MultilangLanguagePeer::get($languageId);
			$languages[] = $language;
		}

		$path = "WEB-INF/classes/modules/" . $_GET['moduleName'] . "/setup/";

		$xmlBase = file_get_contents($path . 'phpmvc-config'. '-' . $_GET['moduleName'] . ".xml");
		$xml = "<root>" . $xmlBase . "</root>";

		if(!($doc = DomDocument::loadXML($xml))) {
			return $mapping->findForwardConfig('failure');			
		}
		
		$actionsMappings = $doc->getElementsByTagName('action-mappings');
		
		foreach ($actionsMappings as $actionMappings) {
		
			$actions = $actionMappings->getElementsByTagName('action');
			
			foreach ($actions as $action) {

				$actionName = $action->getAttribute('path');
				$forwards = $action->getElementsByTagName('forward');
				$messages[$actionName] = array();
				foreach ($forwards as $forward) {
					$forwardName = $forward->getAttribute('name');
					array_push($messages[$actionName],$forwardName);
				}

			}
		
		}
		
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

		$smarty->assign('actions',array_keys($filteredMessages));
		$smarty->assign('messages',$filteredMessages);
		$smarty->assign('moduleName',$_GET['moduleName']);		
		return $mapping->findForwardConfig('success');
	}

}
