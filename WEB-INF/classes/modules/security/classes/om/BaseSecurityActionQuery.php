<?php


/**
 * Base class that represents a query for the 'security_action' table.
 *
 * Actions del sistema
 *
 * @method     SecurityActionQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     SecurityActionQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     SecurityActionQuery orderBySection($order = Criteria::ASC) Order by the section column
 * @method     SecurityActionQuery orderByAccess($order = Criteria::ASC) Order by the access column
 * @method     SecurityActionQuery orderByAccessaffiliateuser($order = Criteria::ASC) Order by the accessAffiliateUser column
 * @method     SecurityActionQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SecurityActionQuery orderByPair($order = Criteria::ASC) Order by the pair column
 *
 * @method     SecurityActionQuery groupByAction() Group by the action column
 * @method     SecurityActionQuery groupByModule() Group by the module column
 * @method     SecurityActionQuery groupBySection() Group by the section column
 * @method     SecurityActionQuery groupByAccess() Group by the access column
 * @method     SecurityActionQuery groupByAccessaffiliateuser() Group by the accessAffiliateUser column
 * @method     SecurityActionQuery groupByActive() Group by the active column
 * @method     SecurityActionQuery groupByPair() Group by the pair column
 *
 * @method     SecurityActionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SecurityActionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SecurityActionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SecurityActionQuery leftJoinSecurityActionLabel($relationAlias = null) Adds a LEFT JOIN clause to the query using the SecurityActionLabel relation
 * @method     SecurityActionQuery rightJoinSecurityActionLabel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SecurityActionLabel relation
 * @method     SecurityActionQuery innerJoinSecurityActionLabel($relationAlias = null) Adds a INNER JOIN clause to the query using the SecurityActionLabel relation
 *
 * @method     SecurityActionQuery leftJoinActionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionLog relation
 * @method     SecurityActionQuery rightJoinActionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionLog relation
 * @method     SecurityActionQuery innerJoinActionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionLog relation
 *
 * @method     SecurityAction findOne(PropelPDO $con = null) Return the first SecurityAction matching the query
 * @method     SecurityAction findOneOrCreate(PropelPDO $con = null) Return the first SecurityAction matching the query, or a new SecurityAction object populated from the query conditions when no match is found
 *
 * @method     SecurityAction findOneByAction(string $action) Return the first SecurityAction filtered by the action column
 * @method     SecurityAction findOneByModule(string $module) Return the first SecurityAction filtered by the module column
 * @method     SecurityAction findOneBySection(string $section) Return the first SecurityAction filtered by the section column
 * @method     SecurityAction findOneByAccess(int $access) Return the first SecurityAction filtered by the access column
 * @method     SecurityAction findOneByAccessaffiliateuser(int $accessAffiliateUser) Return the first SecurityAction filtered by the accessAffiliateUser column
 * @method     SecurityAction findOneByActive(int $active) Return the first SecurityAction filtered by the active column
 * @method     SecurityAction findOneByPair(string $pair) Return the first SecurityAction filtered by the pair column
 *
 * @method     array findByAction(string $action) Return SecurityAction objects filtered by the action column
 * @method     array findByModule(string $module) Return SecurityAction objects filtered by the module column
 * @method     array findBySection(string $section) Return SecurityAction objects filtered by the section column
 * @method     array findByAccess(int $access) Return SecurityAction objects filtered by the access column
 * @method     array findByAccessaffiliateuser(int $accessAffiliateUser) Return SecurityAction objects filtered by the accessAffiliateUser column
 * @method     array findByActive(int $active) Return SecurityAction objects filtered by the active column
 * @method     array findByPair(string $pair) Return SecurityAction objects filtered by the pair column
 *
 * @package    propel.generator.security.classes.om
 */
abstract class BaseSecurityActionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSecurityActionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'SecurityAction', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SecurityActionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SecurityActionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SecurityActionQuery) {
			return $criteria;
		}
		$query = new SecurityActionQuery();
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
	 * @return    SecurityAction|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SecurityActionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SecurityActionPeer::ACTION, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SecurityActionPeer::ACTION, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the action column
	 * 
	 * @param     string $action The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SecurityActionPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query on the module column
	 * 
	 * @param     string $module The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByModule($module = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($module)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $module)) {
				$module = str_replace('*', '%', $module);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::MODULE, $module, $comparison);
	}

	/**
	 * Filter the query on the section column
	 * 
	 * @param     string $section The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterBySection($section = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($section)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $section)) {
				$section = str_replace('*', '%', $section);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::SECTION, $section, $comparison);
	}

	/**
	 * Filter the query on the access column
	 * 
	 * @param     int|array $access The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByAccess($access = null, $comparison = null)
	{
		if (is_array($access)) {
			$useMinMax = false;
			if (isset($access['min'])) {
				$this->addUsingAlias(SecurityActionPeer::ACCESS, $access['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($access['max'])) {
				$this->addUsingAlias(SecurityActionPeer::ACCESS, $access['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::ACCESS, $access, $comparison);
	}

	/**
	 * Filter the query on the accessAffiliateUser column
	 * 
	 * @param     int|array $accessaffiliateuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByAccessaffiliateuser($accessaffiliateuser = null, $comparison = null)
	{
		if (is_array($accessaffiliateuser)) {
			$useMinMax = false;
			if (isset($accessaffiliateuser['min'])) {
				$this->addUsingAlias(SecurityActionPeer::ACCESSAFFILIATEUSER, $accessaffiliateuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($accessaffiliateuser['max'])) {
				$this->addUsingAlias(SecurityActionPeer::ACCESSAFFILIATEUSER, $accessaffiliateuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::ACCESSAFFILIATEUSER, $accessaffiliateuser, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     int|array $active The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_array($active)) {
			$useMinMax = false;
			if (isset($active['min'])) {
				$this->addUsingAlias(SecurityActionPeer::ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($active['max'])) {
				$this->addUsingAlias(SecurityActionPeer::ACTIVE, $active['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the pair column
	 * 
	 * @param     string $pair The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByPair($pair = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($pair)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $pair)) {
				$pair = str_replace('*', '%', $pair);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SecurityActionPeer::PAIR, $pair, $comparison);
	}

	/**
	 * Filter the query by a related SecurityActionLabel object
	 *
	 * @param     SecurityActionLabel $securityActionLabel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterBySecurityActionLabel($securityActionLabel, $comparison = null)
	{
		return $this
			->addUsingAlias(SecurityActionPeer::ACTION, $securityActionLabel->getAction(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SecurityActionLabel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function joinSecurityActionLabel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SecurityActionLabel');
		
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
			$this->addJoinObject($join, 'SecurityActionLabel');
		}
		
		return $this;
	}

	/**
	 * Use the SecurityActionLabel relation SecurityActionLabel object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SecurityActionLabelQuery A secondary query class using the current class as primary query
	 */
	public function useSecurityActionLabelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSecurityActionLabel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SecurityActionLabel', 'SecurityActionLabelQuery');
	}

	/**
	 * Filter the query by a related ActionLog object
	 *
	 * @param     ActionLog $actionLog  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function filterByActionLog($actionLog, $comparison = null)
	{
		return $this
			->addUsingAlias(SecurityActionPeer::ACTION, $actionLog->getAction(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ActionLog relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function joinActionLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ActionLog');
		
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
			$this->addJoinObject($join, 'ActionLog');
		}
		
		return $this;
	}

	/**
	 * Use the ActionLog relation ActionLog object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActionLogQuery A secondary query class using the current class as primary query
	 */
	public function useActionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinActionLog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ActionLog', 'ActionLogQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SecurityAction $securityAction Object to remove from the list of results
	 *
	 * @return    SecurityActionQuery The current query, for fluid interface
	 */
	public function prune($securityAction = null)
	{
		if ($securityAction) {
			$this->addUsingAlias(SecurityActionPeer::ACTION, $securityAction->getAction(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSecurityActionQuery
