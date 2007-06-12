<?php

require_once("BaseAction.php");
require_once("ProductPeer.php");
require_once("TreePeer.php");

class CatalogProductsListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogProductsListAction() {
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

		$moduleSection = "Products";
    $smarty->assign("moduleSection",$section);
		
		$smarty->assign("parentNodeId",$_GET["parentNodeId"]);	
		$smarty->assign("priceFrom",$_GET["priceFrom"]);
		$smarty->assign("priceTo",$_GET["priceTo"]);

		$productCategories = TreePeer::getAllOnlyKind("ProductCategory");
    $smarty->assign("productCategories",$productCategories);

		$productPeer = new ProductPeer();
		
		if ($_GET["csv"] == "1") {
			$products = $productPeer->getAllNodes();
			$smarty->assign("products",$products);
			$this->template->template = "TemplateCsv.tpl";	
			header("content-disposition: attachment; filename=products.csv");
			header("Content-type: text/csv; charset=UTF-8");			
			return $mapping->findForwardConfig('csv');
		}
		

		if (!empty($_GET["priceFrom"]))
			$productPeer->setSearchPriceFrom($_GET["priceFrom"]);
		if (!empty($_GET["priceTo"]))
			$productPeer->setSearchPriceTo($_GET["priceTo"]);
		if (!empty($_GET["parentNodeId"]))
			$productPeer->setSearchParentNodeId($_GET["parentNodeId"]);

    $pager = $productPeer->getAllNodesPaginated($_GET["page"]);

		$smarty->assign("products",$pager->getResult());
		$smarty->assign("pager",$pager);
		$url = "Main.php?do=catalogProductsList&parentNodeId=".$_GET["parentNodeId"]."&priceFrom=".$_GET["priceFrom"]."&priceTo=".$_GET["priceTo"];
		$smarty->assign("url",$url);

    $smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
