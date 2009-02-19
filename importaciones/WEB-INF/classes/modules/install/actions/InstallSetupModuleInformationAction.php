<?php
/** 
 * InstallSetupModuleInformationAction
 *
 * @package install 
 */

require_once("includes/assoc_array2xml.php");
require_once("BaseAction.php");
require_once("ModulePeer.php");

class InstallSetupModuleInformationAction extends BaseAction {

	function InstallSetupModuleInformationAction() {
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

		if (!isset($_POST['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}

		//obtengo todos los modulos para analizar sus dependencias
		$modules = $modulePeer->getAll();

		if (isset($_POST['mode']) && ($_POST['mode'] == 'reinstall')) {

			$smarty->assign('mode',$_POST['mode']);
			
			//tengo que obtener la informacion del modulo
			
			$module = $modulePeer->get($_POST['moduleName']);			
			
			if (empty($module))
				return $mapping->findForwardConfig('failure');	
			
			//sus labels correspondientes
			
			require_once('ModuleLabelPeer.php');
			
			$moduleLabelPeer = new ModuleLabelPeer();
			$englishLabels = $moduleLabelPeer->getByModuleAndLanguage($_POST['moduleName'],'eng');
			$spanishLabels = $moduleLabelPeer->getByModuleAndLanguage($_POST['moduleName'],'esp');
			
			// y sus dependencias
			
			require_once('ModuleDependencyPeer.php');
			
			$moduleDependencyPeer = new ModuleDependencyPeer();
			$dependencies = $moduleDependencyPeer->get($_POST['moduleName']); 
			
			// y los asignamos a smarty
			
			$smarty->assign('module',$module);
			$smarty->assign('englishLabel',$englishLabels);
			$smarty->assign('spanishLabel',$spanishLabels);

			if (!empty($dependencies)) {
				
				$assigned = array();
				$all = array();
				
				foreach ($dependencies as $dependency) {
					$module = $modulePeer->get($dependency->getDependence());
					$assigned[$module->getName()] = $module;
				}
				
				foreach ($modules as $module) {
					$all[$module->getName()] = $module;
				}
				
				$modules = array_diff_key($all,$assigned);
				$smarty->assign('assignedDependencyModules',$assigned);
			}
			
		}
		
		$smarty->assign('dependencyModules',$modules);
		
		$smarty->assign('moduleName',$_POST['moduleName']);
		
		return $mapping->findForwardConfig('success');
	}

}
