<?php
/** 
 * AffiliatesDoAddAffiliateAction
 *
 * @package affiliates 
 */

require_once("BaseAction.php");
require_once("AffiliatePeer.php");
require_once("AffiliateInfoPeer.php");
require_once("AffiliateUserPeer.php");

class AffiliatesDoAddAffiliateAction extends BaseAction {

	function AffiliatesDoAddAffiliateAction() {
		;
	}

	function assignObjects($smarty) {
		$smarty->assign("affiliate",AffiliatePeer::getFromArray($_POST["affiliate"]));
		$smarty->assign("affiliateInfo",AffiliateInfoPeer::getFromArray($_POST["affiliateInfo"]));
		$smarty->assign("user",AffiliateUserPeer::getFromArray($_POST["affiliateUser"]));
		$smarty->assign("userInfo",AffiliateUserInfoPeer::getFromArray($_POST["affiliateUserInfo"]));
		$timezonePeer = new TimezonePeer();
		$smarty->assign('timezones',$timezonePeer->getAll());
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
		$affiliateUserParams = $_POST["affiliateUser"];
		$affiliateUserInfoParams = $_POST["affiliateUserInfo"];

		if ( empty($affiliateParams["name"]) ) {
			$this->assignObjects($smarty);
			$smarty->assign("message","emptyAffiliateName");
			return $mapping->findForwardConfig('failure');
		}

		if ( empty($affiliateUserParams["username"]) ) {
			$this->assignObjects($smarty);
			$smarty->assign("message","emptyUsername");
			return $mapping->findForwardConfig('failure');
		}

		if ( empty($affiliateUserParams["password"]) || ($affiliateUserParams["password"] != $affiliateUserParams["pass2"]) ) {
			$this->assignObjects($smarty);
			$smarty->assign("message","wrongPassword");
			return $mapping->findForwardConfig('failure');
		}

		if (!AffiliatePeer::create($affiliateParams,$affiliateInfoParams,$affiliateUserParams,$affiliateUserInfoParams)) {
			$this->assignObjects($smarty);
			$smarty->assign("message","error");
			return $mapping->findForwardConfig('failure');
		}

		return $mapping->findForwardConfig('success');
	}

}

