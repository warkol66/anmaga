<?php


/**
 * Base class that represents a query for the 'actionlogs_log' table.
 *
 * logs del sistema
 *
 * @method     ActionlogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ActionlogQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     ActionlogQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     ActionlogQuery orderByDatetime($order = Criteria::ASC) Order by the datetime column
 * @method     ActionlogQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ActionlogQuery orderByObject($order = Criteria::ASC) Order by the object column
 * @method     ActionlogQuery orderByForward($order = Criteria::ASC) Order by the forward column
 *
 * @method     ActionlogQuery groupById() Group by the id column
 * @method     ActionlogQuery groupByUserid() Group by the userId column
 * @method     ActionlogQuery groupByAffiliateid() Group by the affiliateId column
 * @method     ActionlogQuery groupByDatetime() Group by the datetime column
 * @method     ActionlogQuery groupByAction() Group by the action column
 * @method     ActionlogQuery groupByObject() Group by the object column
 * @method     ActionlogQuery groupByForward() Group by the forward column
 *
 * @method     ActionlogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ActionlogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ActionlogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ActionlogQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ActionlogQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ActionlogQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ActionlogQuery leftJoinSecurityAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the SecurityAction relation
 * @method     ActionlogQuery rightJoinSecurityAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SecurityAction relation
 * @method     ActionlogQuery innerJoinSecurityAction($relationAlias = null) Adds a INNER JOIN clause to the query using the SecurityAction relation
 *
 * @method     Actionlog findOne(PropelPDO $con = null) Return the first Actionlog matching the query
 * @method     Actionlog findOneOrCreate(PropelPDO $con = null) Return the first Actionlog matching the query, or a new Actionlog object populated from the query conditions when no match is found
 *
 * @method     Actionlog findOneById(int $id) Return the first Actionlog filtered by the id column
 * @method     Actionlog findOneByUserid(int $userId) Return the first Actionlog filtered by the userId column
 * @method     Actionlog findOneByAffiliateid(int $affiliateId) Return the first Actionlog filtered by the affiliateId column
 * @method     Actionlog findOneByDatetime(string $datetime) Return the first Actionlog filtered by the datetime column
 * @method     Actionlog findOneByAction(string $action) Return the first Actionlog filtered by the action column
 * @method     Actionlog findOneByObject(string $object) Return the first Actionlog filtered by the object column
 * @method     Actionlog findOneByForward(string $forward) Return the first Actionlog filtered by the forward column
 *
 * @method     array findById(int $id) Return Actionlog objects filtered by the id column
 * @method     array findByUserid(int $userId) Return Actionlog objects filtered by the userId column
 * @method     array findByAffiliateid(int $affiliateId) Return Actionlog objects filtered by the affiliateId column
 * @method     array findByDatetime(string $datetime) Return Actionlog objects filtered by the datetime column
 * @method     array findByAction(string $action) Return Actionlog objects filtered by the action column
 * @method     array findByObject(string $object) Return Actionlog objects filtered by the object column
 * @method     array findByForward(string $forward) Return Actionlog objects filtered by the forward column
 *
 * @package    propel.generator.actionlogs.classes.om
 */
abstract class BaseActionlogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseActionlogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Actionlog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ActionlogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ActionlogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ActionlogQuery) {
			return $criteria;
		}
		$query = new ActionlogQuery();
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
	 * @return    Actionlog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ActionlogPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ActionlogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ActionlogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ActionlogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(ActionlogPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(ActionlogPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(ActionlogPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(ActionlogPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the datetime column
	 * 
	 * @param     string|array $datetime The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByDatetime($datetime = null, $comparison = null)
	{
		if (is_array($datetime)) {
			$useMinMax = false;
			if (isset($datetime['min'])) {
				$this->addUsingAlias(ActionlogPeer::DATETIME, $datetime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($datetime['max'])) {
				$this->addUsingAlias(ActionlogPeer::DATETIME, $datetime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::DATETIME, $datetime, $comparison);
	}

	/**
	 * Filter the query on the action column
	 * 
	 * @param     string $action The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByAction($action = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($action)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $action)) {
				$action = str_replace('*', '%', $action);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query on the object column
	 * 
	 * @param     string $object The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByObject($object = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($object)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $object)) {
				$object = str_replace('*', '%', $object);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::OBJECT, $object, $comparison);
	}

	/**
	 * Filter the query on the forward column
	 * 
	 * @param     string $forward The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByForward($forward = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($forward)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $forward)) {
				$forward = str_replace('*', '%', $forward);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionlogPeer::FORWARD, $forward, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ActionlogPeer::USERID, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related SecurityAction object
	 *
	 * @param     SecurityAction $securityAction  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function filterBySecurityAction($securityAction, $comparison = null)
	{
		return $this
			->addUsingAlias(ActionlogPeer::ACTION, $securityAction->getAction(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SecurityAction relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function joinSecurityAction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SecurityAction');
		
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
			$this->addJoinObject($join, 'SecurityAction');
		}
		
		return $this;
	}

	/**
	 * Use the SecurityAction relation SecurityAction object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SecurityActionQuery A secondary query class using the current class as primary query
	 */
	public function useSecurityActionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSecurityAction($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SecurityAction', 'SecurityActionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Actionlog $actionlog Object to remove from the list of results
	 *
	 * @return    ActionlogQuery The current query, for fluid interface
	 */
	public function prune($actionlog = null)
	{
		if ($actionlog) {
			$this->addUsingAlias(ActionlogPeer::ID, $actionlog->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseActionlogQuery
