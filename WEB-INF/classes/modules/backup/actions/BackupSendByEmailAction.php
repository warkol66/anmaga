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
		
		$systemConfig = Common::getConfiguration('system');

		$filename = !empty($_POST['filename']) ? $_POST['filename'] : null;
		$email = empty($_POST['email']) ? $systemConfig["parameters"]["debugMail"] : $_POST['email'];
		$backupPeer = new BackupPeer();

		if($backupPeer->sendBackupToEmail($email, $filename)) {
			Common::doLog('success','system');
			if (empty($filename)) die; //Estamos ejecutando por cron.
			return $mapping->findForwardConfig('success');
		} else {
			Common::doLog('failure','system');
			if (empty($filename)) die; //Estamos ejecutando por cron.
			return $mapping->findForwardConfig('failure');
		}

	}

}
