<?php
/** 
 * ConfigSetAction
 *
 * @package config 
 */

require_once("BaseAction.php");

class ConfigSetAction extends BaseAction {

	function ConfigSetAction() {
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

		//timezone
		$timezonePeer = new TimezonePeer();
		$smarty->assign("timezones",$timezonePeer->getAll());

		$colorCodes = array(1,2,3,4,5,6,7,8,9,10);		
		$smarty->assign("colorCodes",$colorCodes);

		$smarty->assign("languages",common::getAllLanguages());

		global $system;
		$smarty->assign("selectedModule",$_GET["module"]);
		if (!empty($_GET["module"])) {
			$config = array();
			$config = $system["config"][$_GET["module"]];
			$smarty->assign("config",$config);
		}

		$smarty->assign("modules",$system["config"]);
		$smarty->assign("message",$_GET["message"]);		

		return $mapping->findForwardConfig('success');
	}

}
