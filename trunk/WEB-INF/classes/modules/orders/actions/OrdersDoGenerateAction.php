<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");

class OrdersDoGenerateAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoGenerateAction() {
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


		$user = $_SESSION["loginUserByAffiliate"];

		$items = $_SESSION["orderItems"];

		$total = 0;
		foreach ($items as $item) {
			//Si la cantidad del producto es mayor cero
			if ($item->getQuantity() > 0)
				$total += ($item->getPrice() * $item->getQuantity());
		}

    $orderId = OrderPeer::create($_POST["number"],$user->getId(),$user->getAffiliateId(),$total,$_POST["branchId"]);
    
    if (!empty($orderId)) {
    	foreach ($items as $item) {
				//Si la cantidad del producto es mayor cero
				if ($item->getQuantity() > 0) {
					$item->setOrderId($orderId);
					$item->save();
				}
			}
    }
    $_SESSION["orderItems"] = array();
		return $mapping->findForwardConfig('success');
	}

}
?>
