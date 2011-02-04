<?php
/**
 * BackupRestoreFromFileAction
 *
 * @package backup
 */

class BackupRestoreFromFileAction extends BaseAction {

	function BackupRestoreFromFileAction() {
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
