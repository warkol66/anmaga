<?php

require_once 'om/BaseModuleLabel.php';


/**
 * Skeleton subclass for representing a row from the 'modules_label' table.
 *
 * Etiquetas de modulos 
 *
 * @package    modules
 */	
class ModuleLabel extends BaseModuleLabel {

	/**
	 *	Devuelve un SQL Insert para el la tabla de ModuleLabel
	 *	a partir de la informacion de la instancia
	**/
	function getSQLInsert() {
		$name = $this->getName();
		$label = $this->getLabel();
		$description = $this->getDescription();
		$lang = $this->getLanguage();
		$sql = "INSERT INTO `modules_label` ( `name` , `label` , `description` , `language` ) VALUES ('$name', '$label', '$description', '$lang');";
		return $sql;	
	}
	/**
	 *	Devuelve un SQL Insert para el la tabla de ModuleLabel para el idioma Espaniol
	 *	a partir de la informacion de la instancia
	 *	@param $name Nombre del Modulo
	 *	@param $label Label del modulo
	 *	@param $description Descripcion del Modulo
	**/

	function getSQLInsertSpanish() {
		return $this->getSQLInsert('esp');
	}
	
	/**
	 *	Devuelve un SQL Insert para el la tabla de ModuleLabel para el idioma Ingles
	 *	a partir de la informacion de la instancia
	 *	@param $name Nombre del Modulo
	 *	@param $label Label del modulo
	 *	@param $description Descripcion del Modulo
	**/
	function getSQLInsertEnglish() {
		return $this->getSQLInsert('eng');	
	}

	/**
	 * genera el codigo SQL de limpieza de las tablas afectadas al modulo.
	 * @return string SQL
	 */
	public function getSQLCleanup() {
		
		$sql = "DELETE FROM `modules_label` WHERE `name` = " . "'" . $this->getName() . "'" . ';';
		return  $sql;

	}	


} // ModuleLabel
