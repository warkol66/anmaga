<?php

require_once("BaseAction.php");
require_once("SupplierPurchaseOrderBankTransfer.php");
require_once("SupplierPurchaseOrderBankTransferPeer.php");
require_once("SupplierPurchaseOrderPeer.php");
require_once("BankAccountPeer.php");
require_once("SupplierPeer.php");

class ImportBankTransferEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportBankTransferEditAction() {
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
		$section = "BankTransfer";
		$smarty->assign('section',$section);
		
		$supplierOrders = SupplierPurchaseOrderPeer::getAll();
		$smarty->assign("supplierOrders",$supplierOrders);
		$suppliers = SupplierPeer::getAll();
		$smarty->assign("suppliers",$suppliers);
		$bankAccounts = BankAccountPeer::getAll();
		$smarty->assign("bankAccounts",$bankAccounts);

	    if ( !empty($_GET["id"]) ) {
			$transfer = SupplierPurchaseOrderBankTransferPeer::get($_GET["id"]);
			$smarty->assign("transfer",$transfer);															
	    	$smarty->assign("action","edit");
		}
		else {
			//voy a crear un product nuevo
			$transfer = new SupplierPurchaseOrderBankTransfer();
			$smarty->assign("transfer",$transfer);												
			$smarty->assign("action","create");
		}

		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}	

}
