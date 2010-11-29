<?php



require_once("BaseAction.php");
require_once("SecurityActionPeer.php");
require_once("LevelPeer.php");

require_once("ModulePeer.php");

/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class SecurityActionNoCheckLoginListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SecurityActionNoCheckLoginListAction() {
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
		
		//asigno modulo y seccion
		$modulo = "Security";
		$section = "";

		$smarty->assign("modulo",$modulo);
		$smarty->assign("section",$section);

		$modules = ModulePeer::getAll();
		
		$userLevel = SecurityActionPeer::userInfoToSecurity();		

		if(!empty($_GET["module"])) {
				$actions = SecurityActionPeer::getAllByModuleAndBitLevelAll($_GET["module"],$userLevel['levelId']);
				$moduleView = $_GET["module"];
		}	

		$smarty->assign("actions",$actions);
		$smarty->assign("modulesName",$modules);
		$smarty->assign("moduleView",$moduleView);
		
		$smarty->assign("message",$_GET["message"]);

		//////////
		// Forward control to the specified success URI
		return $mapping->findForwardConfig('success');



	}

}
?>
