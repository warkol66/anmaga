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
Propel::init("$moduleRootDir/config/application-conf.php");
require_once("UserPeer.php");
require_once("AffiliateUserPeer.php");

//ponemos el server en GMT-0
putenv('TZ=UTC');

