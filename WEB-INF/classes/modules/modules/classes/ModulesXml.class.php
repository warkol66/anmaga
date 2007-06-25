<?php

require_once('includes/common.inc.php');
require_once("config/DBConnection.inc.php");

/**
* Utilizada para obtener informacion de las solicitudes.
*
* @package mod_solicitudes
*/
class ModulesXml {

	/**
	* Constructor de la clase Solicitudes
	*
	* Inicializa los atributos de la clase
	* @param integer $concesionario Id del concesionario. -1 para obtener las solicitudes de todos los concesionarios
	*/
	function ModulesXml() {
	}

	
	
	/**
	*  Guarda 1 tag de xml
	*
	* @param string $action con el nombre del action
	* @param string $modulo con el nombre del modulo al cual pertenece el action
	* @param int $access con el numero de acceso que tendrá el action
	* @return true si todo está ok
	*/

	function insertTag($parentId,$tag,$value) {

		$db = new DBConnection();
		$db->connect();
		$query = "INSERT INTO modules_xml(parentId,tag,value)
              VALUES('$parentId','".$tag."','".$value."')";          
		$db->query($query);

		$query = "SELECT MAX(ID) FROM modules_xml";
		$db->query($query);
		$db->next_record();
		$result = $db->recordset2Array();

		return $result["0"]["0"];

	}


}
?>
