<?php

require_once("BaseAction.php");
require_once("ClientQuotationPeer.php");

class ImportClientQuoteConfirmAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportClientConfirmListAction() {
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
		
		if (Common::isAffiliatedUser()) {
			//Traemos todas las cotizaciones de ese afiliado.
			$affiliate = Common::getAffiliatedLogged();
			
			if (empty($_GET['id'])) {
				//se esta editando una clientQuotation recien creada
				$clientQuotation = $_SESSION['import']['clientQuotation'];
			}
			else {
				$clientQuotation = $affiliate->getClientQuotation($_POST['clientQuotationId']);
			}
			
			if (empty($clientQuotation)) {
				return $mapping->findForwardConfig('failure');
			}
	
			if (!$clientQuotation->clientConfirm()) {
				return $mapping->findForwardConfig('failure');
			}
			
			$params = array();
			$params['clientQuotationId'] = $clientQuotation->getId();
			return $this->addParamsToForwards($params,$mapping,'success');
			
		}
		
		if (Common::isAdmin()) {

			if (empty($_GET['id'])) {
				//se esta editando una clientQuotation recien creada
				$clientQuotation = $_SESSION['import']['clientQuotation'];
			}
			else {
				//se esta editando una clientQuotation existente
				$clientQuotation = $clientQuotationPeer->get($_POST['clientQuotationId']);
			}

			if (empty($clientQuotation)) {
				return $mapping->findForwardConfig('failure');
			}
	
			if (!$clientQuotation->clientConfirm()) {
				return $mapping->findForwardConfig('failure');
			}
			
			$_SESSION['import']['clientQuotation'] = '';
			
			$params = array();
			$params['clientQuotationId'] = $clientQuotation->getId();
			return $this->addParamsToForwards($params,$mapping,'success');

			
		}
		
		return $mapping->findForwardConfig('failure');
		
	}

}
