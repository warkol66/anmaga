<?php

require_once("BaseAction.php");
require_once("SecurityModulePeer.php");

class SecurityModuleRegUsersDoSaveAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityModuleRegUsersDoSaveAction() {
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

		$accessRegistrationUser = false;
		if (!empty($_POST["access"]))
			$accessRegistrationUser = true;
			
		$moduleSelected->setAccessRegistrationUser($accessRegistrationUser);
		$moduleSelected->save();		

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&module='.$_POST["module"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}
