<?php

class AffiliatesListAction extends BaseAction {

	function AffiliatesListAction() {
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

		$module = "Affiliates";
    $smarty->assign("module",$module);

    $smarty->assign("message",$_GET["message"]);

		$name = $_GET["filters"]["name"];

		if (!empty($name)) {
			$pager = AffiliatePeer::getByNamePaginated($name,$_GET["page"]);
			$smarty->assign("url","Main.php?do=affiliatesList&filters[name]=$name");
			$smarty->assign("filters",$_GET["filters"]);
		}
		else
    	$pager = AffiliatePeer::getAllPaginated($_GET["page"]);

		$smarty->assign("affiliates",$pager->getResult());
		$smarty->assign("pager",$pager);

		return $mapping->findForwardConfig('success');
	}

}
