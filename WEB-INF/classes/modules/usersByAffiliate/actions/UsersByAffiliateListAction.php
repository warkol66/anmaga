<?php

require_once("BaseAction.php");
require_once("UserByAffiliatePeer.php");
require_once("UsersByAffiliateGroupPeer.php");
require_once("UsersByAffiliateLevelPeer.php");
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
		if (!empty($_SESSION["loginUser"])) {
			$affiliateId = $_GET["affiliateId"];
			if(!empty($affiliateId)) {
				if ($affiliateId == -1){
					$users = $usersPeer->getAll();
					$deletedUsers = $usersPeer->getDeleteds();
				}
				else{
					$users = $usersPeer->getUsersByAffiliate($affiliateId);
					$deletedUsers = $usersPeer->getDeletedsByAffiliate($affiliateId);
				}
			}
    	else {
				$users = $usersPeer->getAll();
				$deletedUsers = $usersPeer->getDeleteds();
			}
			$affiliates = AffiliatePeer::getAll();
			$smarty->assign("affiliates",$affiliates);
		}
		else {
		  $affiliateId = $_SESSION["loginUserByAffiliate"]->getAffiliateId();
			$users = $usersPeer->getUsersByAffiliate($affiliateId);
			$deletedUsers = $usersPeer->getDeletedsByAffiliate($affiliateId);
		}

		$smarty->assign("deletedUsers",$deletedUsers);
		
		$smarty->assign("affiliateId",$affiliateId);

    if ( !empty($_GET["user"]) ) {
			//voy a editar un usuario

			try {
				$user = $usersPeer->get($_GET["user"]);
				$smarty->assign("currentUser",$user);
				$groups = $usersPeer->getGroupsByUser($_GET["user"]);
				$smarty->assign("currentUserGroups",$groups);
				$groups = UsersByAffiliateGroupPeer::getAll();
				$smarty->assign("groups",$groups);
				$levels = UsersByAffiliateLevelPeer::getAll();
				$smarty->assign("levels",$levels);
	    	$smarty->assign("accion","edicion");
	  	}
			catch (PropelException $e) {
      	$smarty->assign("accion","creacion");
			}
		}
		else if ( isset($_GET["user"]) ) {
			//voy a crear un usuario nuevo

			$levels = UsersByAffiliateLevelPeer::getAll();
			$smarty->assign("levels",$levels);

			$smarty->assign("accion","creacion");
		}

		$smarty->assign("users",$users);
		$smarty->assign("affId",$affiliateId);
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
?>
