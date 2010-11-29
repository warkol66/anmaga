<?php
/** 
 * UsersDoLoginAction
 *
 * @package users 
 */

require_once("BaseAction.php");
require_once("UserPeer.php");

class UsersDoLoginAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersDoLoginAction() {
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

		$module = "Users";
		
		if (Common::hasUnifiedLogin()) {
			$smarty->assign("unifiedLogin",true);
			Common::setValueUnifiedLoginCookie($_POST['select']);			
		}		

		if ( !empty($_POST["loginUsername"]) && !empty($_POST["loginPassword"]) ) {
			$user = UserPeer::auth($_POST["loginUsername"],$_POST["loginPassword"]);
			if ( !empty($user) ) {
				$_SESSION["login_user"] = $user;
				$_SESSION["loginUser"] = $user;
				$smarty->assign("loginUser",$user);
				
				Common::doLog('success','username: ' . $_POST["loginUsername"]);

				return $mapping->findForwardConfig('success');
			}
		}

		$this->template->template = "TemplateLogin.tpl";
		
    	$smarty->assign("message","wrongUser");
		
		global $system;
		$maintenance = $system["config"]["system"]["parameters"]["underMaintenance"]["value"];

		if ($maintenance == "YES")
			$smarty->assign("onlyAdmin",true);

		if (Common::hasUnifiedLogin()) {
			//si hay unificado, obligamos a la opcion que se intento loguear
			$smarty->assign('cookieSelection','admin');
		}

		Common::doLog('failure','username: ' . $_POST["loginUsername"]);
		return $mapping->findForwardConfig('failure');
	}

}
