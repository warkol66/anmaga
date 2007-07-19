<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("OrderItemPeer.php");
require_once("AffiliatePeer.php");

class OrdersDoImportAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoImportAction() {
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
		
		if (!empty($_SESSION["loginUser"])) {
			$affiliateId = $_POST["affiliateId"];
			$affiliate = AffiliatePeer::get($affiliateId);
			$user = $affiliate->getOwner();
		}	
		else {
			$affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();
			$affiliate = AffiliatePeer::get($affiliateId);
			$user = $_SESSION["loginAffiliateUser"];			
		}		
				
		
		$affiliateName = $affiliate->getName();
		
		require_once("OrdersPlugin".ucwords($affiliateName).".php");
		
		$separator = OrdersImportPlugin::getSeparator();
		
		$loaded = 0;

		if (!empty($_FILES["csv"])) {
			$orders = OrdersImportPlugin::getOrdersFromFile($_FILES["csv"]["tmp_name"]);	
			
			//print_r($rows);
     	}
		
		//print_r($orders);die;
		$results = OrderPeer::createFromArray($orders,$user);

    	$myRedirectConfig = $mapping->findForwardConfig('success');
    	$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&results[ordersCreated]='.$results["ordersCreated"].'&results[ordersNotCreated]='.$results["ordersNotCreated"].'&results[productsFound]='.$results["productsFound"].'&results[productsNotFound]='.$results["productsNotFound"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
    	return $fc;
	}

}
