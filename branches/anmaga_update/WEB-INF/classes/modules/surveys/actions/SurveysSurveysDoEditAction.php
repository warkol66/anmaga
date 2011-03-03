<?php

require_once("BaseAction.php");
require_once("SurveyPeer.php");
require_once("SurveyQuestion.php");
require_once("SurveyQuestionPeer.php");

class SurveysSurveysDoEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysDoEditAction() {
		;
	}

	function validate() {
		return (!empty($_POST["survey"]["name"]) && ($_POST["survey"]["isPublic"] >= '0') && !empty($_POST["surveyQuestion"]["question"]));
		
	}

	function manageEditFailure($mapping,$smarty) {
		
		$survey = SurveyPeer::get($_POST['survey']["id"]);
		$questions = $survey->getSurveyQuestions();
		$smarty->assign("survey",$survey);
		$smarty->assign("surveyQuestion",$questions[0]);
		
		$smarty->assign("action","edit");
		$smarty->assign("message","error");
		return $mapping->findForwardConfig('failure');
	}
	
	function manageCreateFailure($mapping,$smarty) {
		
			$survey = new Survey();
			$survey->setid($_POST["survey"]["id"]);
			$survey->setname($_POST["survey"]["name"]);
			$survey->setisPublic($_POST["survey"]["isPublic"]);
			$survey->setcreatedAt($_POST["survey"]["createdAt"]);
			$survey->setstartDate($_POST["survey"]["startDate"]);
			$survey->setendDate($_POST["survey"]["endDate"]);
			$surveyQuestion = new SurveyQuestion();
			$surveyQuestion->setQuestion($_POST["surveyQuestion"]["question"]);
			$smarty->assign("survey",$survey);	
			$smarty->assign("surveyQuestion",$surveyQuestion);
			$smarty->assign("action","create");
			$smarty->assign("message","error");
			return $mapping->findForwardConfig('failure');
	
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

		if ( $_POST["action"] == "edit" ) {
			//estoy editando un survey existente

			if (!$this->validate())
				return $this->manageEditFailure($mapping,$smarty);
			
			SurveyPeer::update($_POST["survey"]);
			
			SurveyQuestionPeer::update($_POST['surveyQuestion']);
      		
			return $mapping->findForwardConfig('success-edit');

		}
		else {
		  //estoy creando un nuevo survey

			if (!$this->validate())
				return $this->manageCreateFailure($mapping,$smarty);

			switch ($_POST['surveyType']) {
				
				//caso de creacion de yesno
				case 'yesno':
					
					//creamos la encuesta
					if ( !($survey = SurveyPeer::create($_POST["survey"])) ) {
						return $this->manageCreateFailure($mapping,$smarty);
					}

					$params['surveyQuestion']['question'] = $_POST['surveyQuestion']['question'];
					$params['surveyQuestion']['surveyId'] = $survey->getId();
					
					
					$surveyQuestion = SurveyQuestionPeer::createYesNoQuestion($params['surveyQuestion']);

					return $mapping->findForwardConfig('success-yesno');
					
					break;
					
				case 'multipleAnswers':


					//creamos la encuesta de opciones multiples
					if ( !($survey = SurveyPeer::create($_POST["survey"])) ) {
						return $this->manageCreateFailure($mapping,$smarty);
					}
					
					$params['surveyQuestion']['question'] = $_POST['surveyQuestion']['question'];
					$params['surveyQuestion']['surveyId'] = $survey->getId(); 
					$params['surveyQuestion']['multipleAnswer'] = 1;


					$surveyQuestion = SurveyQuestionPeer::create($params['surveyQuestion']);

					break;
					
				case 'oneAnswer':

					//creamos la encuesta
					if ( !($survey = SurveyPeer::create($_POST["survey"])) ) {
						return $this->manageCreateFailure($mapping,$smarty);
					}

					$params['surveyQuestion']['question'] = $_POST['surveyQuestion']['question'];
					$params['surveyQuestion']['surveyId'] = $survey->getId();
					$params['surveyQuestion']['multipleAnswer'] = 0;
					//creamos la pregunta de la encuesta
					$surveyQuestion = SurveyQuestionPeer::create($params['surveyQuestion']);
					break;
			}
			
			$myRedirectConfig = $mapping->findForwardConfig('success-multiple');
			$myRedirectPath = $myRedirectConfig->getpath();
			$queryData = '&id='.$survey->getId();
			$myRedirectPath .= $queryData;
			$fc = new ForwardConfig($myRedirectPath, True);
			return $fc;
		   
		}

	}

}