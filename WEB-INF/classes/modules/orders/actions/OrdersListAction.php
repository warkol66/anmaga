<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("AffiliatePeer.php");

class OrdersListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersListAction() {
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

		$module = "Orders";
		$smarty->assign("module",$module);

		$orderPeer = new OrderPeer();
		
		$url = "Main.php?do=ordersList";		

		if (empty($_SESSION["loginUser"])) {
			$orderPeer->setSearchAffiliateId($_SESSION["loginAffiliateUser"]->getAffiliateId());
			$smarty->assign("all",0);
		}
		else {
			if (!empty($_GET["affiliateId"])) {
				$orderPeer->setSearchAffiliateId($_GET["affiliateId"]);
				$url .= "&affiliateId=".$_GET['affiliateId'];
				$smarty->assign("selectedAffiliateId",$_GET["affiliateId"]);	
			}
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);
			$smarty->assign("all",1);
		}
		
		if (!empty($_GET["dateFrom"])) {
			$orderPeer->setSearchDateFrom(Common::usDateToDbDate($_GET["dateFrom"]));
			$url .= "&dateFrom=".$_GET['dateFrom'];
			$smarty->assign("selectedDateFrom",$_GET["dateFrom"]);	
		}
		
		if (!empty($_GET["state"]) || $_GET["state"] == "0") {
			$orderPeer->setSearchState($_GET["state"]);
			$url .= "&state=".$_GET['state'];
			$smarty->assign("selectedState",$_GET["state"]);	
		}		

		if (!empty($_GET["dateTo"])) {
			$orderPeer->setSearchDateTo(Common::usDateToDbDate($_GET["dateTo"]));						
			$url .= "&dateTo=".$_GET['dateTo'];
			$smarty->assign("selectedDateTo",$_GET["dateTo"]);	
		}
			
		$pager = $orderPeer->getSearchPaginated($_GET["page"]);
		
		$smarty->assign("orders",$pager->getResult());
		$smarty->assign("pager",$pager);
		$smarty->assign("page",$_GET["page"]);
		$smarty->assign("url",$url);

    	$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
