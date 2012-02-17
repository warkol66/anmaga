<?php
/*
* Main
* Dispatcher del phpMVC
* @package phpMVCconfig
*/

// The application root directory
$appDir = NULL;
$appDir = dirname(__FILE__);

//processing using commandline
if (!empty($argc)) {

	//if called by commandline don't want any error display o reporting
	error_reporting(0);
	ini_set('display_errors',0);

	foreach ($argv as $value) {
		if (!preg_match('/Main.php/',$value)) {
			$parts = explode('=',$value);
			$_REQUEST[$parts[0]] = $parts[1];
			$_POST[$parts[0]] = $parts[1];
			$_GET[$parts[0]] = $parts[1];
		} 
	}
	$_ENV['PHPMVC_MODE_CLI'] = true;
}
else
	$_ENV['PHPMVC_MODE_CLI'] = false;

require_once ("$appDir/config/boot-php.inc.php");
