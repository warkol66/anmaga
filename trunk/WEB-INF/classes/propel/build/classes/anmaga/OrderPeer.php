<?php

// The parent class
require_once 'om/BaseOrderPeer.php';

// The object class
include_once 'Order.php';

/**
 * Class OrderPeer
 *
 * @package Order
 */
class OrderPeer extends BaseOrderPeer {

	/**
	* Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
	*
	* @return int Cantidad de filas por pagina
	*/
	function getRowsPerPage() {
		global $system;
		return $system["config"]["system"]["rowsPerPage"];
	}

  /**
  * Crea un order nuevo.
  *
  * @param int $userId userId del order
  * @param int $affiliateId affiliateId del order
  * @param float $total total del order
  * @param int $branchId [optional] branchId del order
  * @return int Id de la orden creada
	*/
	function create($userId,$affiliateId,$total,$branchId=null) {
    $orderObj = new Order();
		$orderObj->setCreated(time());
		$orderObj->setUserId($userId);
		$orderObj->setAffiliateId($affiliateId);
		if (!empty($branchId))
			$orderObj->setBranchId($branchId);
		$orderObj->setTotal($total);
		$orderObj->setState(0);
		$orderObj->save();
		return $orderObj->getId();
	}

  /**
  * Actualiza la informacion de un order.
  *
  * @param int $id id del order
  * @param int $userId userId del order
  * @param int $affiliateId affiliateId del order
  * @param int $branchId branchId del order
  * @param string $processed processed del order
  * @param float $total total del order
  * @param int $state state del order
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$userId,$affiliateId,$branchId,$processed,$total,$state) {
  	$orderObj = OrderPeer::retrieveByPK($id);
		$orderObj->setuserId($userId);
		$orderObj->setaffiliateId($affiliateId);
		$orderObj->setbranchId($branchId);
		$orderObj->setprocessed($processed);
		$orderObj->settotal($total);
		$orderObj->setstate($state);    
		$orderObj->save();
		return true;
  }

	/**
	* Elimina un order a partir de los valores de la clave.
	*
  * @param int $id id del order
	*	@return boolean true si se elimino correctamente el order, false sino
	*/
  function delete($id) {
  	$orderObj = OrderPeer::retrieveByPK($id);
    $orderObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un order.
  *
  * @param int $id id del order
  * @return array Informacion del order
  */
  function get($id) {
		$orderObj = OrderPeer::retrieveByPK($id);
    return $orderObj;
  }

  /**
  * Obtiene todos los orders.
	*
	*	@return array Informacion sobre todos los orders
  */
	function getAll() {
		$cond = new Criteria();
		$alls = OrderPeer::doSelect($cond);
		return $alls;
  }      
  
  /**
  * Obtiene todos los orders paginados.
	*
	*	@return array Informacion sobre los orders
  */
	function getAllPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	OrderPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();

		$pager = new PropelPager($cond,"OrderPeer", "doSelect",$page,$perPage);
		return $pager;
	 }

  /**
  * Obtiene todos los orders de un afiliado.
	*
	* @param int $affiliateId Id del afiliado
	*	@return array Informacion sobre los orders
  */
	function getAllByAffiliateId($affiliateId) {
		$cond = new Criteria();
		$cond->add(OrderPeer::AFFILIATEID, $affiliateId);
		$alls = OrderPeer::doSelect($cond);
		return $alls;
  }

  /**
  * Obtiene todos los orders de un afiliado paginados.
	*
	* @param int $affiliateId Id del afiliado
	*	@return array Informacion sobre los orders
  */
	function getAllByAffiliateIdPaginated($affiliateId,$page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	OrderPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->add(OrderPeer::AFFILIATEID, $affiliateId);

		$pager = new PropelPager($cond,"OrderPeer", "doSelect",$page,$perPage);
		return $pager;
	 }

}
?>
