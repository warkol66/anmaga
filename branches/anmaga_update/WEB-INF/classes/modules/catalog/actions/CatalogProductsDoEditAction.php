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

		$module = "Catalog";
    $smarty->assign("module",$module);

		$moduleSection = "Products";
    $smarty->assign("moduleSection",$section);


		if ( $_POST["action"] == "edit" ) {
			//estoy editando un producto existente

			$price = Common::convertToMysqlNumericFormat($_POST["price"]);

			ProductPeer::update($_POST["id"],$_POST["code"],$_POST["name"],$_POST["description"],$price,$_FILES["image"],$_POST["parentNodeId"],$_POST["unitId"],$_POST["measureUnitId"],$_POST["orderCode"],$_POST["salesUnit"]);
     	return $mapping->findForwardConfig('success');

		}
		else {
		  //estoy creando un nuevo producto

			$price = Common::convertToMysqlNumericFormat($_POST["price"]);

      if ( !ProductPeer::create($_POST["code"],$_POST["name"],$_POST["description"],$price,$_FILES["image"],$_POST["parentNodeId"],$_POST["unitId"],$_POST["measureUnitId"],$_POST["orderCode"],$_POST["salesUnit"]) ) {
				return $mapping->findForwardConfig('failure');
      }

			return $mapping->findForwardConfig('success');
		}

	}

}
