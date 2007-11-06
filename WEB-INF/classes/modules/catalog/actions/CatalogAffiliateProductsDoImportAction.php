<?php
require_once 'Action.php';
require_once 'BaseAction.php';
require_once('AffiliateProductPeer.php');

class CatalogAffiliateProductsDoImportAction extends BaseAction {

	/**
	 * Constructor
	 *
	 */
	function CatalogAffiliateProductsDoImportAction() {
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

		$moduleSection = "AffiliatesProducts";
    $smarty->assign("moduleSection",$section);

		$affiliateProductPeer = new AffiliateProductPeer();
		
		if (isset($_POST['affiliate']) && isset($_FILES["fileImport"]["tmp_name"])) {
		
			$archive = array();
			$rowsReaded = -1;
			$rowsCreated = 0;
			$handle = fopen($_FILES["fileImport"]["tmp_name"], "r");
				
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			
				if ($rowsReaded >= -1)
						$archive[] = $data;
					
			}
				
			$rowsReaded = count($archive);
			
			if ($rowsReaded > 0) 
				$affiliateProductPeer->deletePrices($_POST['affiliate']);				
			
			
			//procesamiento de filas de datos		
			foreach ($archive as $row) {			
				if ($affiliateProductPeer->add($_POST['affiliate'],$row[0],$row[1])!= false) {
					$rowsCreated++;
				}
			}
			
			fclose($handle);
			$smarty->assign("rowsCreated",$rowsCreated);
			$smarty->assign("rowsReaded",$rowsReaded);
		
			return $mapping->findForwardConfig('success');
		}
		
		return $mapping->findForwardConfig('success');
		
	}
}

?>
