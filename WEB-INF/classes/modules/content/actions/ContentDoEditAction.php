<?php
/**
* ContentDoEditAction
* 
* Guarda los cambios realizados a un contenido
* 
* @package  content
*/

require_once("BaseAction.php");
require_once("Content.class.php");

class ContentDoEditAction extends BaseAction {

	function ContentDoEditAction() {
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
	
		if (isset($_POST['content_type'])) {
			$_POST['type'] = $_POST['content_type'];
		}

		/**
		 * 
		 *	casos de edicion de contenidos y secciones existentes
		 *
		 **/
		if (isset($_POST['id']) && isset($_POST['type'])) {
		
			if ($_POST['type'] == "section") {
				
				$res = $content->getSection($_POST['id']);
				
				//validacion de que el titulo tenga un valor asignado
				if (isset($_POST['title']) && $_POST['title'] != "") {
					
					if ($content->updateSection($_POST['id'],$_POST['title'],$_POST['titleInMenu'],$_POST['content']))
						return $this->getForward("success",$res['parent'],$mapping);
						
					
					//no se pudo guardar						
					return $this->getForward("failure",$res['parent'],$mapping);
	
				}
				//no paso la validacion
				return $this->getForward("failure",$res['parent'],$mapping);
			}
			
			if (($_POST['type'] == "content") || ($_POST['type'] == "link")) {

				$res = $content->getContent($_POST['id']);

				//validacion de que el titulo y contenido tengan valores asignados
				if (isset($_POST['title']) && isset($_POST['content']) && $_POST['title'] != "" ) {
					
					if (($_POST['type'] == 'content') && ($_POST['content'] != "")) {

						if ($content->updateContent($_POST['id'],$_POST['title'],$_POST['titleInMenu'],$_POST['content'],$_POST['parent']))
									return $this->getForward("success",$res['parent'],$mapping);
					}
				}

				//validacion de que el titulo y contenido tengan valores asignados
				if (isset($_POST['title']) && isset($_POST['link']) && $_POST['title'] != "" ) {

					if ($_POST['type'] == 'link' && ($_POST['link'] != "")) {
						if ($content->updateLink($_POST['id'],$_POST['title'],$_POST['titleInMenu'],$_POST['link'],$_POST['target'],$_POST['parent']))
									return $this->getForward("success",$res['parent'],$mapping);
					}
				}else
					return $this->getForward("failure",$res['parent'],$mapping);
						
				}	

			//no paso la validacion
			return $this->getForward("failure",$res['parent'],$mapping);

		}
			
		/**
		 * 
		 *	casos de creacion de nuevos contenidos y secciones
		 *
		 **/
		if (isset($_POST['type']) && isset($_POST['parent'])) {
			
			if ($_POST['type'] == "section") {
				
				//validacion de que el titulo tenga un valor asignado
				if (isset($_POST['title']) && $_POST['title'] != "" ) {
					
					if ($content->addSection($_POST['title'],$_POST['titleInMenu'],$_POST['parent'],$_POST['content']))
						return $this->getForward("success",$_POST["parent"],$mapping);
					
					//no se pudo guardar						
				return $this->getForward("failure",$_POST["parent"],$mapping);
	
				}
				
				//no paso la validacion
				return $this->getForward("failure",$_POST["parent"],$mapping);
			}
			
			if (($_POST['type'] == "content") || ($_POST['type'] == "link")) {

				//validacion de que el titulo y contenido tengan valores asignados
				if (isset($_POST['title']) && isset($_POST['content']) && $_POST['title'] != "" ) {
					
					if (($_POST['type'] == 'content') && ($_POST['content'] != "")) {
						
						if ($content->addContent($_POST['title'],$_POST['titleInMenu'],$_POST['content'],$_POST['parent'])) {
							return $this->getForward("success",$_POST["parent"],$mapping);
							}
					}
			}
				if (($_POST['type'] == 'link') && ($_POST['link'] != "")) {

					if ($content->addLink($_POST['title'],$_POST['titleInMenu'],$_POST['link'],$_POST['target'],$_POST['parent'])) {

						return $this->getForward("success",$_POST["parent"],$mapping);		
						
						}
				}else
					return $this->getForward("failure",$_POST["parent"],$mapping);
	
				}
				
				//no paso la validacion
				return $this->getForward("failure",$_POST["parent"],$mapping);
			
		}
			
	}

}
