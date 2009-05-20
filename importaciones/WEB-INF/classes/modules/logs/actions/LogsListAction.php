<?php
/**
* LogsListAction
*
*  Toma los datos desde una fecha, hasta otra, desde la base de datos
*  una vez que que los toma, los lista
* @package mod_logs
* @author Modulos empresarios
* @author re-documentacion: Marcos Meli
*/


include_once 'BaseAction.php';

require_once("ActionLogPeer.php");
require_once("ActionLogLabelPeer.php");
require_once("UserPeer.php");
require_once("SecurityActionPeer.php");
require_once("AffiliateUserPeer.php");
/**
* LogsListAction
*
*  Esta clase hereda la clase BaseAction
*/
class LogsListAction extends BaseAction {


	/**
	* LogsListAction
	*
	*  Constructor por defecto
	*
	*/

	function LogsListAction() {
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
	* @param string $mapping una variable que muestra los sucesos
	* @param array $form con todo el contenido a ejecutar
	* @param pointer &$request puntero a un string de lo que se esta solicitando
	* @param pointer &$response puntero a un string de la respuesta que ha dado el servidor
	* @return ActionForward string $mapping con la cadena "sucess" o "failure"
	* @public
	*/

	function execute($mapping, $form, &$request, &$response) {

		BaseAction::execute($mapping, $form, $request, $response);

		//////////
		// Aqui el acceso al plugin de Smarty
		// Vea que existe una referencia "=&"

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}


		///////
		/// usado para mostrar 2 fechas a listar, que seran hace un mes, y hoy
		$smarty->assign("dateFrom",date('d-m-Y',mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
		$smarty->assign("dateTo",date('d-m-Y'));

		$module = "Logs";
		$smarty->assign("module",$module);

		//////////
		/// obtengo todos los usuarios
		$usersPeer = new UserPeer();
		$users=$usersPeer->getAll();
		$smarty->assign("users", $users);

		//////////
		/// obtengo los diversos modulos cargados en security
		$SecurityPeer = new SecurityActionPeer();

//		$modules=$SecurityPeer->getModules();

		$smarty->assign("modules", $modules);

		$logs = new ActionLogPeer();

		//////////
		// obtengo los afiliados para posteriormente listarlos
		@include_once('AffiliatePeer.php');
		if (class_exists('AffiliatePeer')){
			$affiliatePeer= new AffiliatePeer();
			$affiliates=$affiliatePeer->getAll();
			$smarty->assign("affiliates",$affiliates);
		}

		//////////
		// obtengo todos los usuarios por afiliado
		$usersByAffiliatePeer = new AffiliateUserPeer();
		$usersBAff=$usersByAffiliatePeer->getAll();
		$smarty->assign($usersByAffiliate,$usersBAff);

		/**
		*
		*	Corte de control para el listado de logs
		*	@param string $_GET['listLogs'] aviso de listado
		*/
		if(isSet($_GET['listLogs'])) {

			//////////
			// Parametros filtro
			$selectedUser=$_GET['selectUser'];

			$selectedModule=$_GET["selectedModule"];

			$dateFromExplode = explode("-", $_GET["dateFrom"]);
			$dateFrom = date("Y-m-d",mktime(0,0,0,$dateFromExplode[1],$dateFromExplode[0],$dateFromExplode[2]));

			$dateToExplode = explode("-", $_GET["dateTo"]);
			$dateTo = date("Y-m-d",mktime(0,0,0,$dateToExplode[1],$dateToExplode[0],$dateToExplode[2]));


			/**
			*
			*	Corte de control para el listado con afiliado o sin el
			*	@param string $_GET["affiliate"] bandera de afiliado
			*/
			if(isset($_GET["affiliateId"]) && $_GET["affiliateId"] != -1 ){

					$affiliateId=$_GET["affiliateId"];
					$selectedLogs=$logs->selectAllByRequirementsAndAffiliatePaginated($dateFrom,$dateTo,$selectedUser,$affiliateId,$selectedModule,$_GET["page"]);

					////////////
					// se obtiene e informa el nombre del afiliado
					if (class_exists('AffiliatePeer')){
						$affiliatePeer= new AffiliatePeer();
						$affiliate=$affiliatePeer->get($affiliateId);
						$smarty->assign("affiliate",$affiliate);
						$smarty->assign("affiliateId",$affiliateId);
					}

					$url= 'Main.php?do=logsList&listLogs='.$_GET['listLogs'].'&dateFrom='.$_GET["dateFrom"].'&dateTo='.$_GET["dateTo"].'&selectedModule='.$_GET["selectedModule"].'&affiliate='.$affiliateId.'&selectUser='.$selectedUser;
			}
			else{
				$selectedLogs=$logs->selectAllByRequirementsPaginated($dateFrom,$dateTo,$selectedUser,$selectedModule,$_GET["page"]);

				$url= 'Main.php?do=logsList&listLogs='.$_GET['listLogs'].'&dateFrom='.$_GET["dateFrom"].'&dateTo='.$_GET["dateTo"].'&selectedModule='.$_GET["selectedModule"].'&selectUser='.$selectedUser;

			}

/*			$savedLogs=$selectedLogs->getResult();

			$i=1;
			foreach ($savedLogs as $eachLog){
				if ($eachLog->getAffiliateId() == 0){
					$userLog=$usersPeer->get($eachLog->getUserId());
					$userName[$i]=$userLog->getUsername();
				}

				//////////
				// en version anmaga esto no se usa
				elseif ($eachLog->getAffiliateId() == 999999){
					require_once("AffiliateUserPeer.php");
					$usersByRegistrationPeer = new UserPeer();
					$userLog=$usersByRegistrationPeer->get($eachLog->getUserId());
					$userName[$i]=$userLog->getUsername();
				}

				else{
					$userLog=$affiliatePeer->get($eachLog->getUserId());

					$info=$usersByAffiliatePeer->get($userLog->getId());

					$userName[$i]=$info->getUsername();
				}
					$i++;
			}
*/

			$smarty->assign("dateFrom",$_GET["dateFrom"]);
			$smarty->assign("dateTo",$_GET["dateTo"]);
			$smarty->assign("selectedUser",$selectedUser);
			$smarty->assign("affiliateId",$_GET["affiliateId"]);


			$smarty->assign("DISPLAY",2);
			$smarty->assign("usersName",$userName);
			$smarty->assign("logs",$selectedLogs->getResult());
			$smarty->assign("pager",$selectedLogs);


			$smarty->assign("url",$url);

			return $mapping->findForwardConfig('success');
		}

		$smarty->assign("DISPLAY",1);

		return $mapping->findForwardConfig('success');

	}

}
