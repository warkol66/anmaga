<?php
require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("BranchPeer.php");


class OrdersDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoEditAction() {
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
    	$order = OrderPeer::get($_POST["orderId"]);
		
		
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

		//modificamos la orden con los datos obtenidos
		if (isset($_POST['number']))
			$order->setNumber($_POST['number']);
		if (isset($_POST['branch']))
			$order->setBranch(BranchPeer::get($_POST['branch']));
		if ( isset($_POST['created']))
			$order->setDateCreated($_POST['created']);
		//salvamos la orden
		try {
			$order->save();
		}
		catch (Exception $exp) {
			return $mapping->findForwardConfig('error');
		}
		
		//redireccionamiento
		$page = $_POST['page'];
		header("Location: Main.php?do=ordersList&message=saved&page=$page");
	}

}
