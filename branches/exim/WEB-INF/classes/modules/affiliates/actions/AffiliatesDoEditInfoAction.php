<?php
/** 
 * AffiliatesDoEditInfoAction
 *
 * @package affiliates 
 */

require_once("BaseAction.php");
require_once("AffiliateInfoPeer.php");

class AffiliatesDoEditInfoAction extends BaseAction {

	function AffiliatesDoEditInfoAction() {
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
		$smarty->assign("module",$module);

		$affiliateInfoPeer = new AffiliateInfoPeer();

		$id= $_POST["id"];

		if($_POST["flag"]==1)
			$affiliate=$affiliateInfoPeer->add($id,$_POST["internalId"],$_POST["address"],$_POST["phone"],$_POST["mail"],$_POST["contact"],$_POST["contactEmail"],$_POST["web"],$_POST["memo"]);
		else
			$affiliate=$affiliateInfoPeer->update($id,$_POST["internalId"],$_POST["address"],$_POST["phone"],$_POST["mail"],$_POST["contact"],$_POST["contactEmail"],$_POST["web"],$_POST["memo"]);

		return $mapping->findForwardConfig('success');

	}

}
