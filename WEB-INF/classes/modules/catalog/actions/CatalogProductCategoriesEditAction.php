<?php

require_once("BaseAction.php");
require_once("NodePeer.php");

class CatalogProductCategoriesEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogProductCategoriesEditAction() {
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

		$moduleSection = "ProductCategories";
    $smarty->assign("moduleSection",$section);


		$smarty->assign("parentNodeId",$_GET["parentNodeId"]);

    if ( !empty($_GET["id"]) ) {
			//voy a editar un area

			$node = NodePeer::get($_GET["id"]);

			$smarty->assign("node",$node);
			$smarty->assign("parentNodeId",$node->getParentId());
			
	    $smarty->assign("action","edit");
		}
		else {
			//voy a crear un area nuevo
			
			$smarty->assign("action","create");
		}

		$smarty->assign("message",$_GET["message"]);
		$smarty->assign("loaded",$_GET["loaded"]);

		return $mapping->findForwardConfig('success');
	}

}
