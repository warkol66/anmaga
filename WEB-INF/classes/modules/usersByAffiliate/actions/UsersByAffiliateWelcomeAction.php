<?php

require_once("BaseAction.php");

class UsersByAffiliateWelcomeAction extends BaseAction {


	function UsersByAffiliateWelcomeAction() {
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

		$module = "UsersByAffiliate";

		return $mapping->findForwardConfig('success');
	}

}
?>
