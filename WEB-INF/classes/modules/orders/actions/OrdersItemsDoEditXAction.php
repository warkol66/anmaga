<?php

require_once("BaseAction.php");
require_once("OrderItem.php");
require_once("OrderPeer.php");

class OrdersItemsDoEditXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersItemsDoEditXAction() {
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

		$this->template->template = "TemplateAjax.tpl";

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$modulo = "Orders";

		if (isset($_GET['orderId']) && isset($_GET['itemId']) && isset($_POST['value'])) {
					
					$item = OrderItemPeer::get($_GET['itemId']);
					$oldQuantity = $item->getQuantity();
					$order = OrderPeer::get($_GET['orderId']);
					
					if (!$order->updateQuantityItem($_GET['itemId'],$_POST['value'])) {
						$smarty->assign('value',$oldQuantity);
						return $mapping->findForwardConfig('failure');
					}
					$smarty->assign('item',$item);
					$smarty->assign('itemTotal',number_format(($item->getPrice() * $_POST['value']),2,",","."));
					$smarty->assign('value',$_POST['value']);
					$smarty->assign('order',$order);
					return $mapping->findForwardConfig('success');
					
		}

	}

}
