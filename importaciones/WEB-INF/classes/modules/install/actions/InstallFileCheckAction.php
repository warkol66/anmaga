<?php
/** 
 * InstallFileCheckAction
 *
 * @package install 
 */

require_once("includes/assoc_array2xml.php");
require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallFileCheckAction extends BaseAction {

	function InstallFileCheckAction() {
		;
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

		$path = "WEB-INF/classes/modules/" . $_GET['moduleName'] . "/";
		$phpConfigXMLContent = file_exists($path . "phpmvc-config-" . $_GET['moduleName'] . ".xml");
 		$modulePathsContent = file_exists($path . "ModulePaths-" . $_GET['moduleName'] . ".php");
 		
 		//archivos generados durante la instalacion
 		
 		$information = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . 'information.sql');
 		$permissions = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . $_GET['moduleName'] . '-permissions.sql');
 		
 		$messages = file_get_contents("WEB-INF/classes/modules/" . $_GET['moduleName'] . "/" . 'messages.sql');
 		
		$smarty->assign('phpConfigXMLContent',$phpConfigXMLContent);
		$smarty->assign('modulePathsContent',$modulePathsContent);
		$smarty->assign('information',$information);
		$smarty->assign('permissions',$permissions);
		$smarty->assign('messages',$messages);
		$smarty->assign('moduleName',$_GET['moduleName']);
		return $mapping->findForwardConfig('success');
	}

}
