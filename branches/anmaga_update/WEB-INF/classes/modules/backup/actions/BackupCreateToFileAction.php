<?php
/**
 * BackupCreateToFileAction
 *
 * @package backup
 */


class BackupCreateToFileAction extends BaseAction {

	function BackupCreateToFileAction() {
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

		if ($_GET['mode'] == 'data')
			$content = $backupPeer->createDataBackupFile();

		if ($_GET['mode'] == 'complete')
			$content = $backupPeer->createCompleteBackupFile();

		require_once('TimezonePeer.php');

		$timezonePeer = new TimezonePeer();
		$timestamp = $timezonePeer->getServerTimeOnGMT0();
		$datetime = date('Y-m-d  H:i:s',$timestamp);
		$currentDatetime = Common::getDatetimeOnTimezone($datetime);

		$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.zip';

		header("Content-type: application/zip");
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		echo $content;

		die;

	}

}
