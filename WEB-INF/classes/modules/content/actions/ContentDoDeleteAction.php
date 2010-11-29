<?php
/**
* ContentDoDeleteAction
* 
* Elimina un contenido
* 
* @package  content
*/

require_once("BaseAction.php");
require_once("Content.class.php");

class ContentDoDeleteAction extends BaseAction {


	function ContentDoDeleteAction() {
		;
	}

	function getForward($forward,$sectionId,$mapping) {

		$myRedirectConfig = $mapping->findForwardConfig($forward);
		$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&id_section='.$sectionId;
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;

	}


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


		$module = "Content";
		$content = new Content();
		$result = false; //resultado de la operacion
		
		if (isset($_POST['id'])) {		
			$res = $content->getContent($_POST['id']);
			$result = $content->deleteContent($res);
		}
		
		//segun el resultado de la operacion indico si fue exitosa o no
		if ($result) {
			return $this->getForward("success",$res['parent'],$mapping);
		}
		
		return $this->getForward("failure",$res['parent'],$mapping);
			

		
	}

}
