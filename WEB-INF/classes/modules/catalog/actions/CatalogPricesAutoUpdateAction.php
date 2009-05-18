<?php
require_once('BaseAction.php');
require_once('AffiliatePeer.php');
require_once('ProductPeer.php');

class CatalogPricesAutoUpdateAction extends BaseAction {

	/**
	 * Constructor
	 *
	 */
	function CatalogPricesAutoUpdateAction() {
	}

	function processGeneralUpdate($filePath) {

		ProductPeer::doImportPrices($filePath);

	}

	function processAffiliateUpdate($affiliateName,$filePath) {

		//procesamiento de datos de afiliado
		$affiliate = AffiliatePeer::getByName($affiliateName);

		if (!empty($affiliate)){
			$affiliate->doImportPrices($filePath);
		}

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

		$module = "Catalog";
		$smarty->assign('module',$module);

		global $system;
		$updatesDir =  'WEB-INF/../' . $system["config"]["catalog"]["pricesAutoUpdate"]["updatesDir"]."/";
		$processedDir = $updatesDir."processed/";
		$updatesDirDesc = opendir($updatesDir);

		while (($file = readdir($updatesDirDesc)) !== false) {

			if (is_file($updatesDir . $file)) {

				$parts = explode('.',$file);
				if (count($parts) == 2 && $parts[1] == 'csv') {
					$filename = $parts[0];
					$filePath = $updatesDir . $file;
					if ($filename == 'listaPrecios') {
						//procesamiento general
						$this->processGeneralUpdate($filePath);
						copy($filePath,$processedDir . $filename . date("Ymdhms") . '.csv');
						unlink($filePath);
					//	Common::doLog('success',$filename);

					}
					else {
						$nameParts = explode('_',$filename);
						if (count($nameParts) == 2) {
							$affiliateName = $nameParts[1];
							$this->processAffiliateUpdate($affiliateName,$filePath);
							copy($filePath,$processedDir . $filename . date("Ymdhms") . '.csv');
							unlink($filePath);
					//		Common::doLog('success',$filename);
					
						}
					}
				}
			}
		}
		closedir($updatesDirDesc);
		die();
	}
}
