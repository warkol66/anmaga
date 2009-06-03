<?php
/**
* ContentListAction
* 
* Listado de los distintos contenidos y secciones.
* 
* @package  content
*/

require_once("BaseAction.php");
require_once("Content.class.php");

class ContentListAction extends BaseAction {

	function ContentListAction() {
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

		$smarty->assign("message",$_GET['message']);
		$module = "Content";
		$smarty->assign("module",$module);

		$content = new Content();
		$parent_id = 0;
		
		if (!isset($_GET['id_section']) || (isset($_GET['id_section']) && ($_GET['id_section'] == 0 ))) {
			//estoy en la raiz
			$elements = $content->getRootElements();
			$smarty->assign("navigationChain",$content->getNavigationChain());
		}
		else {
			//estoy en una rama del arbol
			$elements = $content->getChildrenElements($_GET['id_section']);
			$parent_id = $_GET['id_section'];

			//obtengo la descripcion de la seccion y su titulo
			$currentSection = $content->getSection($_GET['id_section']);
			$smarty->assign("navigationChain",$content->getNavigationChain($currentSection));
			$smarty->assign("sectionDescription",$currentSection['content']);
			$smarty->assign("sectionTitle",$currentSection['title']);
		}

	  	for ($i=0; $i<count($elements); $i++) {
    		$elements[$i]["typeName"] = $content->getTypeName($elements[$i]["type"]);
		}

		$smarty->assign("parent_id",$parent_id); //asignamos el id del padre
		$smarty->assign("elements",$elements);
		$fwd = $mapping->findForwardConfig('success');
		return $mapping->findForwardConfig('success');
		
	}

}
