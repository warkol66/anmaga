<?php
/** 
 * ConfigEditAction
 *
 * @package config 
 */

require_once("BaseAction.php");

class ConfigEditAction extends BaseAction {

	function ConfigEditAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

		BaseAction::execute($mapping, $form, $request, $response);

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Config";

		$smarty->assign("module",$module);
		global $system;
		$smarty->assign("config",$system["config"]);

		return $mapping->findForwardConfig('success');
	}

}
