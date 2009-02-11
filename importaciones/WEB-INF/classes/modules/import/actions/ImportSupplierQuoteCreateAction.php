<?php

require_once("BaseAction.php");
require_once("ClientQuotationPeer.php");

class ImportSupplierQuoteCreateAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportSupplierQuoteCreateAction() {
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

		$module = "Import";
		$smarty->assign('module',$module);
		
		if (empty($_POST['clientQuotationId']) || empty($_POST['supplierId']) || empty($_POST['clientQuoteItems'])) {
			return $mapping->findForwardConfig('failure');
		}
		
		//obtenemos la cotizacion de cliente a procesar
		$clientQuotation = ClientQuotationPeer::get($_POST['clientQuotationId']);

		//obtenemos la informacion del proveedor
		$supplier = SupplierPeer::get($_POST['supplierId']);


		if (empty($clientQuotation) || empty($supplier)) {
			return $mapping->findForwardConfig('failure');
		}

		//obtenemos los items a cotizar de la cotizacion de cliente para generar la cotizacion de proveedor
		$clientQuotationSelectedItems = array();

		foreach ($_POST['clientQuoteItems'] as $key) {
			
			$item = $clientQuotation->getClientQuotationItem($key);
			
			if (!empty($item)){
				array_push($clientQuotationSelectedItems,$item);
			}
		}

		if (empty($clientQuotationSelectedItems)) {
			//caso en que no se hayan indicado elementos para procesar
			return $mapping->findForwardConfig('failure');
		}
		
		//generamos la supplierQuotation
		
		$supplierQuotation = SupplierQuotationPeer::createFromClientQuotation($supplier,$clientQuotation,$clientQuotationSelectedItems);

		$params = array();
		$params['id'] = $clientQuotation->getId();
		$params['supplierQuotationId'] = $supplierQuotation->getId();
		
		return $this->addParamsToForwards($params,$mapping,'success');
		
	}

}
