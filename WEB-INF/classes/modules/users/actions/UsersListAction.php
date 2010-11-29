<?php
/** 
 * UsersListAction
 *
 * @package users 
 */

require_once("BaseAction.php");
require_once("UserPeer.php");
require_once("UserInfoPeer.php");
require_once("UserGroupPeer.php");
require_once("GroupPeer.php");
require_once("LevelPeer.php");
require_once("TimezonePeer.php");

class UsersListAction extends BaseAction {

	function UsersListAction() {
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

		$module = "Users";
		$section = "Users";
		
		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		//timezone
		$timezonePeer = new TimezonePeer();
		$smarty->assign("timezones",$timezonePeer->getAll());
		$userPeer = new UserPeer();
		$pager = $userPeer->getAllPaginated($_GET["page"]);
		$smarty->assign("users",$pager->getResult());
		$smarty->assign("pager",$pager);
		$url = "Main.php?do=usersList";
		$smarty->assign("url",$url);				
	
		$deletedUsers = $userPeer->getDeleteds();
		$smarty->assign("deletedUsers",$deletedUsers);

    $smarty->assign("message",$_GET["message"]);
    
    if ( !empty($_GET["user"]) ) {
			//voy a editar un usuario

			try {
				$user = $userPeer->get($_GET["user"]);
				
				$smarty->assign("currentUser",$user);
				$groups = $userPeer->getGroupsByUser($_GET["user"]);
				$smarty->assign("currentUserGroups",$groups);
				$groupPeer = new GroupPeer();
				$groups = $groupPeer->getAll();
				$smarty->assign("groups",$groups);
				$levels = LevelPeer::getAll();
				$smarty->assign("levels",$levels);
	    	$smarty->assign("action","edit");
	  	}
		catch (PropelException $e) {
			$smarty->assign("action","add");
			}
		}
		else if ( isset($_GET["user"]) && empty($_GET["user"]) ) {
			//voy a crear un usuario nuevo
			
			$levels = LevelPeer::getAll();
			$smarty->assign("levels",$levels);

			$smarty->assign("action","add");
		}
		
		$activeUsersCount = count($users);

		global $system;

		$licensesLeft = $system["config"]["users"]["licenses"] - $activeUsersCount;
		$smarty->assign("licensesLeft",$licensesLeft);

		return $mapping->findForwardConfig('success');
	}

}
