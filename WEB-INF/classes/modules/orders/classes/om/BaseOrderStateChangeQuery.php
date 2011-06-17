<?php


/**
 * Base class that represents a query for the 'orders_stateChanges' table.
 *
 * Cambios de Estado de Pedidos de Productos
 *
 * @method     OrderStateChangeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrderStateChangeQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     OrderStateChangeQuery orderByOrderid($order = Criteria::ASC) Order by the orderId column
 * @method     OrderStateChangeQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     OrderStateChangeQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     OrderStateChangeQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     OrderStateChangeQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     OrderStateChangeQuery groupById() Group by the id column
 * @method     OrderStateChangeQuery groupByCreated() Group by the created column
 * @method     OrderStateChangeQuery groupByOrderid() Group by the orderId column
 * @method     OrderStateChangeQuery groupByUserid() Group by the userId column
 * @method     OrderStateChangeQuery groupByAffiliateid() Group by the affiliateId column
 * @method     OrderStateChangeQuery groupByState() Group by the state column
 * @method     OrderStateChangeQuery groupByComment() Group by the comment column
 *
 * @method     OrderStateChangeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrderStateChangeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrderStateChangeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrderStateChangeQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     OrderStateChangeQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     OrderStateChangeQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     OrderStateChangeQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderStateChangeQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderStateChangeQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     OrderStateChangeQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     OrderStateChangeQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     OrderStateChangeQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     OrderStateChange findOne(PropelPDO $con = null) Return the first OrderStateChange matching the query
 * @method     OrderStateChange findOneOrCreate(PropelPDO $con = null) Return the first OrderStateChange matching the query, or a new OrderStateChange object populated from the query conditions when no match is found
 *
 * @method     OrderStateChange findOneById(int $id) Return the first OrderStateChange filtered by the id column
 * @method     OrderStateChange findOneByCreated(string $created) Return the first OrderStateChange filtered by the created column
 * @method     OrderStateChange findOneByOrderid(int $orderId) Return the first OrderStateChange filtered by the orderId column
 * @method     OrderStateChange findOneByUserid(int $userId) Return the first OrderStateChange filtered by the userId column
 * @method     OrderStateChange findOneByAffiliateid(int $affiliateId) Return the first OrderStateChange filtered by the affiliateId column
 * @method     OrderStateChange findOneByState(int $state) Return the first OrderStateChange filtered by the state column
 * @method     OrderStateChange findOneByComment(string $comment) Return the first OrderStateChange filtered by the comment column
 *
 * @method     array findById(int $id) Return OrderStateChange objects filtered by the id column
 * @method     array findByCreated(string $created) Return OrderStateChange objects filtered by the created column
 * @method     array findByOrderid(int $orderId) Return OrderStateChange objects filtered by the orderId column
 * @method     array findByUserid(int $userId) Return OrderStateChange objects filtered by the userId column
 * @method     array findByAffiliateid(int $affiliateId) Return OrderStateChange objects filtered by the affiliateId column
 * @method     array findByState(int $state) Return OrderStateChange objects filtered by the state column
 * @method     array findByComment(string $comment) Return OrderStateChange objects filtered by the comment column
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrderStateChangeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOrderStateChangeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'OrderStateChange', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrderStateChangeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrderStateChangeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrderStateChangeQuery) {
			return $criteria;
		}
		$query = new OrderStateChangeQuery();
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
	 * @return    OrderStateChange|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrderStateChangePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrderStateChangePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrderStateChangePeer::ID, $keys, Criteria::IN);
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
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrderStateChangePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
	 * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
	 * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $created The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(OrderStateChangePeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(OrderStateChangePeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::CREATED, $created, $comparison);
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
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByOrderid($orderid = null, $comparison = null)
	{
		if (is_array($orderid)) {
			$useMinMax = false;
			if (isset($orderid['min'])) {
				$this->addUsingAlias(OrderStateChangePeer::ORDERID, $orderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orderid['max'])) {
				$this->addUsingAlias(OrderStateChangePeer::ORDERID, $orderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::ORDERID, $orderid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserid(1234); // WHERE userId = 1234
	 * $query->filterByUserid(array(12, 34)); // WHERE userId IN (12, 34)
	 * $query->filterByUserid(array('min' => 12)); // WHERE userId > 12
	 * </code>
	 *
	 * @see       filterByAffiliateUser()
	 *
	 * @param     mixed $userid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(OrderStateChangePeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(OrderStateChangePeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAffiliateid(1234); // WHERE affiliateId = 1234
	 * $query->filterByAffiliateid(array(12, 34)); // WHERE affiliateId IN (12, 34)
	 * $query->filterByAffiliateid(array('min' => 12)); // WHERE affiliateId > 12
	 * </code>
	 *
	 * @see       filterByAffiliate()
	 *
	 * @param     mixed $affiliateid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(OrderStateChangePeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(OrderStateChangePeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the state column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByState(1234); // WHERE state = 1234
	 * $query->filterByState(array(12, 34)); // WHERE state IN (12, 34)
	 * $query->filterByState(array('min' => 12)); // WHERE state > 12
	 * </code>
	 *
	 * @param     mixed $state The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByState($state = null, $comparison = null)
	{
		if (is_array($state)) {
			$useMinMax = false;
			if (isset($state['min'])) {
				$this->addUsingAlias(OrderStateChangePeer::STATE, $state['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($state['max'])) {
				$this->addUsingAlias(OrderStateChangePeer::STATE, $state['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::STATE, $state, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
	 * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $comment The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comment)) {
				$comment = str_replace('*', '%', $comment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(OrderStateChangePeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query by a related Order object
	 *
	 * @param     Order|PropelCollection $order The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByOrder($order, $comparison = null)
	{
		if ($order instanceof Order) {
			return $this
				->addUsingAlias(OrderStateChangePeer::ORDERID, $order->getId(), $comparison);
		} elseif ($order instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderStateChangePeer::ORDERID, $order->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    OrderStateChangeQuery The current query, for fluid interface
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
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser|PropelCollection $affiliateUser The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		if ($affiliateUser instanceof AffiliateUser) {
			return $this
				->addUsingAlias(OrderStateChangePeer::USERID, $affiliateUser->getId(), $comparison);
		} elseif ($affiliateUser instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderStateChangePeer::USERID, $affiliateUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliateUser() only accepts arguments of type AffiliateUser or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function joinAffiliateUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUser');
		
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
			$this->addJoinObject($join, 'AffiliateUser');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUser relation AffiliateUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUser', 'AffiliateUserQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate|PropelCollection $affiliate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		if ($affiliate instanceof Affiliate) {
			return $this
				->addUsingAlias(OrderStateChangePeer::AFFILIATEID, $affiliate->getId(), $comparison);
		} elseif ($affiliate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderStateChangePeer::AFFILIATEID, $affiliate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliate() only accepts arguments of type Affiliate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function joinAffiliate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Affiliate');
		
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
			$this->addJoinObject($join, 'Affiliate');
		}
		
		return $this;
	}

	/**
	 * Use the Affiliate relation Affiliate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Affiliate', 'AffiliateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     OrderStateChange $orderStateChange Object to remove from the list of results
	 *
	 * @return    OrderStateChangeQuery The current query, for fluid interface
	 */
	public function prune($orderStateChange = null)
	{
		if ($orderStateChange) {
			$this->addUsingAlias(OrderStateChangePeer::ID, $orderStateChange->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseOrderStateChangeQuery
