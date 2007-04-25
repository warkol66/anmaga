<?php


require_once("BaseAction.php");
require_once("SecurityActionPeer.php");
require_once("GroupPeer.php");
require_once("ModulePeer.php");

require_once("ActionLogPeer.php");

/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class ModulesLoadAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function ModulesActionLoadAction() {
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
		$modulo = "Modules";

		$smarty->assign("modulo",$modulo);
 


		/*
		* Busco todos los actions existentes en mis directorios para agregarlos luego en una lista
		*
		* @var string $modulos que contendra los actions
		*/

		$i=0;
		$dir = "WEB-INF/classes/modules/";
				$dh  = opendir($dir);
				while (false !== ($nombre_modulo = readdir($dh)))
				{
					if ($nombre_modulo[0]!='.')
					{	$modulesName[$i]=$nombre_modulo;
						$i++;
					
					}
				}
			
		$smarty->assign("modules",$modulesName);
			
		$modulePeer = new ModulePeer();
		$assignedModules= $modulePeer->getAll();
		//print_r($assignedModules);
		$smarty->assign("assignedModules",$assignedModules);
		
		return $mapping->findForwardConfig('success');
	}

}
?>
