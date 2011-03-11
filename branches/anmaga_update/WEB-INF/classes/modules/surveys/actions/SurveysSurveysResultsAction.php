<?php

class SurveysSurveysResultsAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysResultsAction() {
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
		
		if ($this->isAjax()) {
			$this->template->template = 'TemplateAjax.tpl';
			$smarty->assign('ajax',true);
		}

		$module = "Surveys";
		$smarty->assign("module",$module);
		$section = "Surveys";
		$smarty->assign("section",$section);				

		$survey = SurveyPeer::get($_GET["id"]);

		if (!$survey)
			return $mapping->findForwardConfig('failure');
		
		//verificacion si solo debe ser visible para un usuario registrado
		//no es publica y no quiere acceder un usuario afiliado.
		if ((!$survey->isPublic()) && (!Common::isRegistrationUser()) && (!Common::isAdmin()))
			return $mapping->findForwardConfig('failure-visibility');			

		$smarty->assign("survey",$survey);

		return $mapping->findForwardConfig('success');

	}

}