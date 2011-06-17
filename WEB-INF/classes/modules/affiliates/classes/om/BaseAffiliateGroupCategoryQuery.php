<?php


/**
 * Base class that represents a query for the 'affiliates_groupCategory' table.
 *
 * Groups_Categories
 *
 * @method     AffiliateGroupCategoryQuery orderByGroupid($order = Criteria::ASC) Order by the groupId column
 * @method     AffiliateGroupCategoryQuery orderByCategoryid($order = Criteria::ASC) Order by the categoryId column
 *
 * @method     AffiliateGroupCategoryQuery groupByGroupid() Group by the groupId column
 * @method     AffiliateGroupCategoryQuery groupByCategoryid() Group by the categoryId column
 *
 * @method     AffiliateGroupCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateGroupCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateGroupCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateGroupCategoryQuery leftJoinAffiliateGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateGroup relation
 * @method     AffiliateGroupCategoryQuery rightJoinAffiliateGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateGroup relation
 * @method     AffiliateGroupCategoryQuery innerJoinAffiliateGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateGroup relation
 *
 * @method     AffiliateGroupCategoryQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     AffiliateGroupCategoryQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     AffiliateGroupCategoryQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     AffiliateGroupCategory findOne(PropelPDO $con = null) Return the first AffiliateGroupCategory matching the query
 * @method     AffiliateGroupCategory findOneOrCreate(PropelPDO $con = null) Return the first AffiliateGroupCategory matching the query, or a new AffiliateGroupCategory object populated from the query conditions when no match is found
 *
 * @method     AffiliateGroupCategory findOneByGroupid(int $groupId) Return the first AffiliateGroupCategory filtered by the groupId column
 * @method     AffiliateGroupCategory findOneByCategoryid(int $categoryId) Return the first AffiliateGroupCategory filtered by the categoryId column
 *
 * @method     array findByGroupid(int $groupId) Return AffiliateGroupCategory objects filtered by the groupId column
 * @method     array findByCategoryid(int $categoryId) Return AffiliateGroupCategory objects filtered by the categoryId column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateGroupCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAffiliateGroupCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AffiliateGroupCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateGroupCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateGroupCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateGroupCategoryQuery) {
			return $criteria;
		}
		$query = new AffiliateGroupCategoryQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$groupId, $categoryId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AffiliateGroupCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateGroupCategoryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AffiliateGroupCategoryPeer::GROUPID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AffiliateGroupCategoryPeer::CATEGORYID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AffiliateGroupCategoryPeer::GROUPID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AffiliateGroupCategoryPeer::CATEGORYID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the groupId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByGroupid(1234); // WHERE groupId = 1234
	 * $query->filterByGroupid(array(12, 34)); // WHERE groupId IN (12, 34)
	 * $query->filterByGroupid(array('min' => 12)); // WHERE groupId > 12
	 * </code>
	 *
	 * @see       filterByAffiliateGroup()
	 *
	 * @param     mixed $groupid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByGroupid($groupid = null, $comparison = null)
	{
		if (is_array($groupid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateGroupCategoryPeer::GROUPID, $groupid, $comparison);
	}

	/**
	 * Filter the query on the categoryId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCategoryid(1234); // WHERE categoryId = 1234
	 * $query->filterByCategoryid(array(12, 34)); // WHERE categoryId IN (12, 34)
	 * $query->filterByCategoryid(array('min' => 12)); // WHERE categoryId > 12
	 * </code>
	 *
	 * @see       filterByCategory()
	 *
	 * @param     mixed $categoryid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByCategoryid($categoryid = null, $comparison = null)
	{
		if (is_array($categoryid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateGroupCategoryPeer::CATEGORYID, $categoryid, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateGroup object
	 *
	 * @param     AffiliateGroup|PropelCollection $affiliateGroup The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByAffiliateGroup($affiliateGroup, $comparison = null)
	{
		if ($affiliateGroup instanceof AffiliateGroup) {
			return $this
				->addUsingAlias(AffiliateGroupCategoryPeer::GROUPID, $affiliateGroup->getId(), $comparison);
		} elseif ($affiliateGroup instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AffiliateGroupCategoryPeer::GROUPID, $affiliateGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliateGroup() only accepts arguments of type AffiliateGroup or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function joinAffiliateGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateGroup');
		
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
			$this->addJoinObject($join, 'AffiliateGroup');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateGroup relation AffiliateGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateGroup', 'AffiliateGroupQuery');
	}

	/**
	 * Filter the query by a related Category object
	 *
	 * @param     Category|PropelCollection $category The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function filterByCategory($category, $comparison = null)
	{
		if ($category instanceof Category) {
			return $this
				->addUsingAlias(AffiliateGroupCategoryPeer::CATEGORYID, $category->getId(), $comparison);
		} elseif ($category instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AffiliateGroupCategoryPeer::CATEGORYID, $category->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategory() only accepts arguments of type Category or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Category relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Category');
		
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
			$this->addJoinObject($join, 'Category');
		}
		
		return $this;
	}

	/**
	 * Use the Category relation Category object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoryQuery A secondary query class using the current class as primary query
	 */
	public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Category', 'CategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AffiliateGroupCategory $affiliateGroupCategory Object to remove from the list of results
	 *
	 * @return    AffiliateGroupCategoryQuery The current query, for fluid interface
	 */
	public function prune($affiliateGroupCategory = null)
	{
		if ($affiliateGroupCategory) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AffiliateGroupCategoryPeer::GROUPID), $affiliateGroupCategory->getGroupid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AffiliateGroupCategoryPeer::CATEGORYID), $affiliateGroupCategory->getCategoryid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseAffiliateGroupCategoryQuery
