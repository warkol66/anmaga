<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("ProductPeer.php");
require_once("BranchPeer.php");

class OrdersConfirmAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersConfirmAction() {
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
		
		if (Common::isSystemUser()) {
			$affiliateId = $_REQUEST["affiliateId"];
			require_once("AffiliatePeer.php");
			$affiliate = AffiliatePeer::get($affiliateId);
			$smarty->assign("affiliate",$affiliate);
		}
		else
			$affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();

		if (empty($affiliateId))
			return $mapping->findForwardConfig('failure');
		
		$branchs = BranchPeer::getAllByAffiliateId($affiliateId);
		$smarty->assign("branchs",$branchs);		

		$orderItems = $_SESSION["orderItems"];
		$smarty->assign("orderItems",$orderItems);


		return $mapping->findForwardConfig('success');
	}

}
