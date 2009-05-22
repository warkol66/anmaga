<?php
/**
* ActionlogsDoPurgeAction
*
*  Borra desde una determinada fecha, hasta otra, datos de la base de datos
*  Los datos a borrar requieren confirmacion, una vez confirmado, borra
*  determinados datos y reconfigura la tabla
*
* @package actionlogs
*/

require_once("BaseAction.php");
require_once("ActionlogPeer.php");

class ActionlogsDoPurgeAction extends BaseAction {

	function ActionlogsDoPurgeAction() {
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

		$dateFromExplode = explode("-", $_GET["dateFrom"]);
		$dateFrom = date("Y-m-d",mktime(0,0,0,$dateFromExplode[1],$dateFromExplode[0],$dateFromExplode[2]));

		$dateToExplode = explode("-", $_GET["dateTo"]);
		$dateTo = date("Y-m-d",mktime(0,0,0,$dateToExplode[1],$dateToExplode[0],$dateToExplode[2]));

		$logs = new ActionlogPeer();

		$deleteLogs=$logs->deleteLogs($dateFrom,$dateTo);

		Common::doLog('success',$dateFromExplode."-".$dateToExplode);
		return $mapping->findForwardConfig('success');

	}

}