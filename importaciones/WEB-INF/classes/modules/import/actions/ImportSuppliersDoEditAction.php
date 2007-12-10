<?php

require_once("BaseAction.php");
require_once("SupplierPeer.php");

class ImportSuppliersDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportSuppliersDoEditAction() {
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

		$modulo = "Suppliers";

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un supplier existente

			if ( SupplierPeer::update($_POST["id"],$_POST["name"]) )
      			return $mapping->findForwardConfig('success');

		}
		else {
		  //estoy creando un nuevo supplier

			if ( !SupplierPeer::create($_POST["name"]) ) {
				$supplier = new Supplier();
			$supplier->setid($_POST["id"]);
						$supplier->setname($_POST["name"]);
						$supplier->setactive($_POST["active"]);
							$smarty->assign("supplier",$supplier);	
				$smarty->assign("action","create");
				$smarty->assign("message","error");
				return $mapping->findForwardConfig('failure');
      }

			return $mapping->findForwardConfig('success');
		}

	}

}
?>
