<?php
/*
 * Definici�n de la Conexi�n a la Base de Datos
 *
 * @package Config
 */

include_once("WEB-INF/classes/includes/db_mysql.inc.php");


class DBConnection extends DB_Sql
{
  function DBConnection()
  {
	global $moduleRootDir;
	
	$configDbFromPropel = include("$moduleRootDir/config/application-conf.php");
	
	$configDbData = $configDbFromPropel["propel"]["datasources"]["application"]["connection"];
	
	$dsnParts = split("=",$configDbData["dsn"]);
	$database = $dsnParts[2];
	$dsnParts2 = split(";",$dsnParts[1]);
	$host = $dsnParts2[0];
	$user = $configDbData["user"];
	$password = $configDbData["password"];

  	$port = "";

	$this->Database = $database;
    $this->Host = $host;
    $this->User = $user;
    $this->Password = $password;
    $this->Port = $port;
  }
}
