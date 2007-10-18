<?php
require_once 'Action.php';
require_once 'BaseAction.php';
require_once("AffiliatePeer.php");
require_once("AffiliateInfoPeer.php");;

class CatalogAffiliateProductsImportAction extends BaseAction {

	/**
	 * Constructor
	 *
	 */
	function CatalogAffiliateProductsImportAction() {
	}

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
		
		$module = "Catalog";
		
		//obtenemos todos los afiliados posibles
		$affiliatePeer = new AffiliatePeer();
		$result = $affiliatePeer->getAll();
		
		$smarty->assign('affiliates',$result);
		
		return $mapping->findForwardConfig('success');
		
		
	}
}

?>
