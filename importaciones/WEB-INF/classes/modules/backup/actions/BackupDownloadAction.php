<?php

require_once("BaseAction.php");
require_once("BackupPeer.php");

/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* @version 1.0
* @public
*/
class BackupDownloadAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function BackupDownloadAction() {
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

		//asigno modulo
		$modulo = "Backup";
		$smarty->assign("modulo",$modulo);

		$backupPeer = new BackupPeer();

		if ($_GET['filename']) {

			$filename = $_GET['filename'];
			
			$content = $backupPeer->getBackupContents($filename);
			
			if ($content == false)
				return $mapping->findForwardConfig('failure');

			header("Content-type: text/x-sql; charset=UTF-8");		
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			echo $content;

		}

		die;

	}

}
?>
