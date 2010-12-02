<?php


/**
 * Base class that represents a query for the 'import_clientPurchaseOrderItem' table.
 *
 * Elemento de Orden de Pedido a Cliente
 *
 * @method     ClientPurchaseOrderItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientPurchaseOrderItemQuery orderByProductid($order = Criteria::ASC) Order by the productId column
 * @method     ClientPurchaseOrderItemQuery orderByClientpurchaseorderid($order = Criteria::ASC) Order by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ClientPurchaseOrderItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 *
 * @method     ClientPurchaseOrderItemQuery groupById() Group by the id column
 * @method     ClientPurchaseOrderItemQuery groupByProductid() Group by the productId column
 * @method     ClientPurchaseOrderItemQuery groupByClientpurchaseorderid() Group by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderItemQuery groupByQuantity() Group by the quantity column
 * @method     ClientPurchaseOrderItemQuery groupByPrice() Group by the price column
 *
 * @method     ClientPurchaseOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientPurchaseOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientPurchaseOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientPurchaseOrderItemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ClientPurchaseOrderItemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ClientPurchaseOrderItemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ClientPurchaseOrderItemQuery leftJoinClientPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientPurchaseOrderItemQuery rightJoinClientPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientPurchaseOrderItemQuery innerJoinClientPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrder relation
 *
 * @method     ClientPurchaseOrderItem findOne(PropelPDO $con = null) Return the first ClientPurchaseOrderItem matching the query
 * @method     ClientPurchaseOrderItem findOneOrCreate(PropelPDO $con = null) Return the first ClientPurchaseOrderItem matching the query, or a new ClientPurchaseOrderItem object populated from the query conditions when no match is found
 *
 * @method     ClientPurchaseOrderItem findOneById(int $id) Return the first ClientPurchaseOrderItem filtered by the id column
 * @method     ClientPurchaseOrderItem findOneByProductid(int $productId) Return the first ClientPurchaseOrderItem filtered by the productId column
 * @method     ClientPurchaseOrderItem findOneByClientpurchaseorderid(int $clientPurchaseOrderId) Return the first ClientPurchaseOrderItem filtered by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderItem findOneByQuantity(int $quantity) Return the first ClientPurchaseOrderItem filtered by the quantity column
 * @method     ClientPurchaseOrderItem findOneByPrice(double $price) Return the first ClientPurchaseOrderItem filtered by the price column
 *
 * @method     array findById(int $id) Return ClientPurchaseOrderItem objects filtered by the id column
 * @method     array findByProductid(int $productId) Return ClientPurchaseOrderItem objects filtered by the productId column
 * @method     array findByClientpurchaseorderid(int $clientPurchaseOrderId) Return ClientPurchaseOrderItem objects filtered by the clientPurchaseOrderId column
 * @method     array findByQuantity(int $quantity) Return ClientPurchaseOrderItem objects filtered by the quantity column
 * @method     array findByPrice(double $price) Return ClientPurchaseOrderItem objects filtered by the price column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientPurchaseOrderItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientPurchaseOrderItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientPurchaseOrderItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientPurchaseOrderItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientPurchaseOrderItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientPurchaseOrderItemQuery) {
			return $criteria;
		}
		$query = new ClientPurchaseOrderItemQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ClientPurchaseOrderItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientPurchaseOrderItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the productId column
	 * 
	 * @param     int|array $productid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByProductid($productid = null, $comparison = null)
	{
		if (is_array($productid)) {
			$useMinMax = false;
			if (isset($productid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::PRODUCTID, $productid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::PRODUCTID, $productid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::PRODUCTID, $productid, $comparison);
	}

	/**
	 * Filter the query on the clientPurchaseOrderId column
	 * 
	 * @param     int|array $clientpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByClientpurchaseorderid($clientpurchaseorderid = null, $comparison = null)
	{
		if (is_array($clientpurchaseorderid)) {
			$useMinMax = false;
			if (isset($clientpurchaseorderid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientpurchaseorderid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderItemPeer::PRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Product');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Product');
		}
		
		return $this;
	}

	/**
	 * Use the Product relation Product object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery A secondary query class using the current class as primary query
	 */
	public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
	}

	/**
	 * Filter the query by a related ClientPurchaseOrder object
	 *
	 * @param     ClientPurchaseOrder $clientPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrder($clientPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderItemPeer::CLIENTPURCHASEORDERID, $clientPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientPurchaseOrder');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'ClientPurchaseOrder');
		}
		
		return $this;
	}

	/**
	 * Use the ClientPurchaseOrder relation ClientPurchaseOrder object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery A secondary query class using the current class as primary query
	 */
	public function useClientPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientPurchaseOrder', 'ClientPurchaseOrderQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClientPurchaseOrderItem $clientPurchaseOrderItem Object to remove from the list of results
	 *
	 * @return    ClientPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function prune($clientPurchaseOrderItem = null)
	{
		if ($clientPurchaseOrderItem) {
			$this->addUsingAlias(ClientPurchaseOrderItemPeer::ID, $clientPurchaseOrderItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientPurchaseOrderItemQuery
