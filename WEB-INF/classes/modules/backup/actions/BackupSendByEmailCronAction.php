﻿<?php
/**
 * BackupDownloadAction
 *
 * @package backup
 */

class BackupSendByEmailCronAction extends BaseAction {

	function BackupSendByEmailCronAction() {
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

		global $system;
		$email = $system["config"]["system"]["parameters"]["debugMail"];
		$backupPeer = new BackupPeer();

		if($backupPeer->sendBackupContentToEmail("empty",$email))
			Common::doLog('success','system');
		else
			Common::doLog('failure','system');

		die();

	}

}
