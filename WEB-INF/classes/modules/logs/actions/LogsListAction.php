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
require_once("UserPeer.php");
require_once("SecurityActionPeer.php");

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
		
		$smarty->assign("LOGIN",$_SESSION['usuario']);
		$smarty->assign("SESION", $_SESSION);

		//////////
		/// obtengo todos los usuarios
		$usersPeer = new UserPeer();
		
		$users=$usersPeer->getAll();
		$smarty->assign("users", $users);



		//////////
		/// obtengo los diversos modulos cargados en security
		$SecurityPeer = new SecurityActionPeer();
		
		$modules=$SecurityPeer->getModules();

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
		


		/////////
		// corte de control en caso de que se haya presionado en buscar
		if(isSet($_GET['saveButton'])) {

			//////////
			// Parametros filtro		
			$selectedUser=$_GET['selectUser'];



			$module=$_GET["module"];

			$dateFromExplode = explode("-", $_GET["dateFrom"]);
			$dateFrom = date("Y-m-d",mktime(0,0,0,$dateFromExplode[1],$dateFromExplode[0],$dateFromExplode[2]));
			
			$dateToExplode = explode("-", $_GET["dateTo"]);
			$dateTo = date("Y-m-d",mktime(0,0,0,$dateToExplode[1],$dateToExplode[0],$dateToExplode[2]));
		
			
			
			/////////
			// si se filtra por afiliado, se muestra
			if(isset($_GET["affiliate"]) && $_GET["affiliate"] != 'todos' ){

					$affiliateId=$_GET["affiliate"];
					//$selectedLogs=$logs->selectAllByDateUserAndAffiliatePaginated($dateFrom,$dateTo,$selectedUser,$affiliateId,$module,$_GET["page"]);
					
					$selectedLogs=$logs->selectAllByRequirementsAndAffiliatePaginated($dateFrom,$dateTo,$selectedUser,$affiliateId,$module,$_GET["page"]);

					////////////
					// se obtiene e informa el nombre del afiliado
					if (class_exists('AffiliatePeer')){
						$affiliatePeer= new AffiliatePeer();
						$affiliate=$affiliatePeer->get($affiliateId);
						$smarty->assign("affiliate",$affiliate); 
					}
					$url= 'Main.php?do=logsList&saveButton='.$_GET['saveButton'].'&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&module='.$_GET["module"].'&affiliate='.$affiliateId.'&selectUser='.$selectedUser;
			}
			else 	{
				$selectedLogs=$logs->selectAllByRequirementsPaginated($dateFrom,$dateTo,$selectedUser,$module,$_GET["page"]);
			
				$url= 'Main.php?do=logsList&saveButton='.$_GET['saveButton'].'&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&module='.$_GET["module"].'&selectUser='.$selectedUser;			
			
			}
	


			  doLog('List histrico de datos');
			$smarty->assign("DISPLAY",2); 
			$smarty->assign("logs",$selectedLogs->getResult());
			$smarty->assign("pager",$selectedLogs);


			$smarty->assign("url",$url);

			return $mapping->findForwardConfig('success');
		}

		

         

       doLog('Entrar a listar');
       
        
    $smarty->assign("DISPLAY",1);        
    

		return $mapping->findForwardConfig('success');

	}

}
?>
