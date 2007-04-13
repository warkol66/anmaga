<?php

require_once("BaseAction.php");
require_once("ProductPeer.php");

class CatalogProductsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogProductsDoEditAction() {
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

		$modulo = "Products";

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un producto existente

			ProductPeer::update($_POST["id"],$_POST["code"],$_POST["name"],$_POST["description"],$_POST["price"],$_FILES["image"],$_POST["parentNodeId"]);
     	return $mapping->findForwardConfig('success');

		}
		else {
		  //estoy creando un nuevo producto

      if ( !ProductPeer::create($_POST["code"],$_POST["name"],$_POST["description"],$_POST["price"],$_FILES["image"],$_POST["parentNodeId"]) ) {
				$smarty->assign("id",$_POST["id"]);
				$smarty->assign("code",$_POST["code"]);
				$smarty->assign("name",$_POST["name"]);
				$smarty->assign("description",$_POST["description"]);
				$smarty->assign("price",$_POST["price"]);
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
      }

			return $mapping->findForwardConfig('success');
		}

	}

}
?>
