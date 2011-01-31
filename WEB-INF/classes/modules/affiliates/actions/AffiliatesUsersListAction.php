<?php

class AffiliatesUsersListAction extends BaseAction {

	function AffiliatesUsersListAction() {
		;
	}

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

		$usersPeer = new AffiliateUserPeer();

		//Si esta logueado un usuario comun
		if (!empty($_SESSION["loginUser"])) {
			$affiliateId = $_GET["affiliateId"];
			if(!empty($affiliateId)) {
				if ($affiliateId == -1){
					$users = $usersPeer->getAll();
					$deletedUsers = $usersPeer->getDeleteds();
				}
				else{
					$users = $usersPeer->getAffiliate($affiliateId);
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
		  $affiliateId = $_SESSION["loginAffiliateUser"]->getAffiliateId();
			$users = $usersPeer->getAffiliate($affiliateId);
			$deletedUsers = $usersPeer->getDeletedsByAffiliate($affiliateId);
		}

		$smarty->assign("deletedUsers",$deletedUsers);
		
		$smarty->assign("affiliateId",$affiliateId);

    if ( !empty($_GET["user"]) ) {
			//voy a editar un usuario

			try {
				$user = $usersPeer->get($_GET["user"]);
				//echo "usuario $user ...";

				$smarty->assign("currentAffiliateUser",$user);
				$smarty->assign("currentAffiliateUserInfo",$user->getAffiliateUserInfo());
				$groups = $usersPeer->getGroupsByUser($_GET["user"]);
				$smarty->assign("currentUserGroups",$groups);
				$groups = AffiliateGroupPeer::getAll();
				$smarty->assign("groups",$groups);
				$levels = AffiliateLevelPeer::getAll();
				$smarty->assign("levels",$levels);
	    	$smarty->assign("accion","edicion");
	  	}
			catch (PropelException $e) {
      	$smarty->assign("accion","creacion");
			}
		}
		else if ( isset($_GET["user"]) ) {
			//voy a crear un usuario nuevo

			$levels = AffiliateLevelPeer::getAll();
			$smarty->assign("levels",$levels);

			$smarty->assign("accion","creacion");
		}

		$smarty->assign("users",$users);
		$smarty->assign("affId",$affiliateId);
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
