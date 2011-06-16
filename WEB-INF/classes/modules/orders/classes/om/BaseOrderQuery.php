<?php


/**
 * Base class that represents a query for the 'orders_order' table.
 *
 * Pedido de Productos
 *
 * @method     OrderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrderQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     OrderQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     OrderQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     OrderQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     OrderQuery orderByBranchid($order = Criteria::ASC) Order by the branchId column
 * @method     OrderQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     OrderQuery orderByState($order = Criteria::ASC) Order by the state column
 *
 * @method     OrderQuery groupById() Group by the id column
 * @method     OrderQuery groupByNumber() Group by the number column
 * @method     OrderQuery groupByCreated() Group by the created column
 * @method     OrderQuery groupByUserid() Group by the userId column
 * @method     OrderQuery groupByAffiliateid() Group by the affiliateId column
 * @method     OrderQuery groupByBranchid() Group by the branchId column
 * @method     OrderQuery groupByTotal() Group by the total column
 * @method     OrderQuery groupByState() Group by the state column
 *
 * @method     OrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrderQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     OrderQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     OrderQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     OrderQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     OrderQuery leftJoinAffiliateBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateBranch relation
 * @method     OrderQuery rightJoinAffiliateBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateBranch relation
 * @method     OrderQuery innerJoinAffiliateBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateBranch relation
 *
 * @method     OrderQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method     OrderQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method     OrderQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method     OrderQuery leftJoinOrderStateChange($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderStateChange relation
 * @method     OrderQuery rightJoinOrderStateChange($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderStateChange relation
 * @method     OrderQuery innerJoinOrderStateChange($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderStateChange relation
 *
 * @method     Order findOne(PropelPDO $con = null) Return the first Order matching the query
 * @method     Order findOneOrCreate(PropelPDO $con = null) Return the first Order matching the query, or a new Order object populated from the query conditions when no match is found
 *
 * @method     Order findOneById(int $id) Return the first Order filtered by the id column
 * @method     Order findOneByNumber(int $number) Return the first Order filtered by the number column
 * @method     Order findOneByCreated(string $created) Return the first Order filtered by the created column
 * @method     Order findOneByUserid(int $userId) Return the first Order filtered by the userId column
 * @method     Order findOneByAffiliateid(int $affiliateId) Return the first Order filtered by the affiliateId column
 * @method     Order findOneByBranchid(int $branchId) Return the first Order filtered by the branchId column
 * @method     Order findOneByTotal(double $total) Return the first Order filtered by the total column
 * @method     Order findOneByState(int $state) Return the first Order filtered by the state column
 *
 * @method     array findById(int $id) Return Order objects filtered by the id column
 * @method     array findByNumber(int $number) Return Order objects filtered by the number column
 * @method     array findByCreated(string $created) Return Order objects filtered by the created column
 * @method     array findByUserid(int $userId) Return Order objects filtered by the userId column
 * @method     array findByAffiliateid(int $affiliateId) Return Order objects filtered by the affiliateId column
 * @method     array findByBranchid(int $branchId) Return Order objects filtered by the branchId column
 * @method     array findByTotal(double $total) Return Order objects filtered by the total column
 * @method     array findByState(int $state) Return Order objects filtered by the state column
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrderQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOrderQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'Order', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrderQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrderQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrderQuery) {
			return $criteria;
		}
		$query = new OrderQuery();
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
	 * @return    Order|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrderPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrderPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrderPeer::ID, $keys, Criteria::IN);
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrderPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the number column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByNumber(1234); // WHERE number = 1234
	 * $query->filterByNumber(array(12, 34)); // WHERE number IN (12, 34)
	 * $query->filterByNumber(array('min' => 12)); // WHERE number > 12
	 * </code>
	 *
	 * @param     mixed $number The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(OrderPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(OrderPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::NUMBER, $number, $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(OrderPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(OrderPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::CREATED, $created, $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(OrderPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(OrderPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::USERID, $userid, $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(OrderPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(OrderPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the branchId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByBranchid(1234); // WHERE branchId = 1234
	 * $query->filterByBranchid(array(12, 34)); // WHERE branchId IN (12, 34)
	 * $query->filterByBranchid(array('min' => 12)); // WHERE branchId > 12
	 * </code>
	 *
	 * @see       filterByAffiliateBranch()
	 *
	 * @param     mixed $branchid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByBranchid($branchid = null, $comparison = null)
	{
		if (is_array($branchid)) {
			$useMinMax = false;
			if (isset($branchid['min'])) {
				$this->addUsingAlias(OrderPeer::BRANCHID, $branchid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($branchid['max'])) {
				$this->addUsingAlias(OrderPeer::BRANCHID, $branchid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::BRANCHID, $branchid, $comparison);
	}

	/**
	 * Filter the query on the total column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByTotal(1234); // WHERE total = 1234
	 * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
	 * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
	 * </code>
	 *
	 * @param     mixed $total The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null)
	{
		if (is_array($total)) {
			$useMinMax = false;
			if (isset($total['min'])) {
				$this->addUsingAlias(OrderPeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($total['max'])) {
				$this->addUsingAlias(OrderPeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::TOTAL, $total, $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByState($state = null, $comparison = null)
	{
		if (is_array($state)) {
			$useMinMax = false;
			if (isset($state['min'])) {
				$this->addUsingAlias(OrderPeer::STATE, $state['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($state['max'])) {
				$this->addUsingAlias(OrderPeer::STATE, $state['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderPeer::STATE, $state, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser|PropelCollection $affiliateUser The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		if ($affiliateUser instanceof AffiliateUser) {
			return $this
				->addUsingAlias(OrderPeer::USERID, $affiliateUser->getId(), $comparison);
		} elseif ($affiliateUser instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderPeer::USERID, $affiliateUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
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
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		if ($affiliate instanceof Affiliate) {
			return $this
				->addUsingAlias(OrderPeer::AFFILIATEID, $affiliate->getId(), $comparison);
		} elseif ($affiliate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderPeer::AFFILIATEID, $affiliate->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    OrderQuery The current query, for fluid interface
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
	 * Filter the query by a related AffiliateBranch object
	 *
	 * @param     AffiliateBranch|PropelCollection $affiliateBranch The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateBranch($affiliateBranch, $comparison = null)
	{
		if ($affiliateBranch instanceof AffiliateBranch) {
			return $this
				->addUsingAlias(OrderPeer::BRANCHID, $affiliateBranch->getId(), $comparison);
		} elseif ($affiliateBranch instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(OrderPeer::BRANCHID, $affiliateBranch->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliateBranch() only accepts arguments of type AffiliateBranch or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateBranch relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function joinAffiliateBranch($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateBranch');
		
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
			$this->addJoinObject($join, 'AffiliateBranch');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateBranch relation AffiliateBranch object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateBranchQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateBranchQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAffiliateBranch($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateBranch', 'AffiliateBranchQuery');
	}

	/**
	 * Filter the query by a related OrderItem object
	 *
	 * @param     OrderItem $orderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByOrderItem($orderItem, $comparison = null)
	{
		if ($orderItem instanceof OrderItem) {
			return $this
				->addUsingAlias(OrderPeer::ID, $orderItem->getOrderid(), $comparison);
		} elseif ($orderItem instanceof PropelCollection) {
			return $this
				->useOrderItemQuery()
					->filterByPrimaryKeys($orderItem->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderItem() only accepts arguments of type OrderItem or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function joinOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderItem');
		
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
			$this->addJoinObject($join, 'OrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the OrderItem relation OrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'OrderItemQuery');
	}

	/**
	 * Filter the query by a related OrderStateChange object
	 *
	 * @param     OrderStateChange $orderStateChange  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function filterByOrderStateChange($orderStateChange, $comparison = null)
	{
		if ($orderStateChange instanceof OrderStateChange) {
			return $this
				->addUsingAlias(OrderPeer::ID, $orderStateChange->getOrderid(), $comparison);
		} elseif ($orderStateChange instanceof PropelCollection) {
			return $this
				->useOrderStateChangeQuery()
					->filterByPrimaryKeys($orderStateChange->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderStateChange() only accepts arguments of type OrderStateChange or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderStateChange relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function joinOrderStateChange($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderStateChange');
		
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
			$this->addJoinObject($join, 'OrderStateChange');
		}
		
		return $this;
	}

	/**
	 * Use the OrderStateChange relation OrderStateChange object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderStateChangeQuery A secondary query class using the current class as primary query
	 */
	public function useOrderStateChangeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderStateChange($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderStateChange', 'OrderStateChangeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Order $order Object to remove from the list of results
	 *
	 * @return    OrderQuery The current query, for fluid interface
	 */
	public function prune($order = null)
	{
		if ($order) {
			$this->addUsingAlias(OrderPeer::ID, $order->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseOrderQuery
