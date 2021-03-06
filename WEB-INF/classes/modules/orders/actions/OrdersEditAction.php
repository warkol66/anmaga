<?php
require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("BranchPeer.php");
require_once("ProductPeer.php");

class OrdersEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersEditAction() {
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
		$section = "Orders";
		//recuperamos la orden a editar
    	$order = OrderPeer::get($_GET["id"]);
		
		$products = ProductPeer::getAllWithStock();
		$smarty->assign("products",$products);
		
		if ( empty($order) ) {
			return $mapping->findForwardConfig('notExists');
		}
		
		if (empty($_SESSION["loginUser"])) {
			if ($_SESSION["loginAffiliateUser"]->getAffiliateId() != $order->getAffiliateId())
				return $mapping->findForwardConfig('noPermission');
		}			
		
		if (empty($_SESSION["loginUser"])) {
			$smarty->assign("all",0);
		}
		else {
			$smarty->assign("all",1);
		}		

		//recuperamos todos los branches para cierto Mayorista
		$branches = BranchPeer::getAllByAffiliateId($order->getAffiliateId());

    	$smarty->assign("order",$order);
		$smarty->assign("branches",$branches);
		$smarty->assign("page",$_GET['page']);
		
		global $protectedWords;
		$smarty->assign("stateTexts",$protectedWords["orderStates"]);

		return $mapping->findForwardConfig('success');
	}

}
