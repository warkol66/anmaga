<?php

class AffiliatesBranchsListAction extends BaseAction {

	function AffiliatesBranchsListAction() {
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
		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		$branchPeer = new AffiliateBranchPeer();

		$url = "Main.php?do=affiliatesBranchsList";

		if (!empty($_SESSION["loginUser"])) {
			if (!empty($_GET["affiliateId"])) {
				$branchPeer->setSearchAffiliateId($_GET["affiliateId"]);
				$url .= "&affiliateId=".$_GET['affiliateId'];
			}
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);
		}
		else {
			$branchPeer->setSearchAffiliateId($_SESSION["loginAffiliateUser"]->getAffiliateId());
		}

		$pager = $branchPeer->getSearchPaginated($_GET["page"]);

		$smarty->assign("branchs",$pager->getResult());
		$smarty->assign("pager",$pager);

		$smarty->assign("url",$url);

		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
