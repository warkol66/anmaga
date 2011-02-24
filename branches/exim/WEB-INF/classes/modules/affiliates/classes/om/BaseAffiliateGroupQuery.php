<?php


/**
 * Base class that represents a query for the 'affiliates_group' table.
 *
 * Groups
 *
 * @method     AffiliateGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AffiliateGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AffiliateGroupQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     AffiliateGroupQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     AffiliateGroupQuery orderByBitlevel($order = Criteria::ASC) Order by the bitLevel column
 *
 * @method     AffiliateGroupQuery groupById() Group by the id column
 * @method     AffiliateGroupQuery groupByName() Group by the name column
 * @method     AffiliateGroupQuery groupByCreated() Group by the created column
 * @method     AffiliateGroupQuery groupByUpdated() Group by the updated column
 * @method     AffiliateGroupQuery groupByBitlevel() Group by the bitLevel column
 *
 * @method     AffiliateGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateGroupQuery leftJoinAffiliateUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUserGroup relation
 * @method     AffiliateGroupQuery rightJoinAffiliateUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUserGroup relation
 * @method     AffiliateGroupQuery innerJoinAffiliateUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUserGroup relation
 *
 * @method     AffiliateGroupQuery leftJoinAffiliateGroupCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateGroupCategory relation
 * @method     AffiliateGroupQuery rightJoinAffiliateGroupCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateGroupCategory relation
 * @method     AffiliateGroupQuery innerJoinAffiliateGroupCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateGroupCategory relation
 *
 * @method     AffiliateGroup findOne(PropelPDO $con = null) Return the first AffiliateGroup matching the query
 * @method     AffiliateGroup findOneOrCreate(PropelPDO $con = null) Return the first AffiliateGroup matching the query, or a new AffiliateGroup object populated from the query conditions when no match is found
 *
 * @method     AffiliateGroup findOneById(int $id) Return the first AffiliateGroup filtered by the id column
 * @method     AffiliateGroup findOneByName(string $name) Return the first AffiliateGroup filtered by the name column
 * @method     AffiliateGroup findOneByCreated(string $created) Return the first AffiliateGroup filtered by the created column
 * @method     AffiliateGroup findOneByUpdated(string $updated) Return the first AffiliateGroup filtered by the updated column
 * @method     AffiliateGroup findOneByBitlevel(int $bitLevel) Return the first AffiliateGroup filtered by the bitLevel column
 *
 * @method     array findById(int $id) Return AffiliateGroup objects filtered by the id column
 * @method     array findByName(string $name) Return AffiliateGroup objects filtered by the name column
 * @method     array findByCreated(string $created) Return AffiliateGroup objects filtered by the created column
 * @method     array findByUpdated(string $updated) Return AffiliateGroup objects filtered by the updated column
 * @method     array findByBitlevel(int $bitLevel) Return AffiliateGroup objects filtered by the bitLevel column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAffiliateGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AffiliateGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateGroupQuery) {
			return $criteria;
		}
		$query = new AffiliateGroupQuery();
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
	 * @return    AffiliateGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliateGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliateGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateGroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(AffiliateGroupPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(AffiliateGroupPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateGroupPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 * 
	 * @param     string|array $updated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(AffiliateGroupPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(AffiliateGroupPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateGroupPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the bitLevel column
	 * 
	 * @param     int|array $bitlevel The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByBitlevel($bitlevel = null, $comparison = null)
	{
		if (is_array($bitlevel)) {
			$useMinMax = false;
			if (isset($bitlevel['min'])) {
				$this->addUsingAlias(AffiliateGroupPeer::BITLEVEL, $bitlevel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bitlevel['max'])) {
				$this->addUsingAlias(AffiliateGroupPeer::BITLEVEL, $bitlevel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateGroupPeer::BITLEVEL, $bitlevel, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateUserGroup object
	 *
	 * @param     AffiliateUserGroup $affiliateUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUserGroup($affiliateUserGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliateGroupPeer::ID, $affiliateUserGroup->getGroupid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function joinAffiliateUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUserGroup');
		
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
			$this->addJoinObject($join, 'AffiliateUserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUserGroup relation AffiliateUserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUserGroup', 'AffiliateUserGroupQuery');
	}

	/**
	 * Filter the query by a related AffiliateGroupCategory object
	 *
	 * @param     AffiliateGroupCategory $affiliateGroupCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function filterByAffiliateGroupCategory($affiliateGroupCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliateGroupPeer::ID, $affiliateGroupCategory->getGroupid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateGroupCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function joinAffiliateGroupCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateGroupCategory');
		
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
			$this->addJoinObject($join, 'AffiliateGroupCategory');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateGroupCategory relation AffiliateGroupCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateGroupCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateGroupCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateGroupCategory', 'AffiliateGroupCategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AffiliateGroup $affiliateGroup Object to remove from the list of results
	 *
	 * @return    AffiliateGroupQuery The current query, for fluid interface
	 */
	public function prune($affiliateGroup = null)
	{
		if ($affiliateGroup) {
			$this->addUsingAlias(AffiliateGroupPeer::ID, $affiliateGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAffiliateGroupQuery