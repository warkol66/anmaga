<?php

class SurveysSurveysDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysDoEditAction() {
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

		$module = "Surveys";
		$smarty->assign("module",$module);
		$section = "Surveys";
		$smarty->assign("section",$section);		

		if ( !empty($_POST['id']) ) {
			//estoy editando un survey existente
			$survey = SurveyPeer::get($_POST['id']);
			Common::setObjectFromParams($survey, $_POST["survey"]);
			
			$surveyQuestion = SurveyQuestionPeer::get($_POST['surveyQuestionId']);
			Common::setObjectFromParams($surveyQuestion, $_POST['surveyQuestion']);

			if (!$survey->validate() || !$surveyQuestion->validate()) {
				$smarty->assign("survey",$survey);	
				$smarty->assign("surveyQuestion",$surveyQuestion);
				$smarty->assign("message","error");
				$smarty->assign("action","edit");
				return $mapping->findForwardConfig('failure');
			}
			$survey->save();
			$surveyQuestion->save();
			
			return $mapping->findForwardConfig('success-edit');
		} else {
			//estoy creando un nuevo survey
			$survey = new Survey;
			Common::setObjectFromParams($survey, $_POST["survey"]);

			if (!$survey->validate()) {
				$smarty->assign("survey",$survey);	
				$smarty->assign("surveyQuestion",$surveyQuestion);
				$smarty->assign("message","error");
				$smarty->assign("action","create");
				return $mapping->findForwardConfig('failure');
			}
			$survey->save();
			
			$params['surveyQuestion']['question'] = $_POST['surveyQuestion']['question'];
			$params['surveyQuestion']['surveyId'] = $survey->getId();

			switch ($_POST['surveyType']) {
				
				//caso de creacion de yesno
				case 'yesno':
					$surveyQuestion = SurveyQuestionPeer::createYesNoQuestion($params['surveyQuestion']);
					return $mapping->findForwardConfig('success-yesno');
					break;
					
				case 'multipleAnswers':
					$params['surveyQuestion']['multipleAnswer'] = 1;
					$surveyQuestion = new SurveyQuestion;
					Common::setObjectFromParams($surveyQuestion, $params['surveyQuestion']);
					$surveyQuestion->save();
					break;
					
				case 'oneAnswer':
					$params['surveyQuestion']['multipleAnswer'] = 0;
					$surveyQuestion = new SurveyQuestion;
					Common::setObjectFromParams($surveyQuestion, $params['surveyQuestion']);
					$surveyQuestion->save();
					break;
			}
			
			return $this->addParamsToForwards(array('id' => $survey->getId()), $mapping, 'success-multiple');
		}
	}
}