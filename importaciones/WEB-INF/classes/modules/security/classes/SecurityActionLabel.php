<?php

require_once 'om/BaseSecurityActionLabel.php';


/**
 * Skeleton subclass for representing a row from the 'security_actionLabel' table.
 *
 * etiquetas de actions de seguridad
 *
 * @package    security
 */	
class SecurityActionLabel extends BaseSecurityActionLabel {

	function getSQLInsert() {

		$query = "DELETE FROM `security_actionLabel` WHERE `action` = '" . $this->getAction() . "' and `language` = '" . $this->getLanguage() . "';\n";
	
		$query .= "INSERT INTO `security_actionLabel` ( `action` , `label` , `language` ) VALUES ('" . $this->getAction() . "', '" . $this->getLabel() . "', '" . $this->getLanguage() . "');";

		return $query;
	}	

} // SecurityActionLabel
