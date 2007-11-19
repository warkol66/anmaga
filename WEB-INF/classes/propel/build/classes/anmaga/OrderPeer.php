<?php

// The parent class
require_once 'om/BaseOrderPeer.php';

// The object class
include_once 'Order.php';
require_once('OrderItemPeer.php');

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
	const STATE_TO_BE_VERIFIED = 6;

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
	
	function getStateNameFromNumber($number) {
		global $protectedWords;
		$stateTexts = $protectedWords["orderStates"];
		switch ($number) {
			case OrderPeer::STATE_NEW: 
				return $stateTexts["new"];
			case OrderPeer::STATE_ACCEPTED: 
				return $stateTexts["accepted"];				
			case OrderPeer::STATE_PENDING_APPROVAL: 
				return $stateTexts["pendingApproval"];
			case OrderPeer::STATE_IN_PROCESS: 
				return $stateTexts["inProcess"];
			case OrderPeer::STATE_COMPLETED: 
				return $stateTexts["completed"];
			case OrderPeer::STATE_CANCELLED: 
				return $stateTexts["cancelled"];	
			case OrderPeer::STATE_TO_BE_VERIFIED: 
				return $stateTexts["toBeVerified"];					
		}
		return "";
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
  * Obtiene la informacion de un order.
  *
  * @param string $number Number del order
  * @param int $affiliateId Id del afiliado
  * @return array Informacion del order
  */  
  function getByNumber($number,$affiliateId) {
	$cond = new Criteria();
	$cond->add(OrderPeer::NUMBER, $number);    
	$cond->add(OrderPeer::AFFILIATEID, $affiliateId);    
	$alls = OrderPeer::doSelect($cond);
	return $alls[0];
  }    
  
  /**
  * Indica si existe una orden con ese numero.
  *
  * @param string $number Number del order
  * @param int $affiliateId Id del afiliado
  * @return array Informacion del order
  */  
  function existsByNumber($number,$affiliateId) {
	$cond = new Criteria();
	$cond->add(OrderPeer::NUMBER, $number);    
	$cond->add(OrderPeer::AFFILIATEID, $affiliateId);    
	$alls = OrderPeer::doSelect($cond);
	if (count($alls) > 0)
		return true;
	return false;
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
		require_once("OrderStateChangePeer.php");
		
		$results = array();
		$results["ordersCreated"] = 0;
		$results["ordersNotCreated"] = 0;
		$results["productsFound"] = 0;
		$results["productsNotFound"] = 0;
		$results["productsCodesNotFounds"] = array();
		$results["ordersReport"] = array();
		$results["duplicatedOrders"] = array();
		$results["duplicatedOrdersCount"] = 0;
		
		foreach ($orders as $order) {
			$totalInFile = $order["total"];
			$subtotalInFile = $order["subtotal"];
			$totalCalculated = OrderPeer::getTotalFromItems($order["items"]);
			if (!empty($totalInFile))
				$total = $totalInFile;
			else
				$total = $totalCalculated;
			$branch = BranchPeer::getByNumber($order["branchNumber"],$user->getAffiliateId());
			if ($branch)
				$branchId = $branch->getId();
			else
				$branchId = null;
			
			//$existsOrder = OrderPeer::existsByNumber($order["number"],$user->getAffiliateId());
			$existsOrder = false;
			if ($existsOrder) {
				$results["duplicatedOrdersCount"]++;
				$results["duplicatedOrders"][] = $order["number"];
			}	
			else {			
				$orderId = OrderPeer::create($order["number"],$user->getId(),$user->getAffiliateId(),$total,$branchId);
   
				//cambio el estado de la orden si hay discrepancias entre el importe en el archivo y el importe calculado
				if (!empty($subtotalInFile) && $subtotalInFile != $totalCalculated) {
					$comment = "Discrepancias de Totales: SubTotal en Archivo: ".$subtotalInFile." - SubTotal Calculado: ".$totalCalculated;
					OrderStateChangePeer::create($orderId,$user->getId(),$user->getAffiliateId(),OrderPeer::STATE_TO_BE_VERIFIED,$comment);	
					$orderObj = OrderPeer::get($orderId);
					if ($orderObj) {
						$orderObj->setState(OrderPeer::STATE_TO_BE_VERIFIED);
						$orderObj->save();					
					}
				} 	
				
				/*
				TODO: Agregar verificacion de precios.
				En el encabezado tenes, subtotal, impuesto y total. Con esos tres dato, sacas la alicuota del iva: 
				por ejemplo, 100; 21; 121, la alicuota es 21%
				Con esa alicuota, es que vas a calcular que los precios del cada articulo con los de la lista de precios
   				*/
				
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
						else {
							$results["productsNotFound"]++;
							$results["productsCodesNotFounds"][] = $item["productCode"];
							$results["ordersReport"][$orderId][] = array("code" => $item["productCode"], "quantity" => $item["quantity"]);
						}
					}
					//cambio el estado de la orden si tuvo productos no encontrados
					if (!empty($results["ordersReport"][$orderId])) {
						$comment = "Productos No Encontrados:";
						foreach ($results["ordersReport"][$orderId] as $product) {
							$comment .= "Product Code: ".$product["code"]." - Quantity: ".$product["quantity"]."\r\n";
						}
						OrderStateChangePeer::create($orderId,$user->getId(),$user->getAffiliateId(),OrderPeer::STATE_TO_BE_VERIFIED,$comment);	
						$orderObj = OrderPeer::get($orderId);
						if ($orderObj) {
							$orderObj->setState(OrderPeer::STATE_TO_BE_VERIFIED);
							$orderObj->save();					
						}
					} 			
				}
				else
					$results["ordersNotCreated"]++;	
			}
		}
		$results["productsCodesNotFoundsUnique"] = sort(array_unique($results["productsCodesNotFounds"]));
		return $results;
	}
	

}
