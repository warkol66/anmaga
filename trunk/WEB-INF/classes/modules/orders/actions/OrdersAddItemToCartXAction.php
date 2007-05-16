<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("ProductPeer.php");

class OrdersAddItemToCartXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersAddItemToCartXAction() {
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
		//Busco si no esta ya este producto
		while ($i<count($items) && !$found) {
			$item = $items[$i];
			if ($item->getProductId() == $_POST["productId"]) {
				$actualQuantity = $item->getQuantity();
				$item->setQuantity($actualQuantity + $_POST["quantity"]);
				$_SESSION["orderItems"][$i] = $item;
				$found = true;
			}
			$i++;
		}
		//Si no estaba, lo agrego
		if (!$found) {
			$orderItem = new OrderItem();
			$orderItem->setProductId($_POST["productId"]);
			$orderItem->setQuantity($_POST["quantity"]);
    	$product = ProductPeer::get($orderItem->getProductId());
    	$orderItem->setProduct($product);
    	$orderItem->setPrice($product->getPrice());
			$_SESSION["orderItems"][] = $orderItem;
		}

		return $mapping->findForwardConfig('success');
	}

}
?>
