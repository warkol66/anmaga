<?php

class ImportShipmentsListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportShipmentsListAction() {
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

		$filterValues = array('searchSupplierId','searchStatus');
		$shipmentPeer = $this->processFilters($shipmentPeer,$filterValues,$smarty);

		$pager = $shipmentPeer->getAllPaginatedFiltered($_GET["page"]);

		$suppliers = SupplierPeer::getAll();
	
		$url = "Main.php?do=importShipmentsList";			
		$url = $this->addFiltersToUrl($url);
		$smarty->assign("url",$url);

		$smarty->assign("shipments",$pager->getResult());
		$smarty->assign("suppliers",$suppliers);
		$smarty->assign("status",$shipmentPeer->getStatusNames());
		$smarty->assign("pager",$pager);

		return $mapping->findForwardConfig('success');
		
	}

}
