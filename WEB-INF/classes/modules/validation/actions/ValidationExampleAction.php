<?php

require_once("BaseAction.php");

class ValidationExampleAction extends BaseAction {

	function ValidationExampleAction() {
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

			$module = "Validation";
			$smarty->assign('module',$module);
		
			return $mapping->findForwardConfig('success');
	}

}
