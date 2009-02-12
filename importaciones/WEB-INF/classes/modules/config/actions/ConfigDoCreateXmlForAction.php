<?php
/** 
 * ConfigDoCreateXmlForAction
 *
 * @package config 
 */

require_once("BaseAction.php");

class ConfigDoCreateXmlForAction extends BaseAction {

	function ConfigDoCreateXmlForAction() {
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

		$selectedModule=$_POST["module"];

		require_once('includes/assoc_array2xml.php');
		$converter= new assoc_array2xml;

		$config=$_POST["config"];
		$newActionArray=$_POST["configb"];

		$originalActionArray=$config["$selectedModule"]["moduleInstalation"]["moduleInstalation:actions"];

		if(empty ( $originalActionArray ) ) 
			$originalActionArray= array();

		$fusionActionArray=array_merge ($originalActionArray,$newActionArray );

		$config["$selectedModule"]["moduleInstalation"]["moduleInstalation:actions"]=$fusionActionArray;

		$xml = $converter->array2xml($config);


		//////////
		// incluir este path en la version final en file_put_contents
		$path = "WEB-INF/classes/modules/$selectedModule/$selectedModule.xml";

		file_put_contents("config/configXX.xml",$xml);


		return $mapping->findForwardConfig('success');
	}

}
