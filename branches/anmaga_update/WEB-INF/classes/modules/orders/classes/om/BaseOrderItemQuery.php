<?php


/**
 * Base class that represents a query for the 'orders_orderItem' table.
 *
 * Item del Pedido de Productos
 *
 * @method     OrderItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrderItemQuery orderByOrderid($order = Criteria::ASC) Order by the orderId column
 * @method     OrderItemQuery orderByProductcode($order = Criteria::ASC) Order by the productCode column
 * @method     OrderItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     OrderItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method     OrderItemQuery groupById() Group by the id column
 * @method     OrderItemQuery groupByOrderid() Group by the orderId column
 * @method     OrderItemQuery groupByProductcode() Group by the productCode column
 * @method     OrderItemQuery groupByPrice() Group by the price column
 * @method     OrderItemQuery groupByQuantity() Group by the quantity column
 *
 * @method     OrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrderItemQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     OrderItemQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     OrderItemQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     OrderItemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     OrderItemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     OrderItemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     OrderItem findOne(PropelPDO $con = null) Return the first OrderItem matching the query
 * @method     OrderItem findOneOrCreate(PropelPDO $con = null) Return the first OrderItem matching the query, or a new OrderItem object populated from the query conditions when no match is found
 *
 * @method     OrderItem findOneById(int $id) Return the first OrderItem filtered by the id column
 * @method     OrderItem findOneByOrderid(int $orderId) Return the first OrderItem filtered by the orderId column
 * @method     OrderItem findOneByProductcode(string $productCode) Return the first OrderItem filtered by the productCode column
 * @method     OrderItem findOneByPrice(double $price) Return the first OrderItem filtered by the price column
 * @method     OrderItem findOneByQuantity(int $quantity) Return the first OrderItem filtered by the quantity column
 *
 * @method     array findById(int $id) Return OrderItem objects filtered by the id column
 * @method     array findByOrderid(int $orderId) Return OrderItem objects filtered by the orderId column
 * @method     array findByProductcode(string $productCode) Return OrderItem objects filtered by the productCode column
 * @method     array findByPrice(double $price) Return OrderItem objects filtered by the price column
 * @method     array findByQuantity(int $quantity) Return OrderItem objects filtered by the quantity column
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrderItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOrderItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'OrderItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrderItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrderItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrderItemQuery) {
			return $criteria;
		}
		$query = new OrderItemQuery();
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
	 * @return    OrderItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrderItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrderItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrderItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrderItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the orderId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByOrderid(1234); // WHERE orderId = 1234
	 * $query->filterByOrderid(array(12, 34)); // WHERE orderId IN (12, 34)
	 * $query->filterByOrderid(array('min' => 12)); // WHERE orderId > 12
	 * </code>
	 *
	 * @see       filterByOrder()
	 *
	 * @param     mixed $orderid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByOrderid($orderid = null, $comparison = null)
	{
		if (is_array($orderid)) {
			$useMinMax = false;
			if (isset($orderid['min'])) {
				$this->addUsingAlias(OrderItemPeer::ORDERID, $orderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orderid['max'])) {
				$this->addUsingAlias(OrderItemPeer::ORDERID, $orderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderItemPeer::ORDERID, $orderid, $comparison);
	}

	/**
	 * Filter the query on the productCode column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByProductcode('fooValue');   // WHERE productCode = 'fooValue'
	 * $query->filterByProductcode('%fooValue%'); // WHERE productCode LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $productcode The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByProductcode($productcode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($productcode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $productcode)) {
				$productcode = str_replace('*', '%', $productcode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(OrderItemPeer::PRODUCTCODE, $productcode, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPrice(1234); // WHERE price = 1234
	 * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
	 * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
	 * </code>
	 *
	 * @param     mixed $price The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(OrderItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(OrderItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByQuantity(1234); // WHERE quantity = 1234
	 * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
	 * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
	 * </code>
	 *
	 * @param     mixed $quantity The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(OrderItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(OrderItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query by a related Order object
	 *
	 * @param     Order|PropelCollection $order The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByOrder($order, $comparison = null)
	{
		if ($order instanceof Order) {
			return $this
				->addUsingAlias(OrderItemPeer::ORDERID, $order->getId(), $comparison);
		} elseif ($order instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderItemPeer::ORDERID, $order->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByOrder() only accepts arguments of type Order or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Order relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Order');
		
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
			$this->addJoinObject($join, 'Order');
		}
		
		return $this;
	}

	/**
	 * Use the Order relation Order object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderQuery A secondary query class using the current class as primary query
	 */
	public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product|PropelCollection $product The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		if ($product instanceof Product) {
			return $this
				->addUsingAlias(OrderItemPeer::PRODUCTCODE, $product->getCode(), $comparison);
		} elseif ($product instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderItemPeer::PRODUCTCODE, $product->toKeyValue('PrimaryKey', 'Code'), $comparison);
		} else {
			throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     OrderItem $orderItem Object to remove from the list of results
	 *
	 * @return    OrderItemQuery The current query, for fluid interface
	 */
	public function prune($orderItem = null)
	{
		if ($orderItem) {
			$this->addUsingAlias(OrderItemPeer::ID, $orderItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseOrderItemQuery
