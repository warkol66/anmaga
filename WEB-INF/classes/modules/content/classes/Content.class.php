<?php
/**
* Clase Content
* 
* Utilizada para acceder a la base de datos donde se encuentran los distintos contenidos y secciones.
* 
* @package  content
*/

global $moduleRootDir;
require_once($moduleRootDir."config/DBConnection.inc.php");

define("MOD_CONTENT_CONTENT","0");
define("MOD_CONTENT_SECTION","1");
define("MOD_CONTENT_LINK","2");

class Content {

	var $db;
	var $tablePrefix;

   /**
  	* Constructor de la clase Modulos
  	*
  	* Inicializa los atributos de la clase
  	*/
	function Content() {
		global $tablePrefix;
		$this->tablePrefix = $tablePrefix;
		$this->db = new DBConnection();

	}

	function getTypeName($type) {

		switch ($type) {
			case MOD_CONTENT_CONTENT: return "content";
			case MOD_CONTENT_SECTION: return "section";
			case MOD_CONTENT_LINK: return "link";
		}

 	}
	
	 /**
	  * Obtiene todos los contenidos y links que no dependen de ninguna seccion.
	  * @return array content
	  */
	 function getRootElements() {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = 0 AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 	

	 }

	 /**
	  * Obtiene todas los contenidos hijos de una determinada seccion
	  * @param integer id id de seccion
	  * @return array
	  */
	 function getChildrenElements($id) {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = $id AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 	

	 }
	 
	 /**
	  * Obtiene todos los contenidos que no dependen de ninguna seccion.
	  * @return array content
	  */
	 function getRootContents() {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = 0 AND type = " . MOD_CONTENT_CONTENT . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 	
	 	
	 }
	 /**
	  * Obtiene todas las secciones que no dependen de ninguna seccion
	  * @return array section
	  */
	 function getRootSections() {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = 0 AND type = " . MOD_CONTENT_SECTION . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 		 	
	 	
	 }
	 
	 /**
	  * Obtiene todas las secciones que no dependen de ninguna seccion
	  * @return array section
	  */
	 function getRootLinks() {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = 0 AND type = " . MOD_CONTENT_LINK . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 		 	

	 }
	 
	 /**
	  * Obtiene todos las secciones hijas de una determinada seccion
	  * @param integer id id de seccion
	  * @return array
	  */
	 function getChildrenSection($id) {
	 	
	 	$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
	 	$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = $id AND type = " . MOD_CONTENT_SECTION . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;
	 }
	 /**
	  * Obtiene todas los contenidos hijos de una determinada seccion
	  * @param integer id id de seccion
	  * @return array
	  */
	 function getChildrenContent($id) {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
	 	$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = $id AND type = " . MOD_CONTENT_CONTENT . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 	
	 	
	 }
	 
	 /**
	  * Obtiene todas los contenidos hijos de una determinada seccion
	  * @param integer id id de seccion
	  * @return array
	  */
	 function getChildrenLink($id) {

		$db = $this->db;
		$currentLanguageCode = Common::getCurrentLanguageCode();
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = $id AND type = " . MOD_CONTENT_LINK . " AND language ='$currentLanguageCode' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;	 	

	 }

	 
	 /**
	  * Agrega una seccion
	  * 
	  * @param string titulo de la seccion
	  * @param string descripcion de la seccion
	  * @param integer id del padre si es que tiene.
	  */
	 function addSection($title, $language, $titleInMenu="", $parent = null, $description = "") {
				
		$db = $this->db;
		$query = "INSERT INTO ". $this->tablePrefix . "content_content(type,parent,language,title,titleInMenu,content) VALUES(". MOD_CONTENT_SECTION .",$parent,'$title','$language','$titleInMenu','$description')";
		$db->query($query);
		if($db->affected_rows()>0) {
			return true;
		}
		else return false;
	 	
	 }
	 /**
	  * Agrega un nuevo contenido hijo de una determinada seccion si la misma es especificada
	  *  
	  * @param string $title 
	  * @param string $image
	  * @param string $imageOnOver
	  * @param string $alt
	  * @param string $content
	  * @param string $link
	  * @param integer $order
	  * @param integer $parent
	  *  
	  */
	 function addContent($title,$language,$titleInMenu="",$content,$parent,$image="",$imageOnOver="",$alt="",$link="",$order="") {
//		echo $titleInMenu;
		$db = $this->db;
		$query = "INSERT INTO ". $this->tablePrefix . "content_content(type,parent,language,title,titleInMenu,image,imageOnOver,alt,content,link) 
							VALUES(". MOD_CONTENT_CONTENT .",$parent,'$title','$language','$titleInMenu','$image','$imageOnOver','$alt','$content','$link')";
		$db->query($query);
		if($db->affected_rows()>0) {
			return true;
		}
		else return false;
			 	
	 }
	 /**
	  * Agrega un Link
	  *  
	  * @param string $title 
	  * @param string $image
	  * @param string $imageOnOver
	  * @param string $alt
	  * @param string $content
	  * @param string $link
	  * @param integer $order
	  * @param integer $parent
	  *  
	  */
	 function addLink($title,$language,$titleInMenu="",$link="",$target=0,$parent="",$image="",$imageOnOver="",$alt="",$content="",$order="") {

		$db = $this->db;
		$query = "INSERT INTO ". $this->tablePrefix . "content_content(type,parent,language,title,titleInMenu,image,imageOnOver,alt,content,link,target) 
							VALUES (". MOD_CONTENT_LINK.",$parent,'$title','$language','$titleInMenu','$image','$imageOnOver','$alt','$content','$link',$target)";
		$db->query($query);
		if($db->affected_rows()>0) {
			return true;
		}
		else return false;

	 }

	 /**
	  * Obtiene un contenido sin tipo a partir de un id
	  * @param integer $id de un contenido
	  */
	 function get($id) {

	 	$db = $this->db;
	 	$result = array();
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE id = '$id' AND language = '$language'";
		$db->query($query);
		$db->next_record();
		$result = $db->Record;
		return $result;
	 	
	 }
	 
	 /**
	  * Obtiene un contenido a partir de un id
	  * @param integer $id de un contenido
	  */
	 function getContent($id) {
	 	
	 	$db = $this->db;
	 	$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE id = $id AND language = '$language'"; // AND type = " . MOD_CONTENT_CONTENT;
		$db->query($query);
		$db->next_record();
		$result = $db->Record;
		return $result;
	 	
	 }
	 
	 /**
	  * Obtiene un contenido a partir de un id
	  * @param integer $id de un contenido
	  */
	 function getLink($id) {

		$db = $this->db;
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE id = $id AND type = " . MOD_CONTENT_LINK . " AND language = '$language'";
		$db->query($query);
		$db->next_record();
		$result = $db->Record;
		return $result;

	 }
	 
	 /**
	  * Obtiene una seccion a partir de un id
	  * @param integer $id de una seccion
	  */
	function getSection($id) {
		
		$db = $this->db;
	 	$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE id = $id AND type = " . MOD_CONTENT_SECTION . " AND language = '$language'";
		$db->query($query);
		$db->next_record();
		$result = $db->Record;
		return $result;	
		
	}
	/**
	 * Actualiza una seccion
	 * 
	 * @param integer $id id de la seccion
	 * @param string $title titulo de la seccion
	 * @param string $description descripcion de la seccion
	 */
	function updateSection($id,$title,$titleInMenu = "",$description = "") {	
	
		$db = $this->db;
		$query = "UPDATE ". $this->tablePrefix . "content_content SET title = '$title', titleInMenu = '$titleInMenu', content = '$description' WHERE id = $id AND type = " . MOD_CONTENT_SECTION . " AND language = '$language'";
		$db->query($query);
		if($db->affected_rows()>0)
			return true;
		else 
			return false;
	}

	/**
	 * Actualiza un contenido
	 * 
	 * @param integer $id id de la seccion
	 * @param string $title titulo del contenido
	 * @param string $title titulo en el menu
	 * @param string $content
	 * @param string $image
	 * @param string $imageOnOver
	 * @param string $alt
	 * @param string $link
	 * @param integer$order
	 */
	
	function updateContent($id,$title,$titleInMenu="",$content,$parent,$image="",$imageOnOver="",$alt="",$link="",$order="") {	

		$db = $this->db;
		$query = "UPDATE ". $this->tablePrefix . "content_content SET title = '$title', titleInMenu = '$titleInMenu', content = '$content', image = '$image', imageOnOver = '$imageOnOver', alt = '$alt', link = '$link',parent = $parent WHERE id = $id AND type = " . MOD_CONTENT_CONTENT . " AND language = '$language'";
		$db->query($query);
		if($db->affected_rows()>0)
			return true;
		else 
			return false;
	}
	
	/**
	 * Actualiza un contenido
	 * 
	 * @param integer $id id de la seccion
	 * @param string $title titulo del contenido
	 * @param string $title titulo en el menu
	 * @param string $content
	 * @param string $image
	 * @param string $imageOnOver
	 * @param string $alt
	 * @param string $link
	 * @param integer$order
	 */

	function updateLink($id,$title,$titleInMenu="",$link,$target,$parent,$image="",$imageOnOver="",$alt="",$content="",$order="") {	
		
		$db = $this->db;
		$query = "UPDATE ". $this->tablePrefix . "content_content SET title = '$title', titleInMenu = '$titleInMenu', content = '$content', image = '$image', imageOnOver = '$imageOnOver', alt = '$alt', link = '$link', parent = $parent, target = $target WHERE id = $id AND type = " . MOD_CONTENT_LINK . " AND language = '$language'";
		$db->query($query);
		if($db->affected_rows()>0)
			return true;
		else 
			return false;
	}

	function delete($id) {
		
 	}

	/**
	 * Elimina un contenido
	 * 
	 * @param array $content info del contenido.
	 */
	function deleteContent($content) {

		$db = $this->db;
		$id = $content["id"];
		$language = $content["language"];
		if ($content["type"] == MOD_CONTENT_SECTION) {
			return $this->deleteSection($id);
		}
		else {
			$query = "DELETE FROM ". $this->tablePrefix . "content_content WHERE id = $id AND language = '$language'";
			$db->query($query);
			if($db->affected_rows()>0)
				return true;
			else 
				return false;
		}
	}

	/**
	 * Me indica si una seccion tiene hijos (ya sean contenidos o secciones)
	 * 
	 * @param integer $id id de una seccion
	 */
	function sectionHasChildren($id) {

		$db = $this->db;
	 	$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE parent = $id";
		$db->query($query);
		$result = $db->recordset2Array();
		if (empty($result))
			return false;
		
		return true;		
	}
	
	/**
	 * Elimina una seccion, si la misma se encuentra vacia
	 * (no tiene contenidos ni secciones en su interior)
	 * @param integer $id id de seccion
	 */
	function deleteSection($id) {

		$db = $this->db;
		if ($this->sectionHasChildren($id)) {
			$children = $this->getChildrenElements($id);
			foreach ($children as $child) {
				if ($child['type'] == MOD_CONTENT_CONTENT)
					$this->deleteContent($child['id']);
				if ($child['type'] == MOD_CONTENT_LINK)
					$this->deleteLink($child['id']);
				if ($child['type'] == MOD_CONTENT_SECTION)
					$this->deleteSection($child['id']);					
			}
		}
			
		$query = "DELETE FROM ". $this->tablePrefix . "content_content WHERE id = $id";
		$db->query($query);
		if($db->affected_rows()>0)
			return true;
		else 
			return false;
		
	}
	
	/**
	 * Actualiza el orden de un elemento
	 * @param $id id del elemento
	 * @param $order numero de orden
	 */
	function updateOrder($id,$order) {
		$db = $this->db;
		$query = "UPDATE ". $this->tablePrefix . "content_content SET `order` = '$order' WHERE id = '$id'";
		$db->query($query);
		if($db->affected_rows()>0)
			return true;
		else 
			return false;
	
	}
	
	function getMenuRecursive($sectionId=0,$depth,$currentDepth) {
		
		if ($depth != null) {
			$currentDepth++;
			//si se llega al limite de profundidad
			if ($depth == $currentDepth) {
				return array();
			}
		}
		
	 	//por default se obtiene la del padre
		$rootElements = $this->getChildrenElements($sectionId);
		for ($i = 0; $i < count($rootElements) ; $i++) {
		
			if ($rootElements['menu'][$i]['type'] == MOD_CONTENT_SECTION) {
				
				$childrenSection = $this->getMenu($rootElements[$i]['id'],$depth,$currentDepth);
				$rootElements['menu'][$i][childs] = $childrenSection;
				
			}		
		
		}
	
		return $rootElements;
	
	}
	
	/**
	 * Obtiene el menu del los contenidos del sitio a partir de una seccion determinada seccion.
	 * Si no se indica seccion, busca a partir del raiz.
	 * Devuelve un array de elementos con cada uno de los contenidos,links o secciones que estan dentro de la seccion. 
	 * Si el elemento contenido fuera una seccion tendra un array 'childs' que contendra los 
	 * elementos hijos de esa seccion, el cual tendra la misma estructura.
 	 * 
	 * En caso de que una seccion no tenga elementos, existira el array childs vacio.
	 *
	 * @param contenido
	 * @param integer $backToParent 1 o 0 para ver o no el link de regreso al padre
	 * @param depth pedido de la profundidad.
	 * @param array() devuelve un array con las caracteristicas descriptas arriba.
	 */
	 function getMenu($content,$backToParent,$depth) {
	 	//por default se obtiene la del padre
		
		if ($content['type'] == MOD_CONTENT_SECTION) {
			$sectionId = $content['id'];
			$parentId = $content['parent'];
		}
		
		if ($content['type'] == MOD_CONTENT_CONTENT) {
			$sectionId = $content['parent'];
			$parentId = $content['parent'];
		}
		
		$rootElements = array();
		$rootElements['menu'] = $this->getChildrenElements($sectionId);
		
		$currentDepth = 0;
		for ($i = 0; $i < count($rootElements['menu']) ; $i++) {
			
		
			if ($rootElements['menu'][$i]['type'] == MOD_CONTENT_SECTION) {
				$childrenSection = $this->getMenuRecursive($rootElements['menu'][$i]['id'],$depth,$currentDepth);
				$rootElements['menu'][$i][childs] = $childrenSection;
				
			}		
		
		}
		
		if ($backToParent === 1 && $sectionId != 0) {
			
				$rootElements['parentId'] = $parentId;
		}

		return $rootElements;
	 
	 }
	 
	 /**
	  * Dado un elemento contenido devuelve su cadena de navegacion
	  * @param array que representa un Content
	  * @param array de Contents ordenados segun la navegacion.
	  */
	 function getNavigationChain($content) {
			
			$chain = array();
			
			if (!empty($content)) {
			
				$current = $content;
				array_push($chain,$content);

				while ($current['parent'] != 0) {
				
					$parent = $this->get($current['parent']);
					array_push($chain,$parent);
					$current = $parent;
				
				}
			}
			//agregamos referencia a base
			$base = array();
			$base['titleInMenu'] = 'Base';
			array_push($chain,$base);
			
			return array_reverse($chain);
			
	 }
	
	function getSections() {
		
		$db = $this->db;
		$result = array();	
		$query = "SELECT * FROM ". $this->tablePrefix . "content_content WHERE type = " . MOD_CONTENT_SECTION . " AND language = '$language' ORDER BY `order`";
		$db->query($query);
		$result = $db->recordset2Array();
		return $result;		
		
	}
	
} // end of class