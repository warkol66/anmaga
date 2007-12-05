<?php
/*
 * Definición de la Conexión a la Base de Datos
 *
 * @package Config
 */

include_once("WEB-INF/classes/includes/db_mysql.inc.php");

class DBConnection extends DB_Sql
{
  function DBConnection()
  {
  	$database = "anmaga";
  	$host = "localhost";
  	$user = "root";
  	$password = "vertrigo";
  	$port = "";

		$this->Database = $database;
    $this->Host = $host;
    $this->User = $user;
    $this->Password = $password;
    $this->Port = $port;
  }
}
?>
