<?php
/**
* Prepend
*
* $author Modulos Empresarios / Egytca
* @package phpMVCconfig
*/


#if(!defined('CONFIGRULESET'))
#	include_once './WEB-INF/configRules/ConfigRuleSet.php';

//includes del phpMVC1.1
  include_once 'Locale.php';
  include_once 'PropertyMessageResources.php';

require_once 'propel/Propel.php';
ini_set("include_path",ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__)."/classes/propel/build/classes/");
ini_set("include_path",ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__)."/classes/propel/build/classes/anmaga");
ini_set("include_path",ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__)."/classes/ml/build/classes/");
Propel::init("$moduleRootDir/config/anmaga-conf.php");
require_once("UserPeer.php");
require_once("UserByAffiliatePeer.php");

?>
