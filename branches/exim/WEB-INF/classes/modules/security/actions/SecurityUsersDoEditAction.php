<?php


require_once("BaseAction.php");
require_once("SecurityActionPeer.php");

class	SecurityUsersDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityUsersDoEditAction() {
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

		// contiene todos los actions
		$actions = $_POST["actions"];

		//Obtengo el nivel base del action que debe tener en base al nivel del usuario logueado
		$loginUser = $_SESSION['loginUser'];
		$userLevel = $loginUser->getLevelid();
		$baseLevel = 1;
		while ($userLevel > 1) {
			$baseLevel += $userLevel;
			$userLevel = $userLevel / 2;
		}

		foreach($actions as $act)
			SecurityActionPeer::clearAccess($act,$baseLevel);

		$levelmin = $_POST["all"];
		$action = $_POST["activeaction"];

		foreach ($action as  $key=> $activeaction) {
			$level=0;
			foreach ($activeaction as $activeactionlevel)
				$level+=$activeactionlevel;

			$level += $baseLevel;
			SecurityActionPeer::setNewAccess($key,$level);
		}

		$levelAll = SecurityActionPeer::LEVEL_ALL;
		foreach ($levelmin as $levelaction) {
			foreach ($actions as $act) {
				if (strcmp($levelaction, $act) == 0)
					SecurityActionPeer::setNewAccess($act, $levelAll);
			}
		}

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleSelected='.$_POST["moduleSelected"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}
