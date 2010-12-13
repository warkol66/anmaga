<?php
require_once("EmailManagement.php");

class ImportShipmentReleasesDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ImportShipmentReleasesDoEditAction() {
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
		
		$shipmentReleaseParams = $_POST['shipmentRelease'];
		
		if ( !empty($_POST['id']) )
			$shipmentRelease = ShipmentReleasePeer::get($_POST['id']);
		
		if (empty($shipmentRelease))
			$shipmentRelease = new ShipmentRelease();
			
		Common::setObjectFromParams($shipmentRelease, $shipmentReleaseParams);
		
		if ($shipmentRelease->isColumnModified(ShipmentReleasePeer::ESTIMATEDMOVEMENTTOSTOREHOUSEDATE))
			$this->sendNotification($smarty, $shipmentRelease);
		
		if ($shipmentRelease->save())
			return $mapping->findForwardConfig('success');
						
		return $mapping->findForwardConfig('failure');
	}
	
	private function sendNotification(&$smarty, $shipmentRelease) {
		$tpl = $this->template->template;  //Guardamos el template original.
		$this->template->template = "TemplatePlain.tpl";  //Establecemos un template plano para el mail.
		$mailTo = '';  //TODO: ver a quien va realmente esto.
		$mailFrom = $system["parameters"]["fromEmail"];
		$subject = Common::getTranslation('Notification', 'import');
		
		$manager = new EmailManagement();
		$manager->setTestMode();
		
		$smarty->assign('shipmentRelease', $shipmentRelease);
		$body = $smarty->fetch("ImportShipmentReleasesMail.tpl");
		
		$message = $manager->createHTMLMessage($subject,$body);
		$result = $manager->sendMessage($mailTo,$mailFrom,$message);  // se envía.
		$this->template->template = $tpl;  //Restauramos el template original.
	}
}

