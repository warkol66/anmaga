<?php

require_once("BaseAction.php");
require_once("AffiliatePeer.php");



class AffiliatesSearchAffiliateAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function AffiliatesSearchAffiliateAction() {
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

		$module = "Affiliates";
		$section = "";
		
    $smarty->assign("module",$module);
    $smarty->assign("section",$section);

		$name = $_GET["name"];

		$pager = AffiliatePeer::getByNamePaginated($name,$_GET["page"]);

		/////////////
		// allFlag es un metodo que permite habilitar un link para volver atras y seleccionar todos los afiliados nuevamente
		$allFlag=$_GET["allFlag"];
		$smarty->assign("allFlag",$allFlag);        echo $_GET["name"]; print_r($pager->getResult());die;

		$smarty->assign("affiliates",$pager->getResult());
		$smarty->assign("pager",$pager);
		$smarty->assign("url","Main.php?do=affiliatesList&allFlag=$allFlag&name=$name");

		return $mapping->findForwardConfig('success');
	}

}
?>
