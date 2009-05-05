<?php
/** 
 * BackupCreateToFileAction
 *
 * @package backup 
 */

require_once("BaseAction.php");
require_once("BackupPeer.php");

class BackupCreateToFileAction extends BaseAction {

	function BackupCreateToFileAction() {
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

		if (empty($_GET['mode'])) {
			return $mapping->findForwardConfig('failure');
			Common::doLog('failure');			
		}

		$backupPeer = new BackupPeer();
		
		if ($_GET['mode'] == 'data') {
		
			$content = $backupPeer->createDataBackupFile();
		}

		if ($_GET['mode'] == 'complete') {
		
			$content = $backupPeer->createCompleteBackupFile();
		}		

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
