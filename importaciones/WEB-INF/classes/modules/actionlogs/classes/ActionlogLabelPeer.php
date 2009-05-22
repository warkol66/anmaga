<?php

require 'actionlogs/classes/om/BaseActionlogLabelPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'actionlogs_label' table.
 *
 * Etiquetas de logueo
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    actionlogs.classes
 */
class ActionlogLabelPeer extends BaseActionlogLabelPeer {

  /**
	* Agrega una etiqueta
	* @param string $actionName nombre del action
	* @param string $language idioma
	* @param string $label etiqueta
	* @param string $forward tipo de forward
	* @return true si salio todo ok
	*/
	
	function add($actionName,$language,$label,$forward) {
		
		$actionlogLabelObj = new ActionlogLabel();
		$actionlogLabelObj->setAction($actionName);
		if ($label != 'label') $actionlogLabelObj ->setLabel($label);
		$actionlogLabelObj ->setLanguage($language);
		$actionlogLabelObj ->setForward($forward);
		$actionlogLabelObj ->save();
		return true;

  }

	/**
	* Obtiene una etiqueta
	* @param string $action nombre del action
	* @param string $forward tipo de forward
	* @param string $language idioma
	* @return object $obj objeto encontrado
	*/

	function getAllByInfo($action,$forward,$language) {
		$criteria = new Criteria();
		$criteria->add(ActionlogLabelPeer::ACTION, $action);
		$criteria->add(ActionlogLabelPeer::LANGUAGE, $language);
		$criteria->add(ActionlogLabelPeer::FORWARD, $forward);
    $obj = ActionlogLabelPeer::doSelect($criteria);
    return $obj[0];
	}

	/**
	* Obtiene una etiqueta dependiendo el nombre del action y el forward
	* @param string $action nombre del action
	* @param string $forward tipo de forward
	* @return object $obj objeto encontrado
	*/

	function getAllByActionLanguageEsp($action,$forward) {
		$criteria = new Criteria();
		$criteria->add(ActionlogLabelPeer::ACTION, $action);
		$criteria->add(ActionlogLabelPeer::LANGUAGE, 'esp');
		$criteria->add(ActionlogLabelPeer::FORWARD, $forward);
    $obj = ActionlogLabelPeer::doSelect($criteria);
    return $obj[0];
	}

	/**
	* Obtiene el sql para eliminar los una etiqueta dependiendo el nombre del action y el forward
	* @param string $module nombre del modulo
	* @param string $language código del idioma
	* @return string $sql para eliminar registros
	*/

	function getSQLCleanup($module,$language) {
		$sql = "DELETE FROM `actionlogs_label` WHERE `action` LIKE '" . $module . "%' AND `language` = '" . $language . "';";
		return $sql;
	}

} // ActionlogLabelPeer
