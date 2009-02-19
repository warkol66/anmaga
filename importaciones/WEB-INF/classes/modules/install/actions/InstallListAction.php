<?php
/** 
 * InstallListAction
 *
 * @package install 
 */

require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallListAction extends BaseAction {

	function InstallListAction() {
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
		
		$message=$_GET["message"];
		$smarty->assign("message",$message);
		
		//buscamos todos los modulos sin instalar.
		
		$modulePath = "WEB-INF/classes/modules/";
		$directoryHandler = opendir($modulePath);
		$modulesToInstall = array();
		
		while (false !== ($moduleName = readdir($directoryHandler))) {

			//verifico si es un directory y no no sea ni oculto ni raiz
			if (is_dir($modulePath . $moduleName) && ($moduleName[0] != ".")) {
				//busco si el modulo esta instalado
				$result = $modulePeer->get($moduleName);
				if (empty($result)) {
					//es candidato
					array_push($modulesToInstall, $moduleName);
				}	
			
			}
			
		}
		
		closedir($directoryHandler);

		//buscamos todos los modulos instalados
		require_once('ModulePeer.php');
		
		$modulesInstalled = ModulePeer::getAll();
		
		$smarty->assign('modulesInstalled',$modulesInstalled);		
		$smarty->assign('modulesToInstall',$modulesToInstall);
		
		return $mapping->findForwardConfig('success');
	}

}
