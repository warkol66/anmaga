<?php

require_once("BaseAction.php");
require_once("TreePeer.php");

class CatalogShowAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogShowAction() {
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

		$modulo = "Catalog";
		
		$productCategories = TreePeer::getAllOnlyKind("ProductCategory");

    $smarty->assign("productCategories",$productCategories);

		if (!empty($_GET["categoryId"])) {
    	$categoryNode = NodePeer::get($_GET["categoryId"]);
      $smarty->assign("categoryNode",$categoryNode);
      $pager = $categoryNode->getChildsOnlyKindPaginated("Product",$_GET["page"]);
		}
		else {
			$pager = TreePeer::getAllRootsByKindPaginated("Product",$_GET["page"]);
		}
		
		$productNodes = $pager->getResult();
		$smarty->assign("pager",$pager);
		$url = "Main.php?do=catalogShow";
		if (!empty($categoryNode))
			$url .= "&categoryId=".$categoryNode->getId();
		$smarty->assign("url",$url);
		$smarty->assign("productNodes",$productNodes);

    $smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
?>
