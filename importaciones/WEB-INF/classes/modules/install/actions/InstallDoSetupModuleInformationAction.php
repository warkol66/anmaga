<?php

require_once("BaseAction.php");
require_once("ModulePeer.php");
require_once("ModuleDependencyPeer.php");


/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class InstallDoSetupModuleInformationAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function InstallDoSetupModuleInformationAction() {
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
d	*/
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
		
		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/';
		
		//guardado de informacion de descripcion del modulo

		$fd = fopen($modulePath . 'information.sql','w');

		if ($fd == false)
			return $mapping->findForwardConfig('failure');
			
		$moduleLabelPeer = new ModuleLabelPeer();
		$sqlEng = $moduleLabelPeer->getSQLInsertSpanish($_POST['moduleName'],$_POST['labelsEnglish'],$_POST['descriptionEnglish']);
		$sqlSpa = $moduleLabelPeer->getSQLInsertSpanish($_POST['moduleName'],$_POST['labelsSpanish'],$_POST['descriptionSpanish']);
		
		fprintf($fd,"%s\n",$sqlSpa);
		fprintf($fd,"%s\n",$sqlEng);
		
		fclose($fd);
		
		//generacion de sql de las dependencias

		if (isset($_POST['dependencies'])) {

			$fd = fopen($modulePath . 'dependency.sql','w');

			if ($fd == false)
				return $mapping->findForwardConfig('failure');			
			
			foreach($_POST['dependencies'] as $dependencyName) {
				$sql = ModuleDependencyPeer::getSQLInsert($_POST['moduleName'],$dependencyName);
				fprintf($fd,"%s\n",$sql);								
			}
		
			fclose($fd);
			
		}

		//TODO ALWAYS ACTIVE
		
		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;		
	
	}

}
?>
