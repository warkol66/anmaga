<?php

class SurveysAnswerOptionsAddXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysAnswerOptionsAddXAction() {
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

		//por ser una accion ajax
		$this->template->template = 'TemplateAjax.tpl';
		$module = "Surveys";
		$smarty->assign("module",$module);
		$section = "Surveys";
		$smarty->assign("section",$section);				

		$question = SurveyQuestionPeer::get($_POST['surveyAnswerOption']['questionId']);

		if (empty($question)) {
			return $mapping->findForwardConfig('failure');
		}
		
		$answer = $question->addAnswerOption($_POST['surveyAnswerOption']['answer']);
		if (!$answer)
			return $mapping->findForwardConfig('failure');
			
		$smarty->assign('answerOption',$answer); 
		return $mapping->findForwardConfig('success');
	}
}