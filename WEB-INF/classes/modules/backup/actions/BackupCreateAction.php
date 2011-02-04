<?php
/**
 * BackupCreateAction
 *
 * @package backup
 */

class BackupCreateAction extends BaseAction {

	function BackupCreateAction() {
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

		if (empty($_GET['mode'])) {
			return $mapping->findForwardConfig('failure');
			Common::doLog('failure');
		}

		$backupPeer = new BackupPeer();

		if ($_GET['mode'] == 'data') {

			if ($backupPeer->createDataBackup()) {
				Common::doLog('success');
				return $mapping->findForwardConfig('success');
			}
			else {
				return $mapping->findForwardConfig('failure');
				Common::doLog('failure');
			}
		}

		if ($_GET['mode'] == 'complete') {

			if ($backupPeer->createCompleteBackup()) {
				Common::doLog('success');
				return $mapping->findForwardConfig('success');
			}
			else {
				return $mapping->findForwardConfig('failure');
				Common::doLog('failure');
			}
		}

	}

}
