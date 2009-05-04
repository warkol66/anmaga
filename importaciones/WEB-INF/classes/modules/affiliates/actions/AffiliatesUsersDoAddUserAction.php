<?php
/** 
 * AffiliatesUsersDoAddUserAction
 *
 * @package affiliates 
 */

require_once("BaseAction.php");
require_once("AffiliateUserPeer.php");

class AffiliatesUsersDoAddUserAction extends BaseAction {


	function AffiliatesUsersDoAddUserAction() {
		;
	}

	function assignObjects($smarty) {
		$smarty->assign("currentAffiliateUser",AffiliateUserPeer::getFromArray($_POST["affiliateUser"]));
		$smarty->assign("currentAffiliateUserInfo",AffiliateUserInfoPeer::getFromArray($_POST["affiliateUserInfo"]));
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
		$section = "Users";
		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		$usersPeer= new AffiliateUserPeer();

		$affiliateUserParams = $_POST["affiliateUser"];
		$affiliateUserInfoParams = $_POST["affiliateUserInfo"];

		if ( !empty($_SESSION["loginUser"]) )
			$affiliateId = $_POST["affiliateId"];
		else
			$affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();

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

		AffiliateUserPeer::create($affiliateId,$paramsUser["username"],$paramsUser["pass"],1,$paramsUserInfo["name"],$paramsUserInfo["surname"],$paramsUserInfo["mailAddress"],$paramsUser["timezone"]);

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$myReqQueryString = "&affiliateId=".$affiliateId;
		$myReqQueryString = htmlentities(urlencode($myReqQueryString));
		$myRedirectPath .= $myReqQueryString;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}

