<?php


/**
 * Base class that represents a query for the 'orders_orderTemplateItem' table.
 *
 * Item de la Plantilla de Pedido de Productos
 *
 * @method     OrderTemplateItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrderTemplateItemQuery orderByOrdertemplateid($order = Criteria::ASC) Order by the orderTemplateId column
 * @method     OrderTemplateItemQuery orderByProductcode($order = Criteria::ASC) Order by the productCode column
 * @method     OrderTemplateItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     OrderTemplateItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method     OrderTemplateItemQuery groupById() Group by the id column
 * @method     OrderTemplateItemQuery groupByOrdertemplateid() Group by the orderTemplateId column
 * @method     OrderTemplateItemQuery groupByProductcode() Group by the productCode column
 * @method     OrderTemplateItemQuery groupByPrice() Group by the price column
 * @method     OrderTemplateItemQuery groupByQuantity() Group by the quantity column
 *
 * @method     OrderTemplateItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrderTemplateItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrderTemplateItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrderTemplateItemQuery leftJoinOrderTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplate relation
 * @method     OrderTemplateItemQuery rightJoinOrderTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplate relation
 * @method     OrderTemplateItemQuery innerJoinOrderTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplate relation
 *
 * @method     OrderTemplateItemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     OrderTemplateItemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     OrderTemplateItemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     OrderTemplateItem findOne(PropelPDO $con = null) Return the first OrderTemplateItem matching the query
 * @method     OrderTemplateItem findOneOrCreate(PropelPDO $con = null) Return the first OrderTemplateItem matching the query, or a new OrderTemplateItem object populated from the query conditions when no match is found
 *
 * @method     OrderTemplateItem findOneById(int $id) Return the first OrderTemplateItem filtered by the id column
 * @method     OrderTemplateItem findOneByOrdertemplateid(int $orderTemplateId) Return the first OrderTemplateItem filtered by the orderTemplateId column
 * @method     OrderTemplateItem findOneByProductcode(string $productCode) Return the first OrderTemplateItem filtered by the productCode column
 * @method     OrderTemplateItem findOneByPrice(double $price) Return the first OrderTemplateItem filtered by the price column
 * @method     OrderTemplateItem findOneByQuantity(int $quantity) Return the first OrderTemplateItem filtered by the quantity column
 *
 * @method     array findById(int $id) Return OrderTemplateItem objects filtered by the id column
 * @method     array findByOrdertemplateid(int $orderTemplateId) Return OrderTemplateItem objects filtered by the orderTemplateId column
 * @method     array findByProductcode(string $productCode) Return OrderTemplateItem objects filtered by the productCode column
 * @method     array findByPrice(double $price) Return OrderTemplateItem objects filtered by the price column
 * @method     array findByQuantity(int $quantity) Return OrderTemplateItem objects filtered by the quantity column
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrderTemplateItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOrderTemplateItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'OrderTemplateItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrderTemplateItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrderTemplateItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrderTemplateItemQuery) {
			return $criteria;
		}
		$query = new OrderTemplateItemQuery();
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
	 * @return    OrderTemplateItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrderTemplateItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrderTemplateItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrderTemplateItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrderTemplateItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the orderTemplateId column
	 * 
	 * @param     int|array $ordertemplateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByOrdertemplateid($ordertemplateid = null, $comparison = null)
	{
		if (is_array($ordertemplateid)) {
			$useMinMax = false;
			if (isset($ordertemplateid['min'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::ORDERTEMPLATEID, $ordertemplateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ordertemplateid['max'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::ORDERTEMPLATEID, $ordertemplateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplateItemPeer::ORDERTEMPLATEID, $ordertemplateid, $comparison);
	}

	/**
	 * Filter the query on the productCode column
	 * 
	 * @param     string $productcode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
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
		return $this->addUsingAlias(OrderTemplateItemPeer::PRODUCTCODE, $productcode, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplateItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(OrderTemplateItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplateItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query by a related OrderTemplate object
	 *
	 * @param     OrderTemplate $orderTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplate($orderTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplateItemPeer::ORDERTEMPLATEID, $orderTemplate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function joinOrderTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderTemplate');
		
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
			$this->addJoinObject($join, 'OrderTemplate');
		}
		
		return $this;
	}

	/**
	 * Use the OrderTemplate relation OrderTemplate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery A secondary query class using the current class as primary query
	 */
	public function useOrderTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderTemplate', 'OrderTemplateQuery');
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplateItemPeer::PRODUCTCODE, $product->getCode(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
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
	 * @param     OrderTemplateItem $orderTemplateItem Object to remove from the list of results
	 *
	 * @return    OrderTemplateItemQuery The current query, for fluid interface
	 */
	public function prune($orderTemplateItem = null)
	{
		if ($orderTemplateItem) {
			$this->addUsingAlias(OrderTemplateItemPeer::ID, $orderTemplateItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseOrderTemplateItemQuery
