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

class UsersDoEditAction extends BaseAction {

	function UsersDoEditAction() {
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

    $userPeer = new UserPeer();

		if ( $_POST["accion"] == "edit" ) {
			//estoy editando un usuario existente

			if ( $_POST["pass"] == $_POST["pass2"] ) {

				if ( $userPeer->update($_POST["id"],$_POST["username"],$_POST["name"],$_POST["surname"],$_POST["pass"],$_POST["levelId"],$_POST["mailAddress"],$_POST['timezone']) ) {
					
					Common::doLog('success','username: ' . $_POST["username"] . ' action: edit');
  	    			return $mapping->findForwardConfig('success');
  	    		}
				else {
					header("Location: Main.php?do=usersList&user=".$_POST["id"]."&message=errorUpdate");
					exit;
				}
			}
			else {
				header("Location: Main.php?do=usersList&user=".$_POST["id"]."&message=wrongPassword");
				exit;
			}

		}
		else {
		  //estoy creando un nuevo usuario
		  
			if ( !empty($_POST["pass"]) && $_POST["pass"] == $_POST["pass2"] ) {

				if (empty($_POST["levelId"]))
					$_POST["levelId"]=3;
				if ($userPeer->create($_POST["username"],$_POST["name"],$_POST["surname"],$_POST["pass"],$_POST["levelId"],$_POST["mailAddress"],$_POST['timezone'])) {
					Common::doLog('success','username: ' . $_POST["username"] . ' action: add');
					return $mapping->findForwardConfig('success');
				}
				else {
					header("Location: Main.php?do=usersList&user=&message=errorUpdate");
					exit;
				}
			}
			else {
				header("Location: Main.php?do=usersList&user=&message=wrongPassword");
				exit;
			}
		}
		Common::doLog('success','username: ' . $_POST["username"] . ' action: add');
		return $mapping->findForwardConfig('success');
	}

}
