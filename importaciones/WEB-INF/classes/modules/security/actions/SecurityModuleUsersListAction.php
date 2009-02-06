<?php

require_once("BaseAction.php");
require_once("SecurityActionPeer.php");
require_once("LevelPeer.php");
require_once("ModulePeer.php");

class SecurityModuleUsersListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityModuleUsersListAction() {
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

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}
		
		//asigno modulo y seccion
		$modulo = "Security";
		$section = "";

		$smarty->assign("modulo",$modulo);
		$smarty->assign("section",$section);

		$modules = ModulePeer::getAll();

		$userLevel=SecurityActionPeer::userInfoToSecurity();

		if(!empty($_GET["module"]))
				$moduleSelected = SecurityModulePeer::get($_GET["module"]);	

		//obtengo todos los niveles con bitlevel mayor al del usuario logueado
		$levels = LevelPeer::getAllWithBitLevelGreaterThan($userLevel['levelId']);

		//contiene un nivel a comparar, equivalente a 2¨30 -1
		$levelSave=1073741823;

		$smarty->assign("levelsave",$levelSave);
		$smarty->assign("modulesName",$modules);
		$smarty->assign("moduleSelected",$moduleSelected);
		$smarty->assign("levels",$levels);
		$smarty->assign("userLevel",$userLevel['levelId']);
		
		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}
