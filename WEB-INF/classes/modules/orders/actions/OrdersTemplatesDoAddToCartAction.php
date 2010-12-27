<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("ProductPeer.php");
require_once("OrderTemplatePeer.php");

class OrdersTemplatesDoAddToCartAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersTemplatesDoAddToCartAction() {
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
		
    $orderTemplate = OrderTemplatePeer::get($_REQUEST["id"]);
    if ( !empty($orderTemplate) ) {

			$items = $_SESSION["orderItems"];
			
			foreach ($orderTemplate->getOrderTemplateItems() as $currentItem) {
		
				//Como la cantidad en el carrito es en unidad de ventas debo dividir la cantidad por salesUnit para obtener la cantidad a mostrar en el carrito	
				$currentItemProduct = $currentItem->getProduct();				
				$productQuantity = $currentItem->getQuantity() / $currentItemProduct->getSalesUnit();
				$currentItem->setQuantity($productQuantity);			

				$found = false;
				$i = 0;
				//Busco si no esta ya este producto
				while ($i<count($items) && !$found) {
					$item = $items[$i];
					if ($item->getProductCode() == $currentItem->getProductCode()) {
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
					$orderItem->setProduct($currentItemProduct);
					$orderItem->setQuantity($currentItem->getQuantity());
		    		$orderItem->setPrice($currentItemProduct->getPrice());
					$_SESSION["orderItems"][] = $orderItem;
				}
			
			}
		
		}

		return $mapping->findForwardConfig('success');
	}

}
