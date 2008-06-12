<?php

require_once 'NodePeer.php';
include_once 'AffiliateProductPeer.php';

/** 
 * The skeleton for this class was autogenerated by Propel on:
 *
 * [02/26/07 14:17:59]
 *
 *  You should add additional methods to this class to meet the
 *  application requirements.  This class will only be generated as
 *  long as it does not already exist in the output directory.
 *
 * @package sipro 
 */
class TreePeer {


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
	* Obtiene todas las raices.
	*
	* @return array Array de Nodes de raices
	*/
	function getAllRoots() {
		$cond = new Criteria();
		$criterion = $cond->getNewCriterion(NodePeer::PARENTID, null);
		$criterion->addOr($cond->getNewCriterion(NodePeer::PARENTID, 0));
		$cond->add($criterion);
		$objs = NodePeer::doSelect($cond);
		return $objs;
	}
	
	/**
	* Obtiene todos los arboles.
	*
	* @return array Arboles
	*/
	function getAll() {
		$roots = TreePeer::getAllRoots();
		$trees = array();
		foreach ($roots as $root) 
			$trees[] = TreePeer::get($root->getId());
		return $trees;
	}
	
	/**
	* Obtiene todos los arboles de un tipo especifico.
	*
	* @return array Arboles
	*/
	function getAllByKind($kind) {
		$roots = TreePeer::getAllRootsByKind($kind);
		$trees = array();
		foreach ($roots as $root) 
			$trees[] = TreePeer::get($root->getId());
		return $trees;
	}
	
	/**
	* Obtiene todos los arboles de un tipo especifico, solo los nodos de ese tipo.
	*
	*	@param string $kind Tipo de nodo 
	* @return array Arboles
	*/
	function getAllOnlyKind($kind) {
		$roots = TreePeer::getAllRootsByKind($kind);
		$trees = array();
		foreach ($roots as $root) 
			$trees[] = TreePeer::getOnlyKind($root->getId(),$kind);
		return $trees;
	}

	/**
	* Obtiene todas las raices de un tipo especifico.
	*
	*	@param string $kind Tipo de nodo raiz de los arboles
	* @return array Arboles
	*/
	function getAllRootsByKind($kind) {
		$cond = new Criteria();
		$criterion = $cond->getNewCriterion(NodePeer::PARENTID, null);
		$criterion->addOr($cond->getNewCriterion(NodePeer::PARENTID, 0));
		$cond->add($criterion);		
		$cond->add(NodePeer::KIND, $kind);
		$objs = NodePeer::doSelect($cond);
		return $objs;
	}
	
	/**
	* Obtiene todas las raices de un tipo especifico paginadas.
	*
	*	@param string $kind Tipo de nodo raiz de los arboles
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de elementos por pagina
	* @return array Arboles
	*/
	function getAllRootsByKindPaginated($kind,$page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	TreePeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$criterion = $cond->getNewCriterion(NodePeer::PARENTID, null);
		$criterion->addOr($cond->getNewCriterion(NodePeer::PARENTID, 0));
		$cond->add($criterion);		
		$cond->add(NodePeer::KIND, $kind);

		$pager = new PropelPager($cond,"NodePeer", "doSelect",$page,$perPage);
		return $pager;
	}

	/**
	* Obtiene todas las raices de productos paginadas.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de elementos por pagina
	* @return array Arboles
	*/
	function getAllRootsProductsPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	TreePeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$criterion = $cond->getNewCriterion(NodePeer::PARENTID, null);
		$criterion->addOr($cond->getNewCriterion(NodePeer::PARENTID, 0));
		$cond->add($criterion);		
		$cond->add(NodePeer::KIND, "Product");
		$cond->addJoin(NodePeer::OBJECTID, ProductPeer::ID);
		$cond->add(ProductPeer::ACTIVE, true);

		$pager = new PropelPager($cond,"NodePeer", "doSelect",$page,$perPage);
		return $pager;
	}	


	/**
	* Obtiene la raiz del arbol.
	*
	* @param int $id Id del nodo raiz del arbol
	* @return Node Nodo raiz del arbol
	*/
  function getRoot($id) {
   	$obj = NodePeer::retrieveByPK($id);
		return $obj;
  }

	/**
	* Obtiene un arbol.
	*
	* @param int $id Id del nodo raiz del arbol
	* @return array Arbol
	*/
  function get($id) {
   	$obj = TreePeer::getRoot($id);
   	$tree = array();
   	$tree["node"] = $obj;
   	$tree["childs"] = $obj->getSubTree();
		return $tree;
  }
  
	/**
	* Obtiene un arbol, con solo los nodos de un tipo.
	*
	* @param int $id Id del nodo raiz del arbol
	*	@param string $kind Tipo de nodo
	* @return array Arbol
	*/
  function getOnlyKind($id,$kind) {
   	$obj = TreePeer::getRoot($id);
   	$tree = array();
   	$tree["node"] = $obj;
   	$tree["childs"] = $obj->getSubTreeOnlyKind($kind);
		return $tree;
  }


	/**
	* Obtiene un nodo del arbol.
	*
	* @param int $id Id del nodo
	* @return Node Nodo
	*/
  function getNodeById($id) {
   	$obj = NodePeer::retrieveByPK($id);
		return $obj;
  }

	/**
	* Obtiene un subarbol a partir de un nodo.
	*
	* @param int $id Id del nodo
	* @return array Arbol
	*/
  function getByNodeId($id) {
   	return TreePeer::get($id);
  }

 //UNICAMENTE PARA LOS CASOS DE AFILIADOS

  /** Obtiene todas las raices de un tipo especifico paginadas.
	*
	* @param integer $affiliateId id del afiliado.
	* @param string $kind Tipo de nodo raiz de los arboles
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de elementos por pagina
	* @return array Arboles
	*/
	function getAllRootsByKindPaginatedAffiliate($kind,$page=1,$perPage=-1) {
		
		if ($perPage == -1)
			$perPage = 	TreePeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$criterion = $cond->getNewCriterion(NodePeer::PARENTID, null);
		$criterion->addOr($cond->getNewCriterion(NodePeer::PARENTID, 0));
		$cond->add($criterion);
		$cond->add(NodePeer::KIND, $kind);
		$cond->add(AffiliateProductPeer::AFFILIATEID, Common::getAffiliatedId());
		$cond->addJoin(NodePeer::ID , AffiliateProductPeer::PRODUCTID, Criteria::JOIN);
		$cond->addJoin(NodePeer::OBJECTID, ProductPeer::ID);
		$cond->add(ProductPeer::ACTIVE, true);			
		
		$pager = new PropelPager($cond,"NodePeer", "doSelect",$page,$perPage);
		
		return $pager;
	}
	
	function getAllByAffiliatePaginated($affiliateId,$page,$perPage=10) {
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();

		$cond->add(AffiliateProductPeer::AFFILIATEID, $affiliateId);
		$cond->addJoin(NodePeer::ID , AffiliateProductPeer::PRODUCTID, Criteria::JOIN);
		$pager = new PropelPager($cond,"NodePeer","doSelect",$page,$perPage);

		return $pager;

	 }

	

}


