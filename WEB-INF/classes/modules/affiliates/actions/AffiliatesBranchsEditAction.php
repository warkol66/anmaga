<?php

class AffiliatesBranchsEditAction extends BaseAction {

	function AffiliatesBranchsEditAction() {
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

		$module = "Affiliates";
		$section = "Branchs";

		if (!empty($_SESSION["loginUser"])) {
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);
			$smarty->assign("all",1);
		}
		else
			$smarty->assign("all",0);

		if ( !empty($_GET["id"]) ) {
			//voy a editar un branch
			$branch = AffiliateBranchPeer::get($_GET["id"]);
			$smarty->assign("branch",$branch);
			$smarty->assign("action","edit");
		}
		else
			$smarty->assign("action","create");

		$smarty->assign("message",$_GET["message"]);
		return $mapping->findForwardConfig('success');
	}

}
