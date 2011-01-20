<?php

class AffiliatesBranchsDoEditAction extends BaseAction {

	function AffiliatesBranchsDoEditAction() {
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
			$affiliateId = $_POST["affiliateId"];
		}
		else {
			$affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();
			$smarty->assign("all",0);
		}

		if ( $_POST["action"] == "edit" ) {
			if ( AffiliateBranchPeer::update($_POST["id"],$affiliateId,$_POST["number"],$_POST["name"],$_POST["phone"],$_POST["contact"],$_POST["contactEmail"],$_POST["memo"],$_POST["code"]) )
				return $mapping->findForwardConfig('success');
			else
				return $mapping->findForwardConfig('success');
		}
		else {
			//estoy creando un nuevo branch

			if ( !AffiliateBranchPeer::create($affiliateId,$_POST["number"],$_POST["name"],$_POST["phone"],$_POST["contact"],$_POST["contactEmail"],$_POST["memo"],$_POST["code"]) ) {
				$smarty->assign("id",$_POST["id"]);
				$smarty->assign("affiliateId",$_POST["affiliateId"]);
				$smarty->assign("number",$_POST["number"]);
				$smarty->assign("name",$_POST["name"]);
				$smarty->assign("phone",$_POST["phone"]);
				$smarty->assign("contact",$_POST["contact"]);
				$smarty->assign("contactEmail",$_POST["contactEmail"]);
				$smarty->assign("memo",$_POST["memo"]);
				$smarty->assign("code",$_POST["code"]);
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
			}

			return $mapping->findForwardConfig('success');
		}

	}

}