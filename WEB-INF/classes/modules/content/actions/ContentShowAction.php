<?php
/**
* ContentShowAction
* 
* Muestra un contenido
* 
* @package  content
*/

require_once("BaseAction.php");
require_once("Content.class.php");

class ContentShowAction extends BaseAction {

	function ContentShowAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

		BaseAction::execute($mapping, $form, $request, $response);

    /**
    * Use a different template
    */
		$this->template->template = "TemplateContent.tpl";

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}


		$module = "Content";
		$smarty->assign("MODULE",$module);

		$content = new Content();
		
		global $system;
		$contentHomeId = $system["config"]["content"]["home"];
		//Si no viene id como parametro, muestro el home
		if (isset($_GET['id']))
			$id = $_GET['id'];
		if (!isset($_GET['id']) || $_GET['id']<=0)
			$id = $contentHomeId;

		$contentData = $content->get($id);

		$smarty->assign("contentData",$contentData);

		$smarty->assign("parentId",$contentData['parent']);
		
		//El home usa template interno y externo distinto
		if ($contentHomeId == $contentData["id"]) {
			$this->template->template = "TemplateContentHome.tpl";
			return $mapping->findForwardConfig('home');
		}
		return $mapping->findForwardConfig('success');
	}

}
