<?php

require_once("ImportBaseAction.php");
require_once("SupplierQuotationPeer.php");

class ImportSupplierQuoteItemsDoNegociateAction extends ImportBaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportSupplierQuoteItemsDoNegociateAction() {
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
		
		$supplierQuotationItemPeer = new SupplierQuotationItemPeer();
			
		$supplierQuotationItem = $supplierQuotationItemPeer->get($_POST['supplierQuotationItemId']);

		if (empty($supplierQuotationItem)) {
			return $mapping->findForwardConfig('failure');			
		}		
		
 		$user = Common::getAdminLogged();
		$comment = $_POST['comments'];

		$supplierQuotationItem->askFeedback($user,$comment);

		//notificamos al proveedor correspondiente
		$supplierQuotation = $supplierQuotationItem->getSupplierQuotation();
		$content = $this->renderSupplierQuotationFeedbackNotifyEmail($supplierQuotation);
		$supplierQuotation->notifyFeedbackToSupplier($content);
		
		$params = array();
		$params['id'] = $supplierQuotationItem->getSupplierQuotationId();

		return $this->addParamsToForwards($params,$mapping,'success');
		
		return $mapping->findForwardConfig('success');			
		
	}

}
