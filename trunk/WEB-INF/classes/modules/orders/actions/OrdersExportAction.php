<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("AffiliatePeer.php");

class OrdersExportAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersExportAction() {
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
	
		$this->template->template = "TemplateCsv.tpl";	

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

		if (!empty($_SESSION["loginUser"])) {
			$userId = $_SESSION["loginUser"]->getId();
			$affiliateId = 0;
		}

		global $system;
		$exportComment = $system['config']['orders']['exportComment'];

		$orderPeer = new OrderPeer();
		
		$idOrders = $_REQUEST["orders"];
		
		$orders = array();
		foreach ($idOrders as $id) {
			$order = OrderPeer::get($id);
			if (!empty($order) && ( !empty($_SESSION["loginUser"]) || ( empty($_SESSION["loginUser"]) && ($_SESSION["loginAffiliateUser"]->getAffiliateId() == $order->getAffiliateId()) ) ) ) {
				$orders[] = $order;
				$order->setState(OrderPeer::STATE_EXPORTED);
				$order->save();
				OrderStateChangePeer::create($id,$userId,$affiliateId,OrderPeer::STATE_EXPORTED,$exportComment);	
			}						
		}
		
		$smarty->assign("orders",$orders);
		
		$articlesPerOrder = $system['config']['orders']['articlesPerOrder'];
		$smarty->assign("articlesPerOrder",$articlesPerOrder);

		header("content-Type:text/html; charset=windows-1252"); 		
		header("content-disposition: attachment; filename=orders.xml");

		return $mapping->findForwardConfig('success');
	}

}
