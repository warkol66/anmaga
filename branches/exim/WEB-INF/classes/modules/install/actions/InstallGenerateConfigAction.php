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
		
		global $system;
		$developmentMode = $system["config"]["system"]["parameters"]["developmentMode"]["value"];

		if ($developmentMode == 'YES')
			$force_compile = 1;
		$smarty->assign("force_compile",$force_compile);
		
		
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

		$timezonePeer = new TimezonePeer();
		$timestamp = $timezonePeer->getServerTimeOnGMT0();

		rename("WEB-INF/phpmvc-config.xml", "WEB-INF/phpmvc-config-".date('Ymd_His').".xml");
		
		file_put_contents("WEB-INF/phpmvc-config.xml", $htmlResult); 
		
		return $mapping->findForwardConfig('success');
	}

}
