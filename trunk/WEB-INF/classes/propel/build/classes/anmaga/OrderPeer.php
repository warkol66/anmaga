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

	//Constantes de estados
	const STATE_NEW = 0;
	const STATE_ACCEPTED = 1;
	const STATE_PENDING_APPROVAL = 2;
	const STATE_IN_PROCESS = 3;
	const STATE_COMPLETED = 4;
	const STATE_CANCELLED = 5;

	private $searchAffiliateId;
	private $searchDateFrom;
	private $searchDateTo;
	private $searchState;

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
	function create($number,$userId,$affiliateId,$total,$branchId=null) {
    $orderObj = new Order();
		$orderObj->setCreated(time());
		$orderObj->setNumber($number);
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
  function update($id,$userId,$affiliateId,$branchId,$total,$state) {
  	$orderObj = OrderPeer::retrieveByPK($id);
		$orderObj->setuserId($userId);
		$orderObj->setaffiliateId($affiliateId);
		$orderObj->setbranchId($branchId);
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
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
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
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
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
	 
  function setSearchAffiliateId($affiliateId) {
  	$this->searchAffiliateId = $affiliateId;
  }

  function setSearchDateFrom($dateFrom) {
  	$this->searchDateFrom = $dateFrom;
  }

  function setSearchDateTo($dateTo) {
  	$this->searchDateTo = $dateTo;
  }
  
  function setSearchState($state) {
  	$this->searchState = $state;
  }
  
	/**
	* Obtiene una busqueda paginada.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de filas por pagina
	* @return Pager Pager con informacion sobre las ordenes
	*/
	function getSearchPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	OrderPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
    	if (!empty($this->searchAffiliateId))
			$cond->add(OrderPeer::AFFILIATEID, $this->searchAffiliateId);
			
    	if (!empty($this->searchState))
			$cond->add(OrderPeer::STATE, $this->searchState);

    	if ( !empty($this->searchDateFrom) || !empty($this->searchDateTo) ) {
    		if ( !empty($this->searchDateFrom) ) {
				$criterion = $cond->getNewCriterion(OrderPeer::CREATED, $this->searchDateFrom." 00:00:00", Criteria::GREATER_EQUAL);
			}
    		if ( !empty($this->searchDateTo) ) {
      			if (!empty($criterion))
      				$criterion->addAnd($cond->getNewCriterion(OrderPeer::CREATED, $this->searchDateTo." 23:59:59", Criteria::LESS_EQUAL));
        		else
        			$criterion = $cond->getNewCriterion(OrderPeer::CREATED, $this->searchDateTo." 23:59:59", Criteria::LESS_EQUAL);
     		}
			$cond->add($criterion);
    	}

		$pager = new PropelPager($cond,"OrderPeer", "doSelect",$page,$perPage);
		return $pager;
  }

	function getTotalFromItems($items) {
		$total = 0;
		foreach ($items as $item) {
			$total += $item["price"] * $item["quantity"]; 
		}
		return $total;
	}

	function createFromArray($orders,$user) {
		
		require_once("OrderItemPeer.php");
		require_once("BranchPeer.php");
		
		$results = array();
		$results["ordersCreated"] = 0;
		$results["ordersNotCreated"] = 0;
		$results["productsFound"] = 0;
		$results["productsNotFound"] = 0;
	
		foreach ($orders as $order) {
			$total = OrderPeer::getTotalFromItems($order["items"]);
			$branchId = BranchPeer::getByNumber($order["branchNumber"]);
			$orderId = OrderPeer::create($order["number"],$user->getId(),$user->getAffiliateId(),$total,$branchId);
	
			if (!empty($orderId)) {
				$results["ordersCreated"]++;
				foreach ($order["items"] as $item) {
					if ($order["modifiedProductCodes"])
						$product = ProductPeer::getByCodeModified($item["productCode"]);
					else
						$product = ProductPeer::getByCode($item["productCode"]);
					//Si encontro al producto con ese codigo
					if (!empty($product)) {
						$results["productsFound"]++;
						OrderItemPeer::create($orderId,$product->getId(),$item["price"],$item["quantity"]);						
					}
					else
						$results["productsNotFound"]++;
				}
			}
			else
				$results["ordersNotCreated"]++;	
		}
		return $results;
	}

}
?>
