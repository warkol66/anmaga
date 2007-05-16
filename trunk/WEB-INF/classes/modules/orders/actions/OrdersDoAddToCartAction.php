<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("ProductPeer.php");
require_once("OrderPeer.php");

class OrdersDoAddToCartAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoAddToCartAction() {
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

		$module = "Orders";
		$section = "Templates";
		
    $order = OrderPeer::get($_GET["id"]);
    if ( !empty($order) ) {

			$items = $_SESSION["orderItems"];


			foreach ($order->getOrderItems() as $currentItem) {

				$found = false;
				$i = 0;
				//Busco si no esta ya este producto
				while ($i<count($items) && !$found) {
					$item = $items[$i];
					if ($item->getProductId() == $currentItem->getProductId()) {
						$actualQuantity = $item->getQuantity();
						$item->setQuantity($actualQuantity + $currentItem->getQuantity());
						$_SESSION["orderItems"][$i] = $item;
						$found = true;
					}
					$i++;
				}
				//Si no estaba, lo agrego
				if (!$found) {
					$orderItem = new OrderItem();
					$orderItem->setProductId($currentItem->getProductId());
					$orderItem->setQuantity($currentItem->getQuantity());
		    	$product = ProductPeer::get($orderItem->getProductId());
		    	$orderItem->setProduct($product);
		    	$orderItem->setPrice($product->getPrice());
					$_SESSION["orderItems"][] = $orderItem;
				}
			
			}
		
		}

		return $mapping->findForwardConfig('success');
	}

}
?>
