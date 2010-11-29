<?php
/** 
 * ConfigDoEditAction
 *
 * @package config 
 */

require_once("BaseAction.php");

class ConfigDoEditAction extends BaseAction {

	function ConfigDoEditAction() {
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
		$system["config"] = $_POST["config"];
		require_once('includes/assoc_array2xml.php');
		$converter= new assoc_array2xml;
		$xml = $converter->array2xml($system["config"]);
		file_put_contents("config/config.xml",$xml);

		return $mapping->findForwardConfig('success');
	}

}
