<?php
/**
 * BackupRestoreAction
 *
 * @package backup
 */

class BackupRestoreAction extends BaseAction {

	function BackupRestoreAction() {
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

		$backupPeer = new BackupPeer();

		if ($backupPeer->restoreBackup('WEB-INF/../backups/' . $_POST['filename'])) {
			Common::doLog('success','WEB-INF/../backups/' . $_POST['filename']);
			return $mapping->findForwardConfig('success');
		}
		else {
			Common::doLog('failure','WEB-INF/../backups/' . $_POST['filename']);
			return $mapping->findForwardConfig('failure');
		}
	}

}
