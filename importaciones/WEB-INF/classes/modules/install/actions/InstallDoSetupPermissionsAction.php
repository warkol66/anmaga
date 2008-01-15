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
class InstallDoSetupPermissionsAction extends BaseAction {

	/*
	 * Definicion de los distintos tipos de permisos que pueden haber
	 */
	var $permissionTypes;

	// ----- Constructor ---------------------------------------------------- //

	function InstallDoSetupPermissionsAction() {
		$this->permissionTypes = array('supervisor'=>'0','admin'=>'1','user'=>'2');
	}

	function generateSQLInsertSecurityModule($module,$access,$accessAffiliateUser) {
	
	$query = "INSERT INTO `security_module` ( `module` , `access` , `accessAffiliateUser` ) VALUES ('$module', '$access', '$accessAffiliateUser');";
	
	return $query;
	
	}

	function generateSQLInsertSecurityAction($action,$module,$section,$access,$accessAffiliateUser,$active,$pair) {
	
	$query = "INSERT INTO `security_action` (`action`,`module`,`section`,`access`,`accessAffiliateUser`, `active` , `pair` ) VALUES ('$action','$module','$section','$access','$accessAffiliateUser','$active','$pair');";
	return $query;
		
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
		
		$permission = $_POST['permission'];
		
		if (!isset($_POST['permission']) && (!isset($_POST['moduleName']))) {
			return $mapping->findForwardConfig('failure');
		}

		$modulePath = "WEB-INF/classes/modules/" . $_POST['moduleName'] . '/';
		
		$module = $_POST['moduleName'];

		//creacion de archivo de salida		
		
		$fd = fopen($modulePath . $module . '-permissions.sql','w');
		if ($fd == false) {
			//error de apertura de archivo a generar
			return $mapping->findForwardConfig('failure');
		}
			
		//generacion del insert general sobre el modulo, security_module
		fprintf($fd,"%s\n",$this->generateSQLInsertSecurityModule($module,'',''));

		foreach (array_keys($permission) as $action) {
		
			if (isset($permission[$action]['all'])) {
				//para ese action todos los permisos
				
			}
			else {
				
				foreach (array_keys($this->permissionTypes) as $level) {
					
					if ((isset($permission[$action][$level])) && ($permission[$action][$level] == true)) {
						fprintf($fd,"%s\n",$this->generateSQLInsertSecurityAction($action,$module,$section,$access,$accessAffiliateUser,$active,$pair));
					}
				}
			}			
			

		}
		
		fclose($fd);
		
		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&moduleName='.$_POST["moduleName"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
		
		
		
		
	}

}
?>
