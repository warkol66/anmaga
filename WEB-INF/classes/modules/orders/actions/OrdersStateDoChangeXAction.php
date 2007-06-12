<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("OrderStateChangePeer.php");

class OrdersStateDoChangeXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersStateDoChangeXAction() {
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
    
		$this->template->template = "template_ajax.tpl";

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$modulo = "Orders";
		
		if (!empty($_SESSION["loginUser"])) {
			$userId = $_SESSION["loginUser"]->getId();
			$affiliateId = 0;
		}
		else {
			$userId = $_SESSION["loginUserByAffiliate"]->getId();
			$affiliateId = $_SESSION["loginUserByAffiliate"]->getAffiliateId();
		} 
				
		$order = OrderPeer::get($_POST["orderId"]);
		
		if ( empty($order) ) {
			return $mapping->findForwardConfig('notExists');
		}		
		
		if (empty($_SESSION["loginUser"])) {
			if ($_SESSION["loginUserByAffiliate"]->getAffiliateId() != $order->getAffiliateId())
				return $mapping->findForwardConfig('noPermission');
		}			
		
		if ( !empty($order) && !empty($_POST["orderId"]) && $_POST["state"] != "" ) {
			$stateChange = OrderStateChangePeer::create($_POST["orderId"],$userId,$affiliateId,$_POST["state"],$_POST["comment"]);
			$order->setState($_POST["state"]);
			$order->save();
			$smarty->assign("stateChange",$stateChange);
			$smarty->assign("state",$_POST["state"]);
			$smarty->assign("stateName",OrderPeer::getStateNameFromNumber($_POST["state"]));
			return $mapping->findForwardConfig('success');
		}
		
		return $mapping->findForwardConfig('failure');
	}

}
