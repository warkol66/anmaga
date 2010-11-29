<?php
/**
* ContentEditAction
* 
* Muestra el formulario para permitir la edición de un contenido
* 
* @package  content
*/

require_once("BaseAction.php");
require_once("Content.class.php");

class ContentEditAction extends BaseAction {

	function ContentEditAction() {
		;
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
		$smarty->assign("module",$module);
		$smarty->assign("loadAreaedit",0);

		$content = new Content();

		//es la edicion de un contenido o seccion
		//esta definido el tipo, id a modificar y la operacion es una modificacion
		if (isset($_GET['type']) && (isset($_GET['id'])) && (isset($_GET['operation']) && $_GET['operation']=="edit")) {
			
			$sections = $content->getSections();
			$smarty->assign("sections",$sections);
			
			$smarty->assign("type",$_GET['type']);
			
			if ($_GET['type'] == "section") {
				$section = $content->getSection($_GET['id']);
				$smarty->assign("section",$section);
				$smarty->assign("navigationChain",$content->getNavigationChain($section));

			}

			if ($_GET['type'] == "content") {
				
				$contents = $content->getContent($_GET['id']);
				$smarty->assign("content",$contents);
				$smarty->assign("navigationChain",$content->getNavigationChain($contents));
			
			}
			
			if ($_GET['type'] == "link") {
				$link = $content->getLink($_GET['id']);
				$smarty->assign("content",$link);
			}

			return $mapping->findForwardConfig('success');
		}
		
		//es la creacion de un contenido o seccion
		//solamente esta seteado el tipo a crear
		if (isset($_GET['type']) && isset($_GET['id_parent'])) {

			$smarty->assign("type",$_GET['type']);
			$smarty->assign("id_parent",$_GET['id_parent']);
			if (isset($_GET['operation']) != "edit")
				$smarty->assign("create",true);
			return $mapping->findForwardConfig('success');
			
		}
		
 		 return $mapping->findForwardConfig('failure');
	}

}
