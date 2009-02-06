<?php

require_once("BaseAction.php");
require_once("SecurityActionPeer.php");
require_once("SecurityModulePeer.php");

class SecurityModuleAffiliateUsersDoSaveAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityModuleAffiliateUsersDoSaveAction() {
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
		// Call our business logic from here

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Security";
		$section = "";

		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		$moduleName = $_POST["module"];
		
		$moduleSelected = SecurityModulePeer::get($moduleName);

		//indica si fue chequeado el acceso a todos
		$all = $_POST["all"];
		
		$levels = $_POST["levels"];
		
		if (!empty($all)) {
			$access = 1073741823;
		} else {
			//Obtengo el nivel base del action que debe tener en base al nivel del usuario logueado
			if (!empty($_SESSION['loginUser']))
				$access = 1;
			else
				$access = $_SESSION['loginAffiliateUser']->getTotalAccess();	
			foreach($levels as $level) {
				$access += $level;
			}				
		}		
		
		$moduleSelected->setAccessAffiliateUser($access);		
		$moduleSelected->save();

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&module='.$_POST["module"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}
