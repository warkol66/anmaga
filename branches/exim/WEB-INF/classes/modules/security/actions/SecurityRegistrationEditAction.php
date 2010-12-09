<?php

require_once("BaseAction.php");
require_once("SecurityActionPeer.php");
require_once("AffiliateLevelPeer.php");
require_once("ModulePeer.php");

class SecurityRegistrationEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityRegistrationEditAction() {
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
		$section = "Registration";
		$smarty->assign("module",$module);
		$smarty->assign("section",$section);

		$modules = ModulePeer::getAll();

		if (!empty($_SESSION['loginUser']))
			$userLevel = 1;
		else
			$userLevel = $_SESSION['loginAffiliateUser']->getLevelId();

		if(!empty($_GET["moduleSelected"])) {
			$moduleSelected = $_GET["moduleSelected"];
			$actions = SecurityActionPeer::getAllByModuleAndBitLevelAffiliateUser($moduleSelected,$userLevel);
			$moduleObj = ModulePeer::get($moduleSelected);
			$smarty->assign("moduleObj",$moduleObj);
		}

		//obtengo todos los niveles con bitlevel mayor al del usuario logueado
  	$levels = AffiliateLevelPeer::getAllWithBitLevelGreaterThan($userLevel);

		$levelSave = SecurityActionPeer::LEVEL_ALL;

		$smarty->assign("actions",$actions);
		$smarty->assign("levelSave",$levelSave);
		$smarty->assign("modules",$modules);
		$smarty->assign("moduleSelected",$moduleSelected);
		$smarty->assign("levels",$levels);
		$smarty->assign("userLevel",$userLevel);
		
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');

	}

}
