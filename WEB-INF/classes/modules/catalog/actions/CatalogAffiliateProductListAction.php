<?php

require_once("BaseAction.php");
require_once("TreePeer.php");
require_once("AffiliatePeer.php");

class CatalogAffiliateProductListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogAffiliateProductListAction() {
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

		$module = "Catalog";
	  	$smarty->assign("module",$module);
		
		//buscamos los afiliados
		$affiliates = AffiliatePeer::getAll();
		$smarty->assign('affiliates',$affiliates);
				
		$productCategories = TreePeer::getAllOnlyKind("ProductCategory");
		$smarty->assign("productCategories",$productCategories);
		
		if (!empty($_GET['affiliateId'])) {		
				
			
			$pager = TreePeer::getAllByAffiliatePaginated($_GET['affiliateId'],$_GET["page"]);
			
			$productNodes = $pager->getResult();
			$smarty->assign("pager",$pager);
			$url = "Main.php?do=catalogAffiliateProductList&affiliateId=" . $_GET['affiliateId'];
			$smarty->assign("url",$url);
			$smarty->assign("productNodes",$productNodes);
			$smarty->assign("affiliateId",$_GET['affiliateId']);
		}
		
		return $mapping->findForwardConfig('success');
		
	}

}
