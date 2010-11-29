<?php
/** 
 * AffiliatesDoEditAction
 *
 * @package affiliates 
 */

require_once("BaseAction.php");
require_once("AffiliatePeer.php");


class AffiliatesDoEditAction extends BaseAction {

	function AffiliatesDoEditAction() {
		;
	}

	function assignObjects($smarty) {
		$smarty->assign("affiliate",AffiliatePeer::get($_POST["id"]));
		$smarty->assign("affiliateInfo",AffiliateInfoPeer::getFromArray($_POST["affiliateInfo"]));
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

		$module = "Affiliates";
		$smarty->assign("module",$module);

		$affiliateParams = $_POST["affiliate"];
		$affiliateInfoParams = $_POST["affiliateInfo"];

		if ( empty($affiliateParams["name"]) ) {
			$this->assignObjects($smarty);
			$smarty->assign("message","emptyAffiliateName");
			return $mapping->findForwardConfig('failure');
		}

		if (!AffiliatePeer::update($_POST["id"],$affiliateParams,$affiliateInfoParams)) {
			$this->assignObjects($smarty);
			$smarty->assign("message","error");
			return $mapping->findForwardConfig('failure');
		}

		return $mapping->findForwardConfig('success');
	}

}

