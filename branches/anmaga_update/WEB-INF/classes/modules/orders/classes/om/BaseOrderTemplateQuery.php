<?php


/**
 * Base class that represents a query for the 'orders_orderTemplate' table.
 *
 * Plantillas de Pedido de Productos
 *
 * @method     OrderTemplateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrderTemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     OrderTemplateQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     OrderTemplateQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     OrderTemplateQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     OrderTemplateQuery orderByBranchid($order = Criteria::ASC) Order by the branchId column
 * @method     OrderTemplateQuery orderByTotal($order = Criteria::ASC) Order by the total column
 *
 * @method     OrderTemplateQuery groupById() Group by the id column
 * @method     OrderTemplateQuery groupByName() Group by the name column
 * @method     OrderTemplateQuery groupByCreated() Group by the created column
 * @method     OrderTemplateQuery groupByUserid() Group by the userId column
 * @method     OrderTemplateQuery groupByAffiliateid() Group by the affiliateId column
 * @method     OrderTemplateQuery groupByBranchid() Group by the branchId column
 * @method     OrderTemplateQuery groupByTotal() Group by the total column
 *
 * @method     OrderTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrderTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrderTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrderTemplateQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderTemplateQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     OrderTemplateQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     OrderTemplateQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     OrderTemplateQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     OrderTemplateQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     OrderTemplateQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method     OrderTemplateQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method     OrderTemplateQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method     OrderTemplateQuery leftJoinOrderTemplateItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplateItem relation
 * @method     OrderTemplateQuery rightJoinOrderTemplateItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplateItem relation
 * @method     OrderTemplateQuery innerJoinOrderTemplateItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplateItem relation
 *
 * @method     OrderTemplate findOne(PropelPDO $con = null) Return the first OrderTemplate matching the query
 * @method     OrderTemplate findOneOrCreate(PropelPDO $con = null) Return the first OrderTemplate matching the query, or a new OrderTemplate object populated from the query conditions when no match is found
 *
 * @method     OrderTemplate findOneById(int $id) Return the first OrderTemplate filtered by the id column
 * @method     OrderTemplate findOneByName(string $name) Return the first OrderTemplate filtered by the name column
 * @method     OrderTemplate findOneByCreated(string $created) Return the first OrderTemplate filtered by the created column
 * @method     OrderTemplate findOneByUserid(int $userId) Return the first OrderTemplate filtered by the userId column
 * @method     OrderTemplate findOneByAffiliateid(int $affiliateId) Return the first OrderTemplate filtered by the affiliateId column
 * @method     OrderTemplate findOneByBranchid(int $branchId) Return the first OrderTemplate filtered by the branchId column
 * @method     OrderTemplate findOneByTotal(double $total) Return the first OrderTemplate filtered by the total column
 *
 * @method     array findById(int $id) Return OrderTemplate objects filtered by the id column
 * @method     array findByName(string $name) Return OrderTemplate objects filtered by the name column
 * @method     array findByCreated(string $created) Return OrderTemplate objects filtered by the created column
 * @method     array findByUserid(int $userId) Return OrderTemplate objects filtered by the userId column
 * @method     array findByAffiliateid(int $affiliateId) Return OrderTemplate objects filtered by the affiliateId column
 * @method     array findByBranchid(int $branchId) Return OrderTemplate objects filtered by the branchId column
 * @method     array findByTotal(double $total) Return OrderTemplate objects filtered by the total column
 *
 * @package    propel.generator.orders.classes.om
 */
abstract class BaseOrderTemplateQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOrderTemplateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'OrderTemplate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrderTemplateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrderTemplateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrderTemplateQuery) {
			return $criteria;
		}
		$query = new OrderTemplateQuery();
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
	 * @return    OrderTemplate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrderTemplatePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrderTemplatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrderTemplatePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrderTemplatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(OrderTemplatePeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(OrderTemplatePeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(OrderTemplatePeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(OrderTemplatePeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(OrderTemplatePeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(OrderTemplatePeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the branchId column
	 * 
	 * @param     int|array $branchid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByBranchid($branchid = null, $comparison = null)
	{
		if (is_array($branchid)) {
			$useMinMax = false;
			if (isset($branchid['min'])) {
				$this->addUsingAlias(OrderTemplatePeer::BRANCHID, $branchid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($branchid['max'])) {
				$this->addUsingAlias(OrderTemplatePeer::BRANCHID, $branchid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::BRANCHID, $branchid, $comparison);
	}

	/**
	 * Filter the query on the total column
	 * 
	 * @param     double|array $total The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null)
	{
		if (is_array($total)) {
			$useMinMax = false;
			if (isset($total['min'])) {
				$this->addUsingAlias(OrderTemplatePeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($total['max'])) {
				$this->addUsingAlias(OrderTemplatePeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrderTemplatePeer::TOTAL, $total, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser $affiliateUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplatePeer::USERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
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
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplatePeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
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
	 * Filter the query by a related Branch object
	 *
	 * @param     Branch $branch  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByBranch($branch, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplatePeer::BRANCHID, $branch->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Branch relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function joinBranch($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Branch');
		
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
			$this->addJoinObject($join, 'Branch');
		}
		
		return $this;
	}

	/**
	 * Use the Branch relation Branch object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BranchQuery A secondary query class using the current class as primary query
	 */
	public function useBranchQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBranch($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Branch', 'BranchQuery');
	}

	/**
	 * Filter the query by a related OrderTemplateItem object
	 *
	 * @param     OrderTemplateItem $orderTemplateItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplateItem($orderTemplateItem, $comparison = null)
	{
		return $this
			->addUsingAlias(OrderTemplatePeer::ID, $orderTemplateItem->getOrdertemplateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplateItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function joinOrderTemplateItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderTemplateItem');
		
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
			$this->addJoinObject($join, 'OrderTemplateItem');
		}
		
		return $this;
	}

	/**
	 * Use the OrderTemplateItem relation OrderTemplateItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateItemQuery A secondary query class using the current class as primary query
	 */
	public function useOrderTemplateItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderTemplateItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderTemplateItem', 'OrderTemplateItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     OrderTemplate $orderTemplate Object to remove from the list of results
	 *
	 * @return    OrderTemplateQuery The current query, for fluid interface
	 */
	public function prune($orderTemplate = null)
	{
		if ($orderTemplate) {
			$this->addUsingAlias(OrderTemplatePeer::ID, $orderTemplate->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseOrderTemplateQuery
