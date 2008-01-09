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
class InstallSetupPermissionsAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallSetupPermissionsAction() {
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
		global $PHP_SELF;
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

		//asigno modulo
		$modulo = "Install";
		$smarty->assign("modulo",$modulo);
 
		$modulePeer = new ModulePeer();

		if (!isset($_POST['moduleName'])) {
			return $mapping->findForwardConfig('failure');			
		}
		
		//buscamos todos los modulos sin instalar.

		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . "/actions/";
		$directoryHandler = opendir($modulePath);
		$actions = array();
		
		while (false !== ($filename = readdir($directoryHandler))) {

			//verifico si es un archivo php
			if (is_file($modulePath . $filename) && (ereg('php$',$filename))) {
				//buscamos aquellos que no tienen Do
				if (strstr($filename,"Do") == false) {
					array_push($actions,$filename);
				}	
			
			}
			
		}
		
		
		closedir($directoryHandler);
		$smarty->assign('actions',$actions);
		$smarty->assign('moduleName',$_POST['moduleName']);
		
		return $mapping->findForwardConfig('success');
	}

}
?>
