<?php

require 'actionLogs/classes/om/BaseActionLogPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'actionLogs_log' table.
 *
 * logs del sistema
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    actionLogs.classes
 */
class ActionLogPeer extends BaseActionLogPeer {

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
		$cond->addAscendingOrderByColumn(ActionLogPeer::ID);
		$cond->addJoin(ActionLogPeer::ACTION, SecurityActionPeer::ACTION,Criteria::LEFT_JOIN);		

		//Hack para permitir doble consulta en join
		$cond->addJoin(ActionLogLabelPeer::FORWARD .' = '. ActionLogPeer::FORWARD.' AND '. ActionLogPeer::ACTION, ActionLogLabelPeer::ACTION, Criteria::LEFT_JOIN);

		$cond->add(ActionLogLabelPeer::LANGUAGE,Common::getCurrentLanguageCode(),Criteria::EQUAL);		

		$cond->addJoin(ActionLogPeer::USERID, UserPeer::ID,Criteria::LEFT_JOIN);		

		$criterion = $cond->getNewCriterion(ActionLogPeer::DATETIME, $dateTo, Criteria::LESS_EQUAL);
		$criterion->addAnd($cond->getNewCriterion(ActionLogPeer::DATETIME, $dateFrom, Criteria::GREATER_EQUAL ));
    $cond->add($criterion);

		////////
		// ultima version con afiliado = 0
		if ($selectUser != -1){
			$cond->add(ActionLogPeer::USERID, $selectUser);
			$cond->add(ActionLogPeer::AFFILIATEID, 0);
		}


		if($module != -1)
		$cond->add(SecurityActionPeer::MODULE, $module, Criteria::EQUAL);

		$pager = new PropelPager($cond,"ActionLogPeer", "doSelect",$page,$perPage);

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
		$cond->addAscendingOrderByColumn(ActionLogPeer::ID);
		$cond->addJoin(ActionLogPeer::ACTION, SecurityActionPeer::ACTION,Criteria::LEFT_JOIN);		

		//Hack para permitir doble consulta en join
		$cond->addJoin(ActionLogLabelPeer::FORWARD .' = '. ActionLogPeer::FORWARD.' AND '. ActionLogPeer::ACTION, ActionLogLabelPeer::ACTION, Criteria::LEFT_JOIN);

		$cond->add(ActionLogLabelPeer::ACTION, Common::getCurrentLanguageCode(),Criteria::EQUAL);		

		$cond->addJoin(ActionLogPeer::USERID, UserPeer::ID,Criteria::LEFT_JOIN);		

		$criterion = $cond->getNewCriterion(ActionLogPeer::DATETIME, $dateTo, Criteria::LESS_EQUAL);
		$criterion->addAnd($cond->getNewCriterion(ActionLogPeer::DATETIME, $dateFrom, Criteria::GREATER_EQUAL ));
    $cond->add($criterion);

		////////////
		// Version con afiliado
		@include_once('AffiliatePeer.php');
		if (class_exists('AffiliatePeer')){
			$cond->addJoin(ActionLogPeer::AFFILIATEID, AffiliatePeer::ID,Criteria::LEFT_JOIN);
			$cond->add(ActionLogPeer::AFFILIATEID, $affiliate,Criteria::EQUAL);
		}

		if ($selectUser != -1)
		$cond->add(ActionLogPeer::USERID, $selectUser, Criteria::EQUAL);

		if($module != -1)
		$cond->add(SecurityActionPeer::MODULE, $module, Criteria::EQUAL);

		$pager = new PropelPager($cond,"ActionLogPeer", "doSelect",$page,$perPage);
		
//		echo $cond->toString(); 	die();
		
		return $pager;
	}


	/**
	* deleteLogs
	*	Purga datos de la lista de logs
	* @param datetime $dateFrom inicio de fecha de purgacion
	* @param datetime $dateTo fin de fecha de purgacion
	*/
	function deleteLogs($dateFrom,$dateTo)
		{ 	try{
			$cond = new Criteria();

			$cond->add(ActionLogPeer::DATETIME, $dateFrom." 00:00:00", Criteria::GREATER_THAN );
			$cond->add(ActionLogPeer::DATETIME, $dateTo." 23:59:59", Criteria::LESS_THAN );
			$selectedLogs = ActionLogPeer::doSelect($cond);
			
			foreach($selectedLogs as $obj)
				{
					$obj->delete();
				}
			}catch (PropelException $e) {}
		return;
	}



} // ActionLogPeer
