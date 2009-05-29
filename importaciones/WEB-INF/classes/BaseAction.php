<?php
/**
* BaseAction
*
* $author Modulos Empresarios / Egytca
* @package phpMVCconfig
* @public
*/

include_once("Action.php");
include_once("common.inc.php");
include_once("Paginado.class.php");
require_once("SecurityActionPeer.php");
require_once("GroupPeer.php");
require_once("MultilangLanguagePeer.php");

/**
* Implementation of <strong>Action</strong> that demonstrates the use of the Smarty
* compiling PHP template engine within php.MVC.
*
* @author John C Wildenauer
* $author Modulos Empresarios / Egytca
* @package phpMVCconfig
* @public
*/
class BaseAction extends Action {

	// ----- Constructor ---------------------------------------------------- //

	function BaseAction() {
		;
	}

	// ----- Public Methods ------------------------------------------------- //

	/**
	* Process the specified HTTP request, and create the corresponding HTTP
	* response (or forward to another web component that will create it).
	* Return an <code>ActionForward</code> instance describing where and how
	* control should be forwarded, or <code>NULL</code> if the response has
	* already been completed.
	*
	* @param ActionConfig		The ActionConfig (mapping) used to select this instance
	* @param ActionForm			The optional ActionForm bean for this request (if any)
	* @param HttpRequestBase	The HTTP request we are processing
	* @param HttpRequestBase	The HTTP response we are creating
	* @public
	* @returns ActionForward
	*/

	function execute($mapping, $form, &$request, &$response) {

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		global $system;

		$GLOBALS['_NG_LANGUAGE_'] =& $smarty->language;
		if (!empty($GLOBALS['_NG_LANGUAGE_']))
			$GLOBALS['_NG_LANGUAGE_']->setCurrentLanguage(Common::getCurrentLanguageCode());

		$systemUrl = "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/"))."/Main.php";
		$smarty->assign("systemUrl",$systemUrl);

		header("Content-type: text/html; charset=UTF-8");

		if (Common::inMaintenance()) {
			header("Location: Main.php?do=commonMaintenance");
			exit;
		}

		//Configura la acción solicitada y convierto primer letra mayuscula
		$actionRequested = ucfirst($_REQUEST["do"]);

		$loginUser = $_SESSION["loginUser"];
		$loginUserAffiliate = $_SESSION["loginAffiliateUser"];
		$loginRegistrationUser = $_SESSION["loginRegistrationUser"];

		$securityAction = SecurityActionPeer::get($actionRequested);
		$securityModule = SecurityModulePeer::get($actionRequested);
	
		$noCheckLogin = 1;
		if (!empty($securityAction))
			$noCheckLogin = $securityAction->getOverallNoCheckLogin();
		elseif (!empty($securityModule))
			$noCheckLogin = $securityModule->getNoCheckLogin();

		//Si el sistema está en desarrollo, no verifico permisos
		if ($system["config"]["system"]["developmentMode"]["value"] == "YES")
			$noCheckLogin = 1;

		//Verifico permisos cuando no se encontró en noCheckLogin
		if (!$noCheckLogin) {

			//Chequeo de permisos de acceso
			if (!empty($loginUser) || !empty($loginUserAffiliate) || !empty($loginRegistrationUser)) {

				$actionAccess = $securityAction->getAccessByUser();
				$userLevel = $user->getLevel();

				if (empty($actionAccess))
					$actionAccess = $securityModule->getAccessByUser();

				if ( empty($userLevel) || ($userLevel->getBitLevel() & $actionAccess) == 0 ) {
					header("Location:Main.php?do=securityNoPermission");
					exit();
				}
			}

		}


		if (!empty($user))
			$level = $user->getLevel();

		if (!empty($loginUserAffiliate))
			$smarty->assign("affiliateId",$loginUserAffiliate->getAffiliateId());

		$smarty->assign("loginUser",$loginUser);
		$smarty->assign("loginAffiliateUser",$loginUserAffiliate);
		$smarty->assign("loginRegistrationUser",$loginRegistrationUser);
		$smarty->assign("currentLanguageCode",Common::getCurrentLanguageCode());

		$smarty->assign("Browser",getBrowser());


		$this->template = new SmartyOutputFilter();
		$smarty->register_outputfilter(array($this->template,"smarty_add_template"));

		//Asignacion a smarty de los parametros del sistema
		$smarty->assign("parameters",$system["config"]["system"]["parameters"]);

		if (!empty($GLOBALS['_NG_LANGUAGE_']))
			$smarty->register_outputfilter("smarty_outputfilter_i18n");
	
		$smarty->assign("languagesAvailable",common::getAllLanguages());

	} //End execute

	/**
	 * Agrega parametros al url de un forward
	 * @param $params array with parameters with key and value
	 * @param $mapping
	 * @param $forwardName nombre del forward que se quiere modificar de ese mapping
	 */
	function addParamsToForwards($params,$mapping,$forwardName) {
		//redireccionamiento con opciones correctas
		$myRedirectConfig = $mapping->findForwardConfig($forwardName);
		$myRedirectPath = $myRedirectConfig->getpath();

		foreach ($params as $key => $value)
			$myRedirectPath .= "&$key=$value";

		return new ForwardConfig($myRedirectPath, True);

	}

	/**
	 * Realiza el procesamiento de filtros sobre una clase Peer de Propel
	 * @param Class $peer instancia de clase peer de propel
	 * @param array $filterValuer valores de filtro a verificar, los metodos de set en la clase peer deben tener antepuesto a estos nombres, 'set'
	 * @param $smarty instancia de smarty sobre la cual se esta trabajando (tener en cuenta que al trabajar con una referencia a smarty, no hay problema de pasaje por parametro)
	 */
	function processFilters($peer,$filterValues,$smarty) {

		if (!empty($_GET['filters'])) {

			$smarty->assign('filters',$_GET['filters']);

			foreach ($filterValues as $filterField) {

				if (!empty($_GET['filters'][$filterField])) {
					$setMethod = 'set' . $filterField;
					if (method_exists($peer,$setMethod)) {
						$peer->$setMethod($_GET['filters'][$filterField]);
					}
				}
			}
		}

		return $peer;
	}

	/**
	 * Agrega a una url los valores de un filtro, utilizado para la url de los paginadores
	 * @param String $url
	 * @return String url con los parametros agregados
	 */
	function addFiltersToUrl($url) {

		if (!empty($_GET['filters'])) {
			foreach ($_GET['filters'] as $key => $value) {
				$url .= '&filters[' . $key . ']=' . $value;
			}

		}

		return $url;

	}

}

