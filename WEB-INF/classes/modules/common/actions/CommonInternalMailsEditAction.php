<?php

class CommonInternalMailsEditAction extends BaseAction {

	function CommonInternalMailsEditAction() {
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
		
		$internalMail = InternalMailPeer::get($_GET["id"]);
		if (empty($internalMail))
			$internalMail = new InternalMail;
		
		$smarty->assign("internalMail", $internalMail);

		$smarty->assign("filters", $_GET["filters"]);
		$smarty->assign("page", $_GET["page"]);
		$smarty->assign("message", $_GET["message"]);

		return $mapping->findForwardConfig('success');
	}
}
