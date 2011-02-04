<?php
/**
 * BackupDownloadAction
 *
 * @package backup
 */

class BackupSendByEmailAction extends BaseAction {

	function BackupSendByEmailAction() {
		;
	}

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

		if (empty($_POST['filename']) || empty($_POST['email']))
			return $mapping->findForwardConfig('failure');

		$filename = $_POST['filename'];
		$email = $_POST['email'];
		$backupPeer = new BackupPeer();

		if($backupPeer->sendBackupToEmail($filename,$email))
			return $mapping->findForwardConfig('success');
		else
			return $mapping->findForwardConfig('failure');

	}

}
