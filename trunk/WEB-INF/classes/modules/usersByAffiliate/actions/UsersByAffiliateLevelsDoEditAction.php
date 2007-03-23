<?php

require_once("BaseAction.php");
require_once("UsersByAffiliateLevelPeer.php");

class UsersByAffiliateLevelsDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersByAffiliateLevelsDoEditAction() {
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

		$module = "UsersByAffiliate";
		$section = "Levels";
		
    $smarty->assign("module",$module);
    $smarty->assign("section",$section);

		if ( !empty($_POST["id"]) ) {
			//estoy editando un nivel de usuarios existente

			if ( UsersByAffiliateLevelPeer::update($_POST["id"],$_POST["name"]) )
  	   	return $mapping->findForwardConfig('success');
			else {
				header("Location: Main.php?do=usersByAffiliateLevelsList&level=".$_POST["id"]."&message=errorUpdate");
				exit;
			}
		}
		else {
		  //estoy creando un nuevo nivel de usuarios

			if ( !empty($_POST["name"]) ) {

				UsersByAffiliateLevelPeer::create($_POST["name"]);
				return $mapping->findForwardConfig('success');
			}
			else {
				return $mapping->findForwardConfig('blankName');
			}
		}

		return $mapping->findForwardConfig('success');
	}

}
?>
