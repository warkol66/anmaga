<?php

class ImportShipmentsEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportShipmentsEditAction() {
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

		$shipmentPeer = new ShipmentPeer();
		$supplierPurchaseOrderPeer = new SupplierPurchaseOrderPeer();

		if (!empty($_GET["id"])) {
			$shipment = $shipmentPeer->get($_GET["id"]);
		} else {
			$shipment = new Shipment();
			if (!empty($_GET["supplierPurchaseOrderId"])) {
				$supplierPurchaseOrder = $supplierPurchaseOrderPeer->get($_GET["supplierPurchaseOrderId"]);
				$shipment->setSupplierPurchaseOrder($supplierPurchaseOrder);
			} else {
				return $mapping->findForwardConfig('failure');
			}
		}
		
		$smarty->assign("shipment",$shipment);

		return $mapping->findForwardConfig('success');	
	}
}