<?php

require_once("BaseAction.php");
require_once("UserPeer.php");

class UsersValidationUsernameXAction extends BaseAction {

	function UsersValidationUsernameXAction() {
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
			
			$this->template->template = 'TemplateAjax.tpl';

			$module = "Validation";
			$smarty->assign('module',$module);

			$name = 'username';
			$foundUsername = UserPeer::getByUsername($_POST['username']);
			if (empty($foundUsername)) {
				//no se encontro el usuario
				$value = 0;
			}
			else {
				$value = 1;
			}
			
			$smarty->assign('name',$name);			
			$smarty->assign('value',$value);
			$smarty->assign('message',$message);
		
			return $mapping->findForwardConfig('success');
		
	}

}
