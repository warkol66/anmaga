<?php
/*
 * Genera el archivo de configuracion de la aplicacisn si el mismo no existe.
 *
 */

if (file_exists("$appDir/config/config.php"))
	require_once("$appDir/config/config.php");
else {
	header("Content-type: text/html; charset=utf-8;"); 
	if ($handle = fopen("$appDir/config/config.php", "w")) {
		fwrite($handle,"<?php\n");
    fwrite($handle,"//Elimine las siguientes líneas luego de editar el archivo\n");
		fwrite($handle,"header('Content-type: text/html; charset=utf-8;');\n"); 
    fwrite($handle,"echo \"<p style='color:green'>Archivo de configuración 'config.php' creado! Editelo con su configuración.</p>\";\n");
    fwrite($handle,"die();");
    fwrite($handle,"//Fin del eliminar\n");
    fwrite($handle,"\n");
    fwrite($handle,"//Archivo de configuración\n");
    fwrite($handle,"\n");
    fwrite($handle,"//Directorio donde se encuentra phpmvc\n");
    fwrite($handle,'$appServerRootDir	= "";');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Directorio donde se encuentra la aplicación (sin barra al final)\n");
    fwrite($handle,'$moduleRootDir = substr(dirname(__FILE__), 0, -6) . \'WEB-INF\';');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Sistema operativo [UNIX|WINDOWS|MAC]\n");
    fwrite($handle,'$osType = PHP_OS;');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Propel Version\n");
    fwrite($handle,'$propelVersion = "";');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Código del idioma por defecto (ej: es_ES.UTF-8)\n");
    fwrite($handle,'$useLocale = "";');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Welcome path\n");
    fwrite($handle,'$welcomePath = "";');
    fwrite($handle,"\n\n");
    fwrite($handle,"//Login path\n");
    fwrite($handle,'$loginPath = "";');
    fwrite($handle,"\n\n");
    fclose($handle);
    echo "<p style='color:green'>Archivo de configuración 'config.php' creado! Editelo con su configuración.</p>";
    die();
	}
	else
		echo "<p style='color:red'>No se encuentra el archivo de configuración 'config.php' y fue imposible crearlo!</p>";
		die();
}
