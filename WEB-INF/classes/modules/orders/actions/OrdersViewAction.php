<?php
require_once("BaseAction.php");
require_once("OrderPeer.php");

class OrdersViewAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersViewAction() {
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

    	$order = OrderPeer::get($_GET["id"]);
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

    	$smarty->assign("order",$order);
		
		global $protectedWords;
		$smarty->assign("stateTexts",$protectedWords["orderStates"]);

		return $mapping->findForwardConfig('success');
	}

}
