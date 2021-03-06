<?php

require_once("BaseAction.php");

class ConfigDoSetAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ConfigDoSetAction() {
		;
	}


	// ----- Public Methods ------------------------------------------------- //

	/**
	* Process the specified HTTP request, and create the corresponding HTTP
	* response (or forward to another web component that will create it).
	* Return an <code>ActionForward</code> instance describing where and how
	* control should be forwarded, or <code>NULL</code> if the response has
	* already been completed.
	*
	* @param ActionConfig		The ActionConfig (mapping) used to select this instance
	* @param ActionForm			The optional ActionForm bean for this request (if any)
	* @param HttpRequestBase	The HTTP request we are processing
	* @param HttpRequestBase	The HTTP response we are creating
	* @public
	* @returns ActionForward
	*/
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
		if (empty($_POST["module"]))
			$system["config"] = $_POST["config"];
		else
			$system["config"][$_POST["module"]] = $_POST["config"][$_POST["module"]];

		require_once('includes/assoc_array2xml.php');
		$converter= new assoc_array2xml;
		$xml = $converter->array2xml($system["config"]);
		file_put_contents("config/config.xml",$xml);

		//Cambiamos opciones de Configuracion Generales del sistema al modificarse en la configuracion
		
		//Error Reporting
  	  	$level = $system["config"]["system"]["errorReporting"]["value"];
	  	if ($level == "") {
	  		$level = 0;
	  	}
	  	error_reporting($level);		

		return $mapping->findForwardConfig('success');
	}

}
?>
