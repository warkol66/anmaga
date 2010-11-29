<?php
/** 
 * UsersWelcomeAction
 *
 * @package users 
 */

require_once("BaseAction.php");
require_once("TimezonePeer.php");
require_once("UserGroupPeer.php");

class UsersWelcomeAction extends BaseAction {

	function UsersWelcomeAction() {
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
		
		return $mapping->findForwardConfig('success');
	}

}
