<?php
/** 
 * BackupRestoreFromFileAction
 *
 * @package backup 
 */

require_once("BaseAction.php");
require_once("BackupPeer.php");

class BackupRestoreFromFileAction extends BaseAction {

	function BackupRestoreFromFileAction() {
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

		$module = "Backup";
		$smarty->assign("module",$module);

		$backupPeer = new BackupPeer();

		$filename = $_FILES["backup"]['tmp_name'];
		if ($backupPeer->restoreBackup($filename)) {
			Common::doLog('success',$filename);
			return $mapping->findForwardConfig('success');
		}
		else {
			Common::doLog('failure',$filename);
			return $mapping->findForwardConfig('failure');
		}
	}

}