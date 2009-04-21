<?php

require_once("BaseAction.php");
require_once("MultilangLanguagePeer.php");

class MultilangTextsDumpAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function MultilangTextsDumpAction() {
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
    	/**
     	* Use a different template
     	*/
		$this->template->template = "template_dump.tpl";
		header("content-disposition: attachment; filename=text.sql");
		header("Content-type: text/sql; charset=UTF-8");

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$modulo = "Multilang";

    	$texts = MultilangTextPeer::getAll($_GET["moduleName"]);
    	$smarty->assign("texts",$texts);
    
    	$appLanguages = MultilangLanguagePeer::getAll();
    	$smarty->assign("appLanguages",$appLanguages);
		
		$smarty->assign("moduleName",$_GET["moduleName"]);

		return $mapping->findForwardConfig('success');
	}

}