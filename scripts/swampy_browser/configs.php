<?php
/**
	@name Swampy File and Image Manager (SwampyBrowser) - Sample config file
	@version 1.2
	@author Domas Labokas domas@htg.lt
	@date 2009 04 03
	@see http://www.swampyfoot.com
	@copyright 2009 SwampyFoot
	@license SwampyBrowser is licensed under a Creative Commons Attribution-Noncommercial 3.0
	@license http://creativecommons.org/licenses/by-nc/3.0/
**/

//Carga de Configuracion de config.xml

$swampydir = getcwd();
chdir('../../');
if (file_exists('config/load_config.php')) {
	require_once('config/load_config.php');
	require_once('config/config.php');
}
else {
	chdir('../');
	require_once('config/load_config.php');
	require_once('config/config.php');
}

chdir($swampydir);
global $moduleRootDir;

global $system;

global $HOST;
$HOST = $_SERVER['HTTP_HOST'] . "/";

// absolute path to your public_html directory
global $PUBLIC_HTML_DIR;

$PUBLIC_HTML_DIR = substr($moduleRootDir,0,(strlen($moduleRootDir)-strlen('/WEB-INF'))) . '/';

// valid image extension
$IMAGE_EXTENSIONS = array("jpg", "jpeg","png", "gif");

/*
	DIRS - directories to use for file and image browsing and uploads
	title - Custom directory title
	dir - directory path in public_html ended with slash
*/

$directories = $system['config']['system']['fileBrowser']['directories'];
$DIRS = array();
foreach ($directories as $dirInfo) {
	array_push($DIRS,array('title'=>$dirInfo['title'], 'dir'=>$dirInfo['path'] . '/'));
}

/*
	IMAGE_FORMATS - custom image formats for uploading images
	title - format title
	dir - hidden directory for custom formats must start with dot(for being invisible in SwampyBrowser)
	ext - image type and extension. Avaliable formats (png,jpg,gif,false) false means image keeps its orginal extension and image type
	width/height - formated image width/height in pixels.  false meens auto count or leaves orginal
	scale - there are 5 image scale tipes:
		orginal - leaves image in its orginal size
		max - fits image to given size
		addbs - fits image to given size and adds backgroun to keep given size
		crop - crops image to given size
		stretch - stretches image to given size

	bg - is user only with addbg scale type, it specifies color of added background in HTML color code format
	mask - path to mask in public_html dir. It adds mask to the image, can be used to place logos on images,
		mask file must be png image ant fit exact size of given format 
*/

$IMAGE_FORMATS = array
(
	/// DO NOT DELETE THIS (mthumb format is used for generating thumbnails)
	'mthumb' =>	array('title'=>"",	 	'dir' => ".mthumbs/",	'ext'=>"png",'width' => 100,'height' => 100,'mask' => false, 'scale'=>"crop",   'bg'=>"FFFFFF"),
	//custom user predifined format for uploading and formating images
	'orginal' =>	array('title'=>"Original",	'dir' => "",        	'ext'=>false,'width' => 0,  'height' => 0,  'mask' => false, 'scale'=>"orginal",'bg'=>"FFFFFF"),
	'gthumb' =>	array('title'=>"Gallery thumb",	'dir' => ".gthumb/",	'ext'=>"png",'width' => 160,'height' => 100,'mask' => false, 'scale'=>"addbg",'bg'=>"FFFFFF"),
);

/* SwampyBrowser language selection (only English is avalible for now)*/
$LANG = "es";


/* You can add here login check because every php script is including this file first before any operation */

//validacion basica para los sistemas basados en phpmvc
//session_start();
//if (empty($_SESSION['login_user'])) {
//	die;
//}
