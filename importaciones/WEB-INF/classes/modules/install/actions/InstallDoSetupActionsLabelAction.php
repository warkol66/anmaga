<?php
/** 
 * InstallDoSetupActionsLabelAction
 *
 * @package install 
 */

require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("ModuleDependency.php");

class InstallDoSetupActionsLabelAction extends BaseAction {

	function InstallDoSetupActionsLabelAction() {
		;
	}

	function executeSuccess($mapping) {
		
		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		if (isset($_POST['mode']))
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

		$module = "Install";
		$smarty->assign("module",$module);

		$modulePeer = new ModulePeer();

		if (!isset($_POST['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}

		//salto de paso
		if (isset($_POST['skip'])) {
			return $this->executeSuccess($mapping);
		}
		
		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/setup/';

		//guardado de informacion de descripcion del modulo

		$fds = Array();
		foreach ($_POST["languages"] as $languageCode) {
			$fds[$languageCode] = fopen($modulePath . 'actionLabel_'.$languageCode.'.sql','w');
			$securityActionLabel = new SecurityActionLabel();
			$sql = $securityActionLabel->getSQLCleanup($_POST['moduleName']);
			fprintf($fds[$languageCode],"%s\n",$sql);
		}
		
		foreach ($_POST["labels"] as $action => $labels) {
			foreach ($labels as $languageCode => $label) {
				$securityActionLabel = new SecurityActionLabel();
				$securityActionLabel->setAction($action);
				$securityActionLabel->setLabel($label);
				$securityActionLabel->setLanguage($languageCode);
				$sql = $securityActionLabel->getSQLInsert();
				fprintf($fds[$languageCode],"%s\n",$sql);
			}			
		}
		
		foreach ($_POST["languages"] as $languageCode) 
			fclose($fds[$languageCode]);

		//solamente se ejecuta este paso
		if (isset($_POST['stepOnly'])) {
			return $mapping->findForwardConfig('success-step');			
		}
		
		return $this->executeSuccess($mapping);
		
	}

}
