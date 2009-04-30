<?php

require_once("BaseAction.php");

class JsAction extends BaseAction {

	function JsAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);
    	/**
     	* Use a different template
     	*/
		$this->template->template = "TemplateAjax.tpl";
		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}
		
		global $moduleRootDir;
		
		if (!empty($_GET["module"])) {
			$path = $moduleRootDir . "/WEB-INF/classes/modules/" . $_GET["module"] . "/setup/" . ucfirst($_GET["module"]) . ucfirst($_GET["name"]) . ".js";
		} else {
			$path = "Common" . ucfirst($_GET["name"]) . ".js";
		}
		
		header("Content-Type: text/javascript;");
		
		$text = $smarty->display($path);

	}

}

