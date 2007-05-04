<?php

require_once("BaseAction.php");
require_once("ModulePeer.php");

/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class ModulesDoActivateXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ModulesDoActivateXAction() {
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

		//asigno modulo y seccion
		$modulo = "Modules";


		$smarty->assign("modulo",$modulo);

		//print_r($_POST);
		$modulePeer = new ModulePeer();
		
		$moduleName=$_POST["module"];
		$activeModule=$_POST["activeModule"];		

		
		$savedModules= $modulePeer->getAll();
		
		if (isset($_POST["activeModule"]) ){

			foreach ($savedModules as $saveModule){
				if ($saveModule->getName() == $moduleName){

					$assignedModules= $modulePeer->setActive($moduleName,$activeModule);
				}

			}

		}
		else $modulePeer->setActive($moduleName,0);

		//////////
		// Forward control to the specified success URI
		return $mapping->findForwardConfig('success');



	}

}
?>
