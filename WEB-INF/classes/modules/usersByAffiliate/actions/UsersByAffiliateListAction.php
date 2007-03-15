<?php

require_once("BaseAction.php");
require_once("mer/UserByAffiliatePeer.php");
require_once("mer/AffiliatePeer.php");

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

	$usersPeer= new userByAffiliatePeer();


	if(isset($_POST["affiliateFilter"])){
		$affiliateId=$_POST["affiliateFilter"];
		$users=$usersPeer->getUsersByAffiliate($affiliateId);
	}
    elseif($_POST["affiliateFilter"] == -1){
		$users=$usersPeer->getAll();
	}
	else{
		$users=$usersPeer->getUsersByAffiliate($_SESSION["login_user_affiliate"]->getAffiliateId());
	}

	$smarty->assign("users",$users);
	$smarty->assign("affId",$_SESSION["login_user_affiliate"]->getAffiliateId() );
	
	//traigo los afiliados para cuando sea el supervisor
	$affiliates = AffiliatePeer::getAll();
	$smarty->assign("affiliates",$affiliates);

		return $mapping->findForwardConfig('success');
	}

}
?>
