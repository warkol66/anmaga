<?php

require_once("BaseAction.php");

class UsersByAffiliateLoginAction extends BaseAction {


	function UsersByAffiliateLoginAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);
    	/**
     	* Use a different template
     	*/
		$this->template->template = "TemplateLogin.tpl";
		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "UsersByAffiliate";

		$message=$_GET["message"];
		$smarty->assign("message",$message);

		return $mapping->findForwardConfig('success');
	}

}
?>
