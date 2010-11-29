<?php
/**
* Clase ContentInclude
* 
* Extiende la clase content para ser utilizada como include
* 
* @package  content
*/

require_once("Content.class.php");

class ContentInclude extends Content {

	function getShow($options) {
		$content = $this->getContent($options["id"]);
		return $content;
	}

	/**
	 * Generacion de menus
	 * @param $options opciones: 
	 *							"id": id de contenido o seccion
	 *							"noParent": no muestra al padre
	 *							"depth": nivel de profundidad a mostrar
	 */
	function getMenu($options) {
		
		$contentData = $this->get($options["id"]);
		$depth = intval($options["depth"]);
		$backToParent = intval($options['backToParent']);	

		$currentLanguageCode = Common::getCurrentLanguageCode();

		$menuValues = Content::getMenu($contentData,$backToParent,$depth);

		return $menuValues;
	}

	
} // end of class