<?php

class SurveysSurveysShowAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysShowAction() {
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

// comentado por problemas con el modulo de banners
//	    if (!isset($_SESSION["login_user"]))
//				$this->template->template = "TemplatePublic.tpl";

		$survey = SurveyPeer::get($_GET["id"]);

		if (!$survey)
			return $mapping->findForwardConfig('failure');
		
		if ($survey->hasExpired()) {
			$smarty->assign('surveyExpired',true);			
		}
		if ($_GET["forcedForm"] == 1)
			$smarty->assign('forcedForm',true);			
		
		//verificacion si solo debe ser visible para un usuario registrado
		//no es publica y no quiere acceder un usuario afiliado.
		if ((!$survey->isPublic()) && (!Common::isRegistrationUser()) && ($_GET["forcedForm"] != 1))
			return $mapping->findForwardConfig('failure-visibility');			

		//verificamos la existencia del cookie para ver si el usuario no ha respondido ya 
		//la encuesta
		$cookie = $_COOKIE['infovicicaSurvey' . $survey->getId()];
		if (!empty($cookie) && $cookie == $survey->getId()) {
			//la encuesta ya fue respondida
			$smarty->assign('alreadyAnswered',true);
		}
		
		//verifico la utilizacion de captcha para construir la opcion en la vista
		if (Common::getSurveysCaptchaUse()) {
			$smarty->assign('useCaptcha',true);
		}		
		
		$questions = $survey->getSurveyQuestions();
		$smarty->assign("survey",$survey);
		$smarty->assign("surveyQuestion",$questions[0]);

		return $mapping->findForwardConfig('success');

	}

}