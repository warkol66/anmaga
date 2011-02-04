<?php 
/** 
 * BackupPeer
 *
 * @package backup 
 */

require_once('config/DBConnection.inc.php');
require_once('includes/mysql_dump.inc.php');
require_once("xml2ary.php");

	/**
	 * Generacion de Backups de la base
	 * Tanto para PHP4 como PHP5, y no tiene dependencias con propel
	 * Para que el mismo funcione, debe estar configurado DBConnection.inc.php en /config/
	 *
	 * @todo verificacion de prefijo de tablas.
	 * 
	 */
class BackupPeer {
	
	var $header = '';
	var $pathIgnoreList = array('backups/','WEB-INF/smarty_tpl/templates_c');
	
	/**
	 * Verifica actualemente si la configuracion de la base tiene prefijo
	 *
	 * @return el prefijo de la tabla si lo tiene, false sino
	 */
	function configHasPrefix() {
		
		$prefix = $this->header;
		if (!empty($prefix))
			return $this->header;
		
		global $system;
		
		$tablePrefix = $system['config']['system']['parameters']['tablePrefix'];
		
		if (empty($tablePrefix))
			return false;
		
		return $tablePrefix;
	}
	
	/**
	 * Permite indicar una cabecera opcional para poder obtener solo un conjunto de tablas
	 * @param string table header
	 */
	function setTableHeader($header) {
		
		$this->header = $header;
		return true;
	}
	
	/**
	 * Obtiene el listado de backups almacenados en el servidor
	 *
	 * @return array de nombres de archivo
	 */
	function getBackupList() {
		
		$path = 'WEB-INF/../backups/';
		$dir = opendir($path);
		$filenames = array();
	
		while ($file = readdir($dir)) {
		
			if (preg_match("/\.zip/i",$file)) {
				$filename    = $path . $file;
        $file_object = array(
                                'name' => $file,
                                'size' => (filesize($filename) / 1024),
                                'time' => filemtime($filename)
                            );

				array_push($filenames,$file_object);
			}
		
		}
		//ordenamos los nombres de archivo
		sort($filenames);

		return $filenames;
	}
	
	/**
	 * Generacion del SQL con los datos del sistema
	 * @param $path String Ruta donde se guardaran los backups en el servidor
	 * @return $filecontents String SQL
	 */
	function buildDataBackup($filename,$path = 'WEB-INF/../backups/') {

		$db = new DBConnection();

		$connection = @mysql_connect($db->Host,$db->User,$db->Password);

		require_once('TimezonePeer.php');
		
		$dumper = new MySQLDump($db->Database,$path . $filename,false,false);
		
		//verificamos si tiene table prefix
		if (($tablePrefix = BackupPeer::configHasPrefix()) != false)
			$dumper->setTablePrefix($tablePrefix);
		
		$headerAndFooter = $this->getDumpHeaderAndFooter();
		$header = $headerAndFooter["header"];
		$footer = $headerAndFooter["footer"];				
		
		$filecontent = $dumper->doDumpToString();
		
		$filecontents = $header.$filecontent.$footer;

		mysql_close($connection);
		
		return $filecontents;
		
	}
	
	/**
	 * Devuelve el datetime actual
	 * @return String
	 */
	function getCurrentDatetime() {

		$timezonePeer = new TimezonePeer();
		$timestamp = $timezonePeer->getServerTimeOnGMT0();
		$datetime = date('Y-m-d  H:i:s',$timestamp);
		$currentDatetime = Common::getDatetimeOnTimezone($datetime);
		
		return $currentDatetime;
	}
	
	/**
	 * Crea un backup de datos en el servidor
	 *
	 * @todo Ver de donde obtener nombre de sistema
	 * @todo Ver como separar los casos con prefijo solamente
	 * @return true si fue exitoso, false sino
	 */
	function createDataBackup($path = 'WEB-INF/../backups/') {
		
		$currentDatetime = BackupPeer::getCurrentDatetime();
					
		$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.zip';
		
		$filecontents = BackupPeer::buildDataBackup($filename,$path);
		
		BackupPeer::writeToBackupLog('Se ha creado un backup de datos en el servidor');
					
		$zipContents = BackupPeer::getZipFromDataFile($filecontents);	
		
		if ($fp = fopen($path . $filename, 'a')) {
  			fwrite($fp, $zipContents);

  			fclose($fp);
		}
		else 
			return false;
		
		return true;;
				
	}

	/**
	 * Crea un backup en el servidor
	 *
	 * @todo Ver de donde obtener nombre de sistema
	 * @todo Ver como separar los casos con prefijo solamente
	 * @return true si fue exitoso, false sino
	 */
	function createCompleteBackup($path = 'WEB-INF/../backups/') {
		
		$currentDatetime = BackupPeer::getCurrentDatetime();

		$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.zip';
		
		$filecontents = BackupPeer::buildDataBackup($filename,$path);
		
		BackupPeer::writeToBackupLog('Se ha creado un backup completo en el servidor');

		$zipContents = BackupPeer::getCompleteBackupZipFromDataFile($filecontents);	
		
		if ($fp = fopen($path . $filename, 'a')) {
  			fwrite($fp, $zipContents);

  			fclose($fp);
		}
		else 
			return false;
		
		return true;;
				
	}

	/**
	 * Restauracion de Backup de sql
	 * @param $sqlQuery string query a ejecutar
	 */
	function restoreSQL($sqlQuery) {

		//$sql = str_replace("\n","",$sql);
		$db = new DBConnection();
		$connection = @mysql_connect($db->Host,$db->User,$db->Password);
		$queries = explode(";\n",$sqlQuery);
	
		//guardamos una copia actual del contenido de la base de datos en el servidor en /backups/restore		
		$this->setTableHeader('actionLogs_');
		$this->createDataBackup('WEB-INF/../backups/restore/');
		$this->writeToBackupLog('Se ha guardado una copia de resguardo en la base actual en /backups/restore/: ');
	
		foreach ($queries as $query) {
			$query = trim($query);
			if (!empty($query))
				$db->query($query);
		}

		mysql_close($connection);
		
	}
	

	/**
	 * Restaura un backup en del servidor
	 *
	 * @return true si fue exitoso, false sino
	 */		
	function restoreBackup($zipFilename) {
		require_once("zip.class.php"); 
		
		$zipfile = new zipfile; 
		$zipfile->read_zip($zipFilename);

		$sql = '';

		foreach($zipfile->files as $filea)
		{
			// condicion de busqueda del archivo SQL
			if ($filea["name"] == "dump.sql" && $filea["dir"] == './db' ) {
				$sql = $filea["data"];
			}
			
			//condicion para detectar archivos a reemplazar
			if (strpos($filea["dir"],'./files') !== false) {

				if ($filea['dir'] === './files') {
					$path = '';
				}
				else {
					$clearRoute = explode('\.\/files\/',$filea['dir']);
					$path = $clearRoute[1] . '/';
				}
				//guardamos el archivo en su ubicacion
				file_put_contents('WEB-INF/../' . $path . $filea["name"] , $filea['data']);
			}
		} 			

		//hay procesamiento de SQL
		if (!empty($sql)) {
			BackupPeer::restoreSQL($sql);
		}
		
		//obtencion de filename sin ruta
		$parts = explode('/',$zipFilename);
		$filename = $parts[count($parts)-1];
		
		$text = 'Se ha restaurado el backup en el servidor de nombre de archivo: ' . $filename;
		$this->writeToBackupLog($text);

		//mail a administrador
		require_once('EmailManagement.php');

		global $system;

		$subject = 'Notificacion de Restauracion usando Modulo de Backup';
		$destination = $system["config"]["system"]["parameters"]["webmasterMail"];
		$mailFrom = $system["config"]["system"]["parameters"]["fromEmail"];
		$manager = new EmailManagement();

		//creamos el mensaje multipart
		$message = $manager->createMultipartMessage($subject,$text);

		//realizamos el envio
		$result = $manager->sendMessage($destination,$mailFrom,$message);
		
		return true;
		
	}

	/**
	 * Devuelve el contenido de un backup de datos de archivo
	 *
	 * @return string contenido del backup en SQL
	 */		
	function createDataBackupFile() {
		
		$currentDatetime = BackupPeer::getCurrentDatetime();
					
		$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . 'zip';

		$filecontents = BackupPeer::buildDataBackup($filename);

		BackupPeer::writeToBackupLog('Se ha creado un backup para descarga');
					
		return BackupPeer::getZipFromDataFile($filecontents);				
	}

	/**
	 * Devuelve el contenido de un backup de datos de archivo
	 *
	 * @return string contenido del backup en SQL
	 */		
	function createCompleteBackupFile() {
		
		$currentDatetime = BackupPeer::getCurrentDatetime();
					
		$filename = Common::getSiteShortName() . '_' . date('Ymd_His',strtotime($currentDatetime)) . '.zip';

		$filecontents = BackupPeer::buildDataBackup($filename);

		BackupPeer::writeToBackupLog('Se ha creado un backup para descarga');
					
		return BackupPeer::getCompleteBackupZipFromDataFile($filecontents);				
	}
	
	/**
	 * Genera un zip de un archivo de datos
	 * @param $datafile contenido del data file
	 */
	function getZipFromDataFile($datafile) {
		require_once("zip.class.php");  
		$zipfile = new zipfile; 
		$zipfile->create_dir(".");
		$zipfile->create_dir("./db/");
		$zipfile->create_file($datafile, "./db/dump.sql"); 

		return $zipfile->zipped_file(); 			
	}
	
	/**
	 * Indica si una ruta debe ser ignorada o no
	 * @param $route string 
	 * @return boolean
	 */
	function routeHasToBeIgnored($route) {
		foreach ($this->pathIgnoreList as $toIgnore) {
			if (strpos($route,$toIgnore) !== false) {
				return true;
			}
		}
		return false;
	}
	
	function getCompleteBackupZipFromDataFile($datafile) {
		require_once("zip.class.php");  
		$zipfile = new zipfile; 
		$zipfile->create_dir(".");
		$zipfile->create_dir("./db/");
		$zipfile->create_file($datafile, "./db/dump.sql");
		$zipfile->create_dir("./files/");
		$listing = array();
		$dirHandler = @opendir('WEB-INF/../');
		BackupPeer::directoryList(&$listing,$dirHandler,'WEB-INF/../');
		
		foreach ($listing as $route) {				
			
			$clearRoute = explode('WEB-INF/../',$route);

			if (!BackupPeer::routeHasToBeIgnored($clearRoute[1])) {

				if (is_dir($route)) {
					$zipfile->create_dir("./files/" . $clearRoute[1]);
				}
			
				if (is_file($route)) {
					$contents = file_get_contents($route);
					$zipfile->create_file($contents,'./files/' . $clearRoute[1]);
				}
			}

		}

		return $zipfile->zipped_file(); 			
	}
	
	function directoryList($listing,$dirHandler,$path) {
		while (false !== ($file = readdir($dirHandler))) {
			$dir = $path . $file;
	        if(is_dir($dir) && $file != '.' && $file !='..' )
	        {
	            $handle = @opendir($dir);
				array_push($listing, $dir . '/');
	            BackupPeer::directoryList(&$listing,$handle, $dir . '/');
	        }elseif($file != '.' && $file !='..')
	        {
				array_push($listing,$dir);
	        }
	    }

	    closedir($dirHandle);
	}
	
	/**
	 * Devuelve el contenido de un backup del archivo que este almacenado en el servidor
	 * @param string $filename nombre del archivo
	 * @return string contenido del backup en SQL
	 */		
	function deleteBackup($filename){
		
		$path = 'WEB-INF/../backups/'.$filename;
		
		if (!file_exists($path))
			return false;
			
		$status = unlink($path);
		
		if ($status)
			BackupPeer::writeToBackupLog('Se ha eliminado el backup del servidor de nombre de archivo: ' . $filename);
		
		return $status;
		
	}

	/**
	 * Ontiene el contenido de un backup guardado en el servidor
	 *
	 * @param string nombre del archivo en el servidor
	 * @return string contenido del archivo
	 */		
	function getBackupContents($filename) {

		if (file_exists('WEB-INF/../backups/' . $filename) == false)
			return false;
		$contents = file_get_contents('WEB-INF/../backups/' . $filename);
		
		return $contents;
		
	}
	
	function writeToBackupLog($message) {
		
		$fd = fopen('WEB-INF/logs/backupActivity.log','a+');
		require_once('TimezonePeer.php');
		
		$currentDatetime = BackupPeer::getCurrentDatetime();
					
		fprintf($fd,"%s\n", $currentDatetime . ' - ' . $message);
		fclose($fd);
		
		return true;
		
	}

	/*
	 * Obtiene el header y el footer del dump, con los drop tables y rename con las tablas con camelcase.
	 * 
	 * @return array Header en elemento "header" y footer en elemento "footer"
	 */
	function getDumpHeaderAndFooter() {
		global $moduleRootDir,$osType;
		$header = "";
		$footer = "";
		if ($osType == "WINDOWS" || $osType == "WINNT" || $osType == "WIN") {
			$pathToXml = $moduleRootDir.'/WEB-INF/classes/propel/schema.xml';

			//Path a schemas
			$path = "WEB-INF/propel";
			$schemasFile = scandir($path);
			
			$schemas = Array();
			
			foreach ($schemasFile as $schema) {
				if (substr($schema, -3) == "xml") {
					$schemas[] = $schema; 
				}		
			}

			$tables = array();

			foreach ($schemas as $schema) {		
				$xml = file_get_contents($path."/".$schema);
				
				$xml2ary = new Xml2ary();
				$array = $xml2ary->getArray($xml);
				
				$arrayTables = $array["database"]["_c"]["table"];

				foreach ($arrayTables as $tableElement) {
					$tableName = $tableElement["_a"]["name"];
					if (ereg("[A-Z]",$tableName))
						$tables[] = $tableName;
				}
			}
			
			$header = "#Eliminacion de tablas con camelcase.\n";
			$footer = "#Renombre de tablas con camelcase.\n";

			foreach ($tables as $table) {
				$header .= "DROP TABLE ". $table .";\n";
				$footer .= "RENAME TABLE ". strtolower($table) . " TO " . $table .";\n";
			}			

			$header .= "\n\n";
			$footer .= "\n\n";			
		}
		return array("header"=>$header, "footer"=>$footer);
	}

}
