<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("AffiliatePeer.php");

class OrdersDoDeleteAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoDeleteAction() {
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

		$orderPeer = new OrderPeer();
		
		$idOrders = $_REQUEST["orders"];
		
		$orders = array();
		foreach ($idOrders as $id) {
			$order = OrderPeer::get($id);
			if (!empty($order) && ( !empty($_SESSION["loginUser"]) || ( empty($_SESSION["loginUser"]) && ($_SESSION["loginAffiliateUser"]->getAffiliateId() == $order->getAffiliateId()) ) ) ) {
				
				try {
					$order->delete();
				}
				catch (PropelException $exp) {
					return $mapping->findForwardConfig('failure');
				}
			}						
		}
		
		$smarty->assign("message","orders_deleted_ok");
		return $mapping->findForwardConfig('success');
	}

}
