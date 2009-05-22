<?php
/*
 * Funciones y variables comunes al sistema
 *
 * @package Config
 */

	require_once('Smarty_config.inc.php');

	include_once('Constants.inc.php');
	define('MAXIMOS_RESULTADOS_POR_PAGINA',15);
	ini_set("show_errors",true);
	session_cache_limiter('nocache');
	session_start();
	extract($_SESSION,EXTR_PREFIX_ALL,'session');
	extract($_GET,EXTR_PREFIX_ALL,'get');
	extract($_POST,EXTR_PREFIX_ALL,'post');

	//Configuracion de Error Reporting
	global $system;
	if (isset($system)) {

	$conversionTable = array('E_ALL ^ E_NOTICE'=> 6135, 'E_ALL' => 6143, 'E_STRICT' => 2048);
		$level = $system["config"]["system"]["errorReporting"]["value"];

		if ($level == "") {
			ini_set("error_reporting",6143);
		}
		else {
			ini_set("error_reporting",$conversionTable[$level]);
		}

	}

	/**
	* getBrowser
	*
	* Obtiene las especificaciones del Browser
	*
	* @return array con nombre del browser y version
	*/
	function getBrowser(){
		if ($msie_p=strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
		{
			$msie_e=strpos($_SERVER['HTTP_USER_AGENT'],';',$msie_p+5);
			$ver=substr($_SERVER['HTTP_USER_AGENT'],$msie_p+5,$msie_e-$msie_p-5);
			$browser='msie';
		}
		elseif(strpos($_SERVER['HTTP_USER_AGENT'],'Mozilla')!==false)
		{
			$moz_p=strpos($_SERVER['HTTP_USER_AGENT'],'Mozilla')+8;
			$moz_e=strpos($_SERVER['HTTP_USER_AGENT'],' ',$moz_p);
			$ver=substr($_SERVER['HTTP_USER_AGENT'],$moz_p,$moz_e-$moz_p);
			$browser='mozilla';
		}
		else
		{
			$browser=$_SERVER['HTTP_USER_AGENT'];
			$ver='';
		}
		return(array('name'=>$browser,'version'=>$ver));
	}

	$actpath=strtok($_SERVER['PHP_SELF'],'/');
	set_error_handler("userErrorHandler");

	/**
	* makedate
	*
	* makedate
	*
	* @return makedate
	*/
	function makedate($unit = '', $time = '', $mask = ''){
		$validunit = '/^[-+]?\b[0-9]+\b$/';
		$validtime = '/^\b(day|week|month|year)\b$/i';
		$validmask = '/^(short|long|([dmy[:space:][:punct:]]+))$/i';

		if (!preg_match($validunit,$unit))
		{
			$unit = -1;
		}

		if (!preg_match($validtime,$time))
		{
			$time = 'day';
		}

		if (!preg_match($validmask,$mask))
		{
			$mask = 'yyyymmdd';
		}

		switch ($mask)
		{
			case 'short': // 7/4/2003
				$mask = "n/j/Y";
				break;
			case 'long':  // Friday, July 4, 2003
				$mask = "l, F j, Y";
				break;
			default:
				if (preg_match('/([[:space:]]|[[:punct:]])/', $mask))
				{
					$chars = preg_split
					(
						'/([[:space:]]|[[:punct:]])/',
						$mask,
						-1,
						PREG_SPLIT_NO_EMPTY |
						PREG_SPLIT_DELIM_CAPTURE
					);
				}
				else
				{
					$chars = preg_split
					(
						'/(m*|d*|y*)/i',
						$mask,
						-1,
						PREG_SPLIT_NO_EMPTY |
						PREG_SPLIT_DELIM_CAPTURE
					);
				}
				foreach ($chars as $key => $char)
				{
					switch (TRUE)
					{
						case eregi ("m{3,}",$chars[$key]): // 'mmmm' = month string
							$chars[$key] = "F";
							break;
						case eregi ("m{2}",$chars[$key]):  // 'mm'   = month as 01-12
							$chars[$key] = "m";
							break;
						case eregi ("m{1}",$chars[$key]):  // 'm'    = month as 1-12
							$chars[$key] = "n";
							break;
						case eregi ("d{3,}",$chars[$key]): // 'dddd' = day string
							$chars[$key] = "l";
							break;
						case eregi ("d{2}",$chars[$key]):  // 'dd'   = day as 01-31
							$chars[$key] = "d";
							break;
						case eregi ("d{1}",$chars[$key]):  // 'd'    = day as 1-31
							$chars[$key] = "j";
							break;
						case eregi ("y{3,}",$chars[$key]): // 'yyyy' = 4 digit year
							$chars[$key] = "Y";
							break;
						case eregi ("y{1,2}",$chars[$key]):// 'yy'   = 2 digit year
							$chars[$key] = "y";
							break;
					}
				}
				$mask = implode('',$chars);
				break;
		}
		$when = date($mask,strtotime ("$unit $time"));
		return $when;
	}

	/**
	* userErrorHandler
	*
	* userErrorHandler
	*
	* @return userErrorHandler
	*/
	function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars){
		$dt = date("Y-m-d H:i:s (T)");
		$errortype = array (
				E_ERROR           => "Error",
				E_WARNING         => "Advertencia",
				E_PARSE           => "Error de procesamiento",
				E_NOTICE          => "Advertencia",
				E_CORE_ERROR      => "Error del motor",
				E_CORE_WARNING    => "Advertencia del motor",
				E_COMPILE_ERROR   => "Error de compilacion",
				E_COMPILE_WARNING => "Advertencia de compilacion",
				E_USER_ERROR      => "Error del usuario",
				E_USER_WARNING    => "Advertencia del usuario",
				E_USER_NOTICE     => "Advertencia del usuario",
				E_STRICT          => "Advertencia en tiempo de ejecucion"
				);
		// SET of errors for which a var trace will be saved
		$user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
		$err = "<errorentry>\n";
		$err .= "\t<datetime>"      . $dt .       "</datetime>\n";
		$err .= "\t<errornum>"      . $errno .    "</errornum>\n";
		$err .= "\t<errortype>"     . $errortype[$errno] . "</errortype>\n";
		$err .= "\t<errormsg>"      . $errmsg .     "</errormsg>\n";
		$err .= "\t<scriptname>"    . $filename .   "</scriptname>\n";
		$err .= "\t<scriptlinenum>" . $linenum .    "</scriptlinenum>\n";

		if (in_array($errno, $user_errors)){
			$err .= "\t<vartrace>" . wddx_serialize_value($vars, "Variables") . "</vartrace>\n";
		}
		$err .= "</errorentry>\n\n";

		if (!empty($errstr) && eregi('^(sql)$', $errstr)){
			$MYSQL_ERRNO = mysql_errno();
			$MYSQL_ERROR = mysql_error();
			$err .="<errormysql>".$MYSQL_ERRNO.":".$MYSQL_ERROR."</errormysql>";
		}
		if ($errno == E_USER_ERROR || $errno == E_ERROR || $errno == E_CORE_ERROR  ||
				$errno == E_COMPILE_ERROR || $errno == mysql_errno() ) {
			if(($_SESSION['parametros']['MODO_DEBUG']==1)) {
				include_once("libmail.inc.php");
				$m = new Mail();
				$m->From("debug@modulosempresarios.net");
				$para = explode(',', $_SESSION['parametros']['DEBUG_MAILS']);
				$m->To($para);
				$m->Subject("SITIO: ".$_SESSION['parametros']['SITIO_NOMBRE']." / Error generado por ".$_SESSION["usuario"]." ConcesionarioID: ".($_SESSION["nivel"]>20 ? $post_concesionario : $_SESSION['concesionario']));
				$m->Body($err);
				$m->Priority(1);
				$m->Send();
			}
			die("Error procesando su requerimiento, por favor reintente o comuniquese con un operador.\n <br>".
					" Texto del error: ".$err );
		}
	}


class Common
{
	/**
	* Indica si el sistema se encuentra en mantenimiento y se debe reenviar al usuario a la pantalla de Maintenance.
	*
	* @return true si el sistema esta en mantenimiento
	**/
	function inMaintenance(){
		global $system;
		$maintenance = $system["config"]["system"]["parameters"]["underMaintenance"]["value"];

		//si no esta el sistema en mantenimiento, devolver false
		if ($maintenance != "YES")
			return false;

		$noCheckMaintenance = array();
		$noCheckMaintenance[] = "commonMaintenance";
		$noCheckMaintenance[] = "usersLoginMaintenance";
		$noCheckMaintenance[] = "usersDoLogin";
		$noCheckMaintenance[] = "usersDoLogout";

		$isNoCheckMaintenanceAction = array_search($_REQUEST["do"],$noCheckMaintenance);

		//si es un action que no requiere chequeo de mantenimiento, devolver false
		if ($isNoCheckMaintenanceAction !== false)
			return false;

		$user = $_SESSION["loginUser"];

		if (!empty($user)) {
			$level = $user->getLevel();
			//si el usuario logueado tiene un nivel menor a 3 (supervisor y admin), devolver false
			if ($level < 3)
				return false;
		}

		//si llego hasta aca, devolver true
		return true;
	}

	/*
	* Ejemplo: Common::debugger(dirname(__FILE__)."/archivo.sql","Query: ",$query);
	*
	*/
		function debugger($file,$message,$variable){
			$handle = fopen($file, "a");
			fwrite($handle, $message.$variable."\n");
			fclose($handle);
		}

	/**
	*	Recibe una fecha en formato mm-dd-yyyy y la devuelve yyyy-mm-dd
	*
	* @param string $usDate Fecha en formato mm-dd-yyyy
	* @return string Fecha en formate yyyy-mm-dd
	*/
	function usDateToDbDate($usDate) {
		$dateExplode = explode("-", $usDate);
		$dbDate = date("Y-m-d",mktime(0,0,0,$dateExplode[1],$dateExplode[0],$dateExplode[2]));
		return $dbDate;
	}

	/**
	* obtiene el id de usuario y de afiliado
	*
	* @return array $info informacion encontrada
	*/
	function userInfoToDoLog(){

		$info = array();
		if(!empty($_SESSION['loginUser'])){
			$info["userId"] = $_SESSION['loginUser'];
			if(is_object($info["userId"]))
				$info["userId"]=$info["userId"]->getId();
			$info["affiliateId"] = 0;
		}
		elseif(!empty($_SESSION['loginUserByRegistration'])){
			$info["userId"]=$_SESSION['loginUserByRegistration'];
			$info["affiliateId"] =999999 ;

		}
		else{

			if(is_object($_SESSION["loginAffiliateUser"])){
				//////////
				// version con propel toma esta linea
				$info["userId"]=$_SESSION["loginAffiliateUser"]->getId();
				$info["affiliateId"]=$_SESSION["loginAffiliateUser"]->getAffiliateId();
			}

				//////////
				// version sin propel toma esta linea
			else $info["userId"]=$_SESSION["loginAffiliateUser"];
		}
		return $info;
	}


	/**
	* Guarda un registro de log.
	*
	* @param string $user datos del usuario
	* @param string $action nombre del action
	* @param string $forward tipo de forward (success, failure, errorLog, etc)
	* @param string $object objeto sobre el cual se realizó la acción
	* @return void
	*/
	function doLog($forward,$object=null) {

		include_once 'Actionlog.php';

		/*	@include_once('ActionlogLabelPeer.php');
		if (class_exists('ActionlogLabelPeer')){
			$actionLogLabel = new ActionlogLabelPeer();
			$actionLogLabelObject=$actionLogLabel->getAllByActionLanguageEsp($_REQUEST['do'],$forward);
		}*/

		//obtengo el action adonde se esta
//		$action = strtoupper(substr($_REQUEST['do'],0,1)) . substr($_REQUEST['do'],1,strlen($_REQUEST['do']));
		$action = ucfirst($_REQUEST['do']);
		$userInfo = Common::userInfoToDoLog();

		try{
			$logs = new Actionlog();
			$logs->setUserId($userInfo["userId"]);
			$logs->setAffiliateId($userInfo["affiliateId"]);
			$logs->setDatetime(time());
			$logs->setAction($action);
			$logs->setObject($object);
			$logs->setForward($forward);
			$logs->save();
		}
		catch (PropelException $e) {
			;
		}
	}
	/**
	 * Indica si un usuario es afiliado.
	 */
	function isAffiliatedUser() {

		if (isset($_SESSION["loginAffiliateUser"]))
			return true;
		return false;

	}

	function getAffiliatedId() {

		$user = $_SESSION["loginAffiliateUser"];
		return $user->getAffiliateId();

	}

	function isAdmin() {

		if (!isset($_SESSION['loginUser']))
			return false;

		$user = $_SESSION['loginUser'];
		return $user->isAdmin();

	}


	function getAdminUserId() {

		$user = $_SESSION["loginUser"];
		return $user->getId();

	}

	function getAffiliatedLogged() {

		return $_SESSION["loginAffiliateUser"];

	}

	function getAdminLogged() {

		return $_SESSION["loginUser"];

	}

	function isSupplier() {

		if (!isset($_SESSION['loginUser']))
			return false;

		$user = $_SESSION['loginUser'];
		return $user->isSupplier();

	}

	function getSupplierUserId() {

		$user = $_SESSION["loginUser"];
		return $user->getId();

	}

	function isRegistrationUser() {

		if (isset($_SESSION["loginRegistrationUser"]))
				return true;
		return false;

	}

	function getRegistrationUserLogged() {

		return $_SESSION["loginRegistrationUser"];

	}


	/*
	 * Conversion del numero al formato numerico de mysql
	 *
	 * @param string numero con separador de miles y decimal segun la configuracion del sistema
	 * @return string con el formato
	 */
	function convertToMysqlNumericFormat($number) {

		global $system;

		$thousandsSeparator = $system['config']['system']['parameters']['thousandsSeparator'];
		$decimalSeparator = $system['config']['system']['parameters']['decimalSeparator'];

		$number = str_replace($thousandsSeparator,'',$number);
		//el separador de decimales en MySQL es punto
		$number = str_replace($decimalSeparator,'.',$number);

		return $number;

	}

	/*
	 * Conversion del fecha al formato numerico de mysql
	 * El mismo tiene en cuenta el formato de fecha interno del sistema
	 * @param string fecha
	 * @return string con el formato
	 */
	function convertToMysqlDateFormat($date,$dateFormat='') {

		global $system;

		if (empty($dateFormat))
			$dateFormat = $system['config']['system']['parameters']['dateFormat']['value'];

		$dateFormat = str_replace('y','Y',$dateFormat);
		$formatArray = split('-',$dateFormat);
		$dateArray = split('-',$date);
		$orderedDate = array();

		for ($i=0; $i < count($formatArray); $i++) {
			$orderedDate[$formatArray[$i]] = $dateArray[$i];
		}

		$mysqlDate =  $orderedDate['Y'] . '-' . $orderedDate['m'] . '-' . $orderedDate['d'];

		return $mysqlDate;
	}

	/*
	 * Devuelve el nombre corto del sistema
	 * @return string nombre corto del sistema
	 */
	function getSiteShortName() {

		global $system;
		return $system['config']['system']['parameters']['siteShortName'];

	}

	/**
	 * Devuelve un datetime en la zona horaria del usuario actual
	 * @param string datetime
	 * @return string datetime en la zona horaria correspondiente al usuario
	 */
	function getDatetimeOnTimezone($datetime) {

		require_once('TimezonePeer.php');

		if (Common::isAdmin()) {
			//es el caso de un usuario administrador el valor de su perfil
			$user = Common::getAdminLogged();
			$timezoneCode = $user->getTimezone();

		}

		if (Common::isAffiliatedUser()) {
			//es el caso de un usuario affiliado el valor de su perfil

			$user = Common::getAffiliatedLogged();
			$timezoneCode = $user->getTimezone();

		}

		if (empty($timezoneCode) || $timezoneCode == "") {
			//si no hubiera o no fuera un usuario administrador tomamos default de la aplicacion
			global $system;
			$timezoneCode = $system["config"]["system"]["parameters"]["applicationTimeZoneGMT"]["value"];

			//solucion por el problema del pasaje de XML a array de PHP
			//que toma el 0 como null
			if ($timezoneCode == null)
				$timezoneCode = 0;

		}


		$timezonePeer = new TimezonePeer();

		return $timezonePeer->getGMT0TimeOnTimezone($datetime,$timezoneCode);

	}

	function validateCaptcha($field) {

		if (empty($_SESSION['security_code']))
			return false;
		if ($field == $_SESSION['security_code']) {
			unset($_SESSION['security_code']);
			return true;
		}

		return false;
	}

	/**
	 * Indica si el sistema tiene activo el modulo de newsletter.
	 *
	 */
	function systemHasNewsletter() {

		global $system;

		if ($system["config"]["registration"]["newsletterSubscription"]["value"] == 'YES')
			$activeNewsletters = true;
		else
			$activeNewsletters = false;

		$hasNewslettersModule = ModulePeer::hasNewslettersModule();
		if ($hasNewslettersModule && $activeNewsletters) {
			return true;
		}

		return false;

	}

	/**
	 * Devuelve el modo de registracion habilitado en el Modulo de Registracion por
	 * la configuracion.
	 */
	function getRegistrationMode() {

		global $system;

		return $system["config"]["registration"]["mode"]["value"];

	}

	/**
	 * Devuelve si la validacion por captcha esta habilitada en la configuracion
	 * del modulo de registracion
	 */
	function getRegistrationCaptchaUse() {

		global $system;

		return ($system["config"]["registration"]["useCaptcha"]["value"] == 'YES');


	}

	/**
	 * Devuelve si la validacion por captcha esta habilitada en la configuracion
	 * del modulo de encuestas
	 */
	function getSurveysCaptchaUse() {

		global $system;

		return ($system["config"]["surveys"]["useCaptcha"]["value"] == 'YES');


	}


	/**
	 * Valida si una direccion de email es valida
	 * @param string email a validar
	 */
	function validateEmail($email) {
		return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
	}


	/**
	 * Indica si hay login unificado en la configuracion del sistema
	 * @return boolean
	 */
	function hasUnifiedLogin() {

		global $system;
		$unifiedLogin = $system["config"]["system"]["parameters"]["affiliateUserLoginUnified"]["value"];

		return ($unifiedLogin == "YES");

	}

	/**
	 * Obtiene el valor de la opcion de login de la cookie
	 * @return string El valor correspondiente o vacio si no esta seteada la cookie
	 */
	function getValueUnifiedLoginCookie() {

		global $system;
		$cookieName = $system["config"]["system"]["parameters"]['siteShortName'] . 'LoginOption';
		return $_COOKIE[$cookieName];

	}

	function setValueUnifiedLoginCookie($value) {

		global $system;
		$cookieName = $system["config"]["system"]["parameters"]['siteShortName'] . 'LoginOption';
		setcookie($cookieName,$value);

	}


	/*
	 * Verifica si un email existe.
	 *
	 * @param string $email Email destino
	 * @param string $mailAddress Email origen
	 * @return boolean false si no existe, true si puede llegar a existir
	 */
	function verifyMailbox($email,$mailAddress="no-reply@no-mail.com") {
		$before = microtime();
		$err = false;
		if (!preg_match('/([^\@]+)\@(.+)$/', $email, $matches)) {
			 return false;
		}
		$user = $matches[1]; $domain = $matches[2];
		if(!function_exists('checkdnsrr'))
			return $err;
		if(!function_exists('getmxrr'))
			return $err;
		// Get MX Records to find smtp servers handling this domain
		if(getmxrr($domain, $mxhosts, $mxweight)) {
			for($i=0;$i<count($mxhosts);$i++){
					$mxs[$mxhosts[$i]] = $mxweight[$i];
			}
			asort($mxs);
			$mailers = array_keys($mxs);
		}elseif(checkdnsrr($domain, 'A')) {
			$mailers[0] = gethostbyname($domain);
		}else {
			return false;
		}
		// Try to send to each mailserver
		$total = count($mailers);
		$ok = 0;
		for($n=0; $n < $total; $n++) {
			$timeout = 5;
			$errno = 0; $errstr = 0;
			if(!($sock = fsockopen($mailers[$n], 25, $errno , $errstr, $timeout))) {
				continue;
			}
			$response = fgets($sock);
			stream_set_timeout($sock, 5);
			$meta = stream_get_meta_data($sock);
			$cmds = array(
				"HELO ".$_SERVER["SERVER_NAME"],
				"MAIL FROM: <$mailAddress>",
				"RCPT TO: <$email>",
				"QUIT",
			);
			if(!$meta['timed_out'] && !preg_match('/^2\d\d[ -]/', $response)) {
				break;
			}
			$success_ok = 1;
			foreach($cmds as $cmd) {
				fputs($sock, "$cmd\r\n");
				$response = fgets($sock, 4096);
				if(!$meta['timed_out'] && preg_match('/^5\d\d[ -]/', $response)) {
					$success_ok = 0;
					break;
				}
			}
			fclose($sock);
			if($success_ok){
				$ok = 1;
				break;
			}
		}
		$after = microtime();
		// Fail on error
		if(!$ok)
			return false;
		// Return a positive value on success
		return true;
	}

	/**
	* Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
	*
	* @return int Cantidad de filas por pagina
	*/
	function getRowsPerPage() {
		global $system;
		return $system['config']['system']['rowsPerPage'];
	}

	/**
	* Obtiene los idiomas disponibles en el sistema.
	*
	* @return Idiomas del sistema
	*/
	function getAllLanguages() {
		require_once("MultilangLanguagePeer.php");
		$languages = MultilangLanguagePeer::getAll();
		return $languages;
	}

	function getTranslation($text,$moduleName) {
		$languageCode = Common::getCurrentLanguageCode();
		$translationObject = MultilangTextPeer::getByTextAndModuleNameAndCode($text,$moduleName,$languageCode);
		if (empty($translationObject))
			$translation = $text;
		else
			$translation = $translationObject->getText();
		return $translation;
	}

	function getTranslationByLanguageCode($text,$moduleName,$languageCode) {
		$translationObject = MultilangTextPeer::getByTextAndModuleNameAndCode($text,$moduleName,$languageCode);
		if (empty($translationObject))
			$translation = $text;
		else
			$translation = $translationObject->getText();
		return $translation;
	}

	function getCurrentLanguageCode() {
		global $system;
		return $system["config"]["mluse"]["language"];
	}

	/**
	 * Indica si el los pedidos de cotizaciones manejan cantidades en el modulo import
	 * @return boolean
	 */
	function importQuotesHasQuantities() {

		global $system;
		return ($system['config']['import']['quantityOnQuote']['value'] == 'YES');

	}

}
