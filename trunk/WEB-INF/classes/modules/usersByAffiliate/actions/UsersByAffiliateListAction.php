<?php

require_once("BaseAction.php");
require_once("UserByAffiliatePeer.php");
require_once("AffiliatePeer.php");

class UsersByAffiliateListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByAffiliateListAction() {
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

		$module = "UsersByAffiliate";
		$section = "";

    $smarty->assign("module",$module);
    $smarty->assign("section",$section);

		$usersPeer = new userByAffiliatePeer();

		//Si esta logueado un usuario comun
		if (!empty($_SESSION["login_user"])) {
			$affiliateId = $_GET["affiliateId"];
			if(!empty($affiliateId))
				$users = $usersPeer->getUsersByAffiliate($affiliateId);
    	else
				$users = $usersPeer->getAll();
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);
		}
		else {
		  $affiliateId = $_SESSION["login_user_affiliate"]->getAffiliateId();
			$users = $usersPeer->getUsersByAffiliate($affiliateId);
		}

		$smarty->assign("users",$users);
		$smarty->assign("affId",$affiliateId);
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
?>
