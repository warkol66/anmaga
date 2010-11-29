<?php

require 'actionlogs/classes/om/BaseActionlogPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'actionlogs_log' table.
 *
 * logs del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    actionlogs.classes
 */
class ActionlogPeer extends BaseActionlogPeer {

	/**
	*
	* selectAllByRequirementsPaginated
	*	Crea un filtro por requerimientos enviados a la funcion, devuelve un listado filtrado
	* @param datetime $dateFrom fecha filtro de inicio del listado
	* @param datetime $dateTo fecha filtro del fin de listado
	* @param int $selectUser usuario filtro seleccionado
	* @param string $module nombre del modulo seleccionado para el filtro
	* @param int $page pagina del paginado
	* @return object $pager listado filtrado y paginado
	*/
	
	function selectAllByRequirementsPaginated ($dateFrom,$dateTo,$selectUser,$module,$page=1,$perPage=25) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->addAscendingOrderByColumn(ActionlogPeer::ID);
		$cond->addJoin(ActionlogPeer::ACTION, SecurityActionPeer::ACTION,Criteria::LEFT_JOIN);		

		//Hack para permitir doble consulta en join
		$cond->addJoin(ActionlogLabelPeer::FORWARD .' = '. ActionlogPeer::FORWARD.' AND '. ActionlogPeer::ACTION, ActionlogLabelPeer::ACTION, Criteria::LEFT_JOIN);

		$cond->add(ActionlogLabelPeer::LANGUAGE,Common::getCurrentLanguageCode(),Criteria::EQUAL);		

		$cond->addJoin(ActionlogPeer::USERID, UserPeer::ID,Criteria::LEFT_JOIN);		

		$criterion = $cond->getNewCriterion(ActionlogPeer::DATETIME, $dateTo, Criteria::LESS_EQUAL);
		$criterion->addAnd($cond->getNewCriterion(ActionlogPeer::DATETIME, $dateFrom, Criteria::GREATER_EQUAL ));
    $cond->add($criterion);

		////////
		// ultima version con afiliado = 0
		if ($selectUser != -1){
			$cond->add(ActionlogPeer::USERID, $selectUser);
			$cond->add(ActionlogPeer::AFFILIATEID, 0);
		}


		if($module != -1)
		$cond->add(SecurityActionPeer::MODULE, $module, Criteria::EQUAL);

		$pager = new PropelPager($cond,"ActionlogPeer", "doSelect",$page,$perPage);

//		echo $cond->toString();	die();

		return $pager;


	}



	/**
	*
	* selectAllByRequirementsAndAffiliatePaginated
	*	Crea un filtro por requerimientos y afiliados enviados a la funcion, devuelve un listado filtrado
	* @param datetime $dateFrom fecha filtro de inicio del listado
	* @param datetime $dateTo fecha filtro del fin de listado
	* @param int $selectUser usuario filtro seleccionado
	* @param int $affiliate id del afiliado
	* @param string $module nombre del modulo seleccionado para el filtro
	* @param int $page pagina del paginado
	* @return object $pager listado filtrado y paginado
	*/
	function selectAllByRequirementsAndAffiliatePaginated  ($dateFrom,$dateTo,$selectUser,$affiliate,$module,$page=1,$perPage=25) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->addAscendingOrderByColumn(ActionlogPeer::ID);
		$cond->addJoin(ActionlogPeer::ACTION, SecurityActionPeer::ACTION,Criteria::LEFT_JOIN);		

		//Hack para permitir doble consulta en join
		$cond->addJoin(ActionlogLabelPeer::FORWARD .' = '. ActionlogPeer::FORWARD.' AND '. ActionlogPeer::ACTION, ActionlogLabelPeer::ACTION, Criteria::LEFT_JOIN);

		$cond->add(ActionlogLabelPeer::ACTION, Common::getCurrentLanguageCode(),Criteria::EQUAL);		

		$cond->addJoin(ActionlogPeer::USERID, UserPeer::ID,Criteria::LEFT_JOIN);		

		$criterion = $cond->getNewCriterion(ActionlogPeer::DATETIME, $dateTo, Criteria::LESS_EQUAL);
		$criterion->addAnd($cond->getNewCriterion(ActionlogPeer::DATETIME, $dateFrom, Criteria::GREATER_EQUAL ));
    $cond->add($criterion);

		////////////
		// Version con afiliado
		@include_once('AffiliatePeer.php');
		if (class_exists('AffiliatePeer')){
			$cond->addJoin(ActionlogPeer::AFFILIATEID, AffiliatePeer::ID,Criteria::LEFT_JOIN);
			$cond->add(ActionlogPeer::AFFILIATEID, $affiliate,Criteria::EQUAL);
		}

		if ($selectUser != -1)
		$cond->add(ActionlogPeer::USERID, $selectUser, Criteria::EQUAL);

		if($module != -1)
		$cond->add(SecurityActionPeer::MODULE, $module, Criteria::EQUAL);

		$pager = new PropelPager($cond,"ActionlogPeer", "doSelect",$page,$perPage);
		
//		echo $cond->toString(); 	die();
		
		return $pager;
	}


	/**
	* deleteLogs
	*	Purga datos de la lista de logs
	* @param datetime $dateFrom inicio de fecha de purgacion
	* @param datetime $dateTo fin de fecha de purgacion
	*/
	function deleteLogs($dateFrom,$dateTo) {
		try{
			$cond = new Criteria();

			$cond->add(ActionlogPeer::DATETIME, $dateFrom." 00:00:00", Criteria::GREATER_THAN );
			$cond->add(ActionlogPeer::DATETIME, $dateTo." 23:59:59", Criteria::LESS_THAN );
			$selectedLogs = ActionlogPeer::doSelect($cond);
			
			foreach($selectedLogs as $obj) {
					$obj->delete();
			}
		}catch (PropelException $e) {}
		return;
	}

	/**
	* getOldestLog
	*	Obtiene fecha del primer registro de log
	*/
	public function oldestLogDate(){
			$cond = new Criteria();

// Por que no se puede usar???
//			$cond->addSelectColumn(ActionlogPeer::DATETIME);
			$cond->addAscendingOrderByColumn(ActionlogPeer::DATETIME);
			$cond->setLimit(1);

			$logsObj = ActionlogPeer::doSelect($cond);
			$log = $logsObj[0];

		if ( !empty($log) )
			$oldestLogDate = $log->getDatetime();

			return $oldestLogDate;
	}

} // ActionlogPeer
