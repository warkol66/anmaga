<?php

class SurveysSurveysRespondXAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysRespondXAction() {
		;
	}
	
	/**
	 * Crea el cookie correspondiente luego de 
	 * la contestacion de la encuesta
	 */
	function cookieSetup($survey) {
		
		//armamos la fecha de expiracion considerando la fecha de finalizacion de la encuesta
		$expiration = strtotime($survey->getEndDate());
	
		setcookie('infovicicaSurvey' . $survey->getId() ,$survey->getId(),$expiration);
		
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

		$question = SurveyQuestionPeer::get($_POST["questionId"]);

		if (!$question)
			return $mapping->findForwardConfig('failure');
		
		$survey = $question->getSurvey();

		//verificacion si solo debe ser visible para un usuario registrado
		//no es publica y no quiere acceder un usuario afiliado.
		if ((!$survey->isPublic()) && (!Common::isRegistrationUser()))
			return $mapping->findForwardConfig('failure');
			
		//verificamos si la encuesta ha sido respondida
		if (isset($_GET['noResponse']) && $_GET['noResponse'] == 1) {
			//no se guardan respuestas pero el usuario no puede volver a contestar la encuesta
			$this->cookieSetup($survey);
			return $mapping->findForwardConfig('success');
		}
		
		//validacion de que sea encuesta de unica opcion y hayan varias seleccionadas
		if ((!$question->acceptsMultipleAnswers()) && count($_POST['answers']) > 1) {
			return $mapping->findForwardConfig('failure');
		}

		//validacion de captcha
		if (Common::getSurveysCaptchaUse()) {
			//validamos el captcha		
			if ( (empty($_POST['securityCode'])) || !Common::validateCaptcha($_POST['securityCode'])) {
				$smarty->assign('captcha',true);
				return $mapping->findForwardConfig('failure');
			}
		}				

		$answers = $_POST['answers'];
		foreach ($answers as $answerId) {
			$params['surveyAnswer']['questionId'] = $question->getId();
			$params['surveyAnswer']['answerOptionId'] = $answerId;
			
			if (empty($params['surveyAnswer']['objectId']) || empty($params['surveyAnswer']['objectType'])) {
				//caso particular en el cual se guarda el usuario
				//que respondio la encuesta
				
				if (Common::isRegistrationUser()) {
					$user = Common::getRegistrationUserLogged();
					$type = 'RegistrationUser';
				} else if (Common::isSystemUser()) {
					$user = Common::getAdminLogged();
					$type = 'User';
				} else if (Common::isAffiliateUser()) {
					$user = Common::getAffiliatedLogged();
					$type = 'AffiliateUser';
				}
				
				if (!empty($user)) {
					$params['surveyAnswer']['objectId'] = $user->getId();
					$params['surveyAnswer']['objectType'] = $type;
				}
			}
			$surveyAnswer = new SurveyAnswer;
			Common::setObjectFromParams($surveyAnswer, $params['surveyAnswer']);
			$surveyAnswer->save();
		}
		
		//se han guardado las respuesta
		//seteamos una cookie para evitar que el usuario pueda volver a responder la encuesta
		$this->cookieSetup($survey);
		
		$smarty->assign('survey',$survey);
			
		return $mapping->findForwardConfig('success');

	}

}