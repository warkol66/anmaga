<?php

/**
* DocumentsEditAction
*
* Action que permite ver los datos correspondientes de un documento que pueden modificarse
*
* @author documentacion: Marcos Meli
* @author Archivo: Marcos Meli
* @package mer_documents
*/

require_once 'BaseAction.php';
require_once("UserByAffiliatePeer.php");


/**
* DocumentsEditAction
*
*  Esta clase hereda la clase BaseAction
* 
*/

class UsersByAffiliateDoAddUserAction extends BaseAction {


	/**
	* DocumentsEditAction
	*
	*  Constructor por defecto
	*
	*/

	function UsersByAffiliateDoAddUserAction() {
		;
	}


	/**
	* execute
	*
	* Procesa la solicitud HTTP solicitada, y crea su respectiva respuesta HTTP o
	* bien lo manda hacia otra web en donde aqui la crea. Devuelve un 
	* "ActionForward" describiendo donde y como se debe mandar la solicitud o
	* NULL si la respuesta ha sido completada. 
	* 
	* 
	* //@param ActionConfig		El ActionConfig (mapping) usado para seleccionar los sucesos
	* //@param ActionForm			El opcional ActionForm con los contenidos de las peticiones
	* //@param HttpRequestBase	El HTTP request de lo que se esta  procesando
	* //@param HttpRequestBase	La respuesta HTTP de lo que estan creando
	* //@public
	* 
	* 
	* @param string $mapping una variable que muestra los sucesos
	* @param array $form con todo el contenido a ejecutar
	* @param pointer &$request puntero a un string de lo que se esta solicitando
	* @param pointer &$response puntero a un string de la respuesta que ha dado el servidor
	* @return ActionForward string $mapping con la cadena "sucess" o "failure"
	*
	*/
	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);


		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Affiliates";
		$smarty->assign("module",$module);


		$usersPeer= new UserByAffiliatePeer();

		if ( !empty($_SESSION["login_user"]) )
			$affiliateId = $_POST["affiliateId"];
		else
			$affiliateId = $_SESSION["login_user_affiliate"]->getAffiliateId();

		if($_POST["password"]!=$_POST["passwordCompare"]){
			header("Location: Main.php?do=usersByAffiliateAddUser&errormessage=wrongPasswordComparison&id=".$affiliateId);
			exit;
		}

		$user = $usersPeer->insert($affiliateId,$_POST["username"],$_POST["password"],$_POST["levelId"]);

		$myRedirectConfig = $mapping->findForwardConfig('success');
		$myRedirectPath = $myRedirectConfig->getpath();
    $myReqQueryString = "&affiliateId=".$affiliateId;
    $myReqQueryString = htmlentities(urlencode($myReqQueryString));
    $myRedirectPath .= $myReqQueryString;
		$fc = new ForwardConfig($myRedirectPath, True);
		return $fc;
	}

}
?>