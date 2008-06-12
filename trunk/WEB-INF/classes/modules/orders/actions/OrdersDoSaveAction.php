<?php

require_once("BaseAction.php");
require_once("OrderTemplatePeer.php");
require_once("OrderTemplateItemPeer.php");

class OrdersDoSaveAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoSaveAction() {
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
		$smarty->assign("module",$module);

		$user = $_SESSION["loginAffiliateUser"];

		$items = $_SESSION["orderItems"];

		$total = 0;
		foreach ($items as $item) {
			//Si la cantidad del producto es mayor cero
			if ($item->getQuantity() > 0) {
				//Como la cantidad es en unidad de ventas debo multiplicar la cantidad por salesUnit para obtener la cantidad real
				$product = $item->getProduct();
				$productQuantity = $product->getSalesUnit() * $item->getQuantity();
				$item->setQuantity($productQuantity);				 
				$total += ($item->getPrice() * $item->getQuantity());
			}
		}

    $orderId = OrderTemplatePeer::create($_POST["name"],$user->getId(),$user->getAffiliateId(),$total);
    
    if (!empty($orderId)) {
    	foreach ($items as $item) {
				//Si la cantidad del producto es mayor cero
				if ($item->getQuantity() > 0) {
					$templateItem = $item->getOrderTemplateItem();
					$templateItem->setOrderTemplateId($orderId);
					$templateItem->save();
				}
			}
    }
    $_SESSION["orderItems"] = array();
		return $mapping->findForwardConfig('success');
	}

}
