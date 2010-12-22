<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("ProductPeer.php");

class OrdersChangeItemCartXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersChangeItemCartXAction() {
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
    
		$this->template->template = "template_ajax.tpl";

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$modulo = "Orders";
		
		$items = $_SESSION["orderItems"];

		$found = false;
		$i = 0;
		//Busco el producto
		while ($i<count($items) && !$found) {
			$item = $items[$i];
			if ($item->getProductId() == $_POST["productId"]) {
				$item->setQuantity($_POST["quantity"]);
    			$_SESSION["orderItems"][$i] = $item;
				$found = true;
			}
			$i++;
		}
		//Si no estaba, no hago nada
		if (!$found) {

		} else {
			$items = $_SESSION["orderItems"];
			$total = 0;
			foreach ($items as $item) {
				if (!empty($item)) {
					$product = $item->getProduct();
					$total += ( $product->getPrice() * $product->getSalesUnit() * $item->getQuantity() );
				}
			}
			$smarty->assign("total",$total);		
		}

		return $mapping->findForwardConfig('success');
	}

}
