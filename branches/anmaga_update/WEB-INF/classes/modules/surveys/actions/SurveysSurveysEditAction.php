<?php

class SurveysSurveysEditAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function SurveysSurveysEditAction() {
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

    	if ( !empty($_GET["id"]) ) {
			//voy a editar un survey

			$survey = SurveyPeer::get($_GET["id"]);
			$smarty->assign("survey",$survey);
	    	$smarty->assign("action","edit");
		}
		else {
			//voy a crear un survey nuevo
			$survey = new Survey();
			$smarty->assign("survey",$survey);			

			$smarty->assign("action","create");
		}

		$moduleNews= ModulePeer::get('news');
		if (!empty($moduleNews) && ($moduleNews->getActive() == 1)) {
			//existe el modulo de noticias
			require_once("NewsArticlePeer.php");
			$smarty->assign('articles',NewsArticlePeer::getLastArticles(50));
			$smarty->assign('hasNews',true);
		}

		$smarty->assign("message",$_GET["message"]);

		return $mapping->findForwardConfig('success');
	}

}