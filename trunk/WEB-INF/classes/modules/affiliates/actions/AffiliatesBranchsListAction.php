<?php

require_once("BaseAction.php");
require_once("BranchPeer.php");
require_once("AffiliatePeer.php");

class AffiliatesBranchsListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function AffiliatesBranchsListAction() {
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

		$module = "Affiliates";
		$section = "Branchs";
		
		$branchPeer = new BranchPeer();
		
		$url = "Main.php?do=affiliatesBranchsList";

		if (!empty($_SESSION["loginUser"])) {
			if (!empty($_GET["affiliateId"])) {
				$branchPeer->setSearchAffiliateId($_GET["affiliateId"]);
				$url .= "&affiliateId=".$_GET['affiliateId'];			
			}		
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);			
			$smarty->assign("all",1);
		}
		else {
			$branchPeer->setSearchAffiliateId($_SESSION["loginUserByAffiliate"]->getAffiliateId());
			$smarty->assign("all",0);
		}
		
		$pager = $branchPeer->getSearchPaginated($_GET["page"]);
		
		$smarty->assign("branchs",$pager->getResult());
		$smarty->assign("pager",$pager);
		
		$smarty->assign("url",$url);		

		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
?>
