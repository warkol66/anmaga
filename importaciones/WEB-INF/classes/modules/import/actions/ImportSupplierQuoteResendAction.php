<?php

require_once("ImportBaseAction.php");
require_once("SupplierQuotationPeer.php");

class ImportSupplierQuoteResendAction extends ImportBaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportSupplierQuoteResendAction() {
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
		
		$smarty->assign("message",$_POST["message"]);
		
		$supplierQuotationPeer = new SupplierQuotationPeer();

		if (empty($_POST['id'])) {
			return $mapping->findForwardConfig('failure');		
		}
		
		$supplierQuotation = SupplierQuotationPeer::get($_POST['id']);
		
		$content = $this->renderSupplierQuotationNotifyEmail($supplierQuotation);
		
		if (empty($_POST['destinationEmails']))	{
			//notificacion de proveedor correspondiente
			$supplierQuotation->notifySupplier($content);

			$params = array();
			$params['supplierQuotationId'] = $supplierQuotation->getId();

			return $this->addParamsToForwards($params,$mapping,'success');			

		}

		//notificacion de multiples emails ingresados
		
		//procesamiento de los emails
		$emails = split(',',$_POST['destinationEmails']);
		$validEmails = array();
		//validacion de los emails
		foreach ($emails as $email) {
			if (Common::validateEmail(trim($email))) {
				$validEmails[] = trim($email);
			}
		}

		foreach ($validEmails as $email) {
			$supplierQuotation->notifyRecipients($validEmails,$content);
		}

		$params = array();
		$params['supplierQuotationId'] = $supplierQuotation->getId();
		
		return $this->addParamsToForwards($params,$mapping,'success-multiple');			
		
	}

}
