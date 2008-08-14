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

		$this->template->template = "TemplateMail.tpl";

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

		if (Common::isSystemUser()) {
			$affiliateId = $_REQUEST["affiliateId"];
			require_once("AffiliatePeer.php");
			$affiliate = AffiliatePeer::get($affiliateId);
			$user = $affiliate->getOwner(); 
		}
		else
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
   
		$orderCreated = OrderPeer::get($orderId);
   
		$smarty->assign("order",$orderCreated);
   
		global $system;
		$sendEmail = $system["config"]["orders"]["sendMailOnCreation"]["value"];
   
		if ($sendEmail == "YES") {
   
			$affiliate = $orderCreated->getAffiliate();
			$owner = $affiliate->getOwner();
			$userInfo = $owner->getAffiliateUserInfo();
			$email = $userInfo->getMailAddress();		
   
			$recipients = $system["config"]["orders"]["recipients"];
   
			//Reemplazo punto y coma por comas
			$unif = str_replace(";", ",",$recipients);
   
			//Obtengo las direcciones de Mails
			$emails = split( ",", $unif);	
			$emails[] = $email;	
   
			require_once("libmail.inc.php");
   
			$forwardConfig = $mapping->findForwardConfig('email'); 
			//obtengo el template
			$template = $forwardConfig->getPath();	
   
			$html_result = $smarty->fetch($template); 
   
			foreach ($emails as $email) {
				$mail= new Mail;
				$mail->From($system["config"]["system"]["parameters"]["fromEmail"]);
				$mail->To($email);
				$mail->Subject("Creación de nueva orden: ".$orderCreated->getNumber());
				$mail->Body($html_result,"UTF-8");
				$mail->Send();		
			}
   
		}
   
		$_SESSION["orderItems"] = array();
		return $mapping->findForwardConfig('success');
	}

}
