<?php
/** 
 * InstallListAction
 *
 * @package install 
 */

require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallGenerateConfigAction extends BaseAction {

	function InstallGenerateConfigAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    	BaseAction::execute($mapping, $form, $request, $response);
	
		$this->template->template = "InstallPhpmvcConfigXmlExternal.tpl";
		
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
		
		
		$modulePath = "WEB-INF/classes/modules/";
		$directoryHandler = opendir($modulePath);
		$modulesToInstall = array();
		
		$xml = "";
		
		while (false !== ($moduleName = readdir($directoryHandler))) {

			//verifico si es un directory y no no sea ni oculto ni raiz
			if (is_dir($modulePath . $moduleName) && ($moduleName[0] != ".")) {
				$moduleXml = file_get_contents($modulePath . $moduleName . "/setup/phpmvc-config-" . $moduleName . ".xml");
				$xml .= $moduleXml . "\n\n\n";			
			}
			
		}
		
		closedir($directoryHandler);

		$smarty->assign('xml',$xml);
		
		$htmlResult = $smarty->fetch("InstallGenerateConfig.tpl");
		
		file_put_contents("WEB-INF/phpmvc-config.new.xml", $htmlResult); 
		
		return $mapping->findForwardConfig('success');
	}

}
