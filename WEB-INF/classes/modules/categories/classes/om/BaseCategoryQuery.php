<?php


/**
 * Base class that represents a query for the 'categories_category' table.
 *
 * Categorias
 *
 * @method     CategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CategoryQuery orderByParentid($order = Criteria::ASC) Order by the parentId column
 * @method     CategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     CategoryQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     CategoryQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     CategoryQuery orderByIspublic($order = Criteria::ASC) Order by the isPublic column
 *
 * @method     CategoryQuery groupById() Group by the id column
 * @method     CategoryQuery groupByParentid() Group by the parentId column
 * @method     CategoryQuery groupByName() Group by the name column
 * @method     CategoryQuery groupByModule() Group by the module column
 * @method     CategoryQuery groupByActive() Group by the active column
 * @method     CategoryQuery groupByIspublic() Group by the isPublic column
 *
 * @method     CategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoryQuery leftJoinGroupCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupCategory relation
 * @method     CategoryQuery rightJoinGroupCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupCategory relation
 * @method     CategoryQuery innerJoinGroupCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupCategory relation
 *
 * @method     CategoryQuery leftJoinAffiliateGroupCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateGroupCategory relation
 * @method     CategoryQuery rightJoinAffiliateGroupCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateGroupCategory relation
 * @method     CategoryQuery innerJoinAffiliateGroupCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateGroupCategory relation
 *
 * @method     Category findOne(PropelPDO $con = null) Return the first Category matching the query
 * @method     Category findOneOrCreate(PropelPDO $con = null) Return the first Category matching the query, or a new Category object populated from the query conditions when no match is found
 *
 * @method     Category findOneById(int $id) Return the first Category filtered by the id column
 * @method     Category findOneByParentid(int $parentId) Return the first Category filtered by the parentId column
 * @method     Category findOneByName(string $name) Return the first Category filtered by the name column
 * @method     Category findOneByModule(string $module) Return the first Category filtered by the module column
 * @method     Category findOneByActive(boolean $active) Return the first Category filtered by the active column
 * @method     Category findOneByIspublic(boolean $isPublic) Return the first Category filtered by the isPublic column
 *
 * @method     array findById(int $id) Return Category objects filtered by the id column
 * @method     array findByParentid(int $parentId) Return Category objects filtered by the parentId column
 * @method     array findByName(string $name) Return Category objects filtered by the name column
 * @method     array findByModule(string $module) Return Category objects filtered by the module column
 * @method     array findByActive(boolean $active) Return Category objects filtered by the active column
 * @method     array findByIspublic(boolean $isPublic) Return Category objects filtered by the isPublic column
 *
 * @package    propel.generator.categories.classes.om
 */
abstract class BaseCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Category', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CategoryQuery) {
			return $criteria;
		}
		$query = new CategoryQuery();
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
	 * @return    Category|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the parentId column
	 * 
	 * @param     int|array $parentid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByParentid($parentid = null, $comparison = null)
	{
		if (is_array($parentid)) {
			$useMinMax = false;
			if (isset($parentid['min'])) {
				$this->addUsingAlias(CategoryPeer::PARENTID, $parentid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($parentid['max'])) {
				$this->addUsingAlias(CategoryPeer::PARENTID, $parentid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CategoryPeer::PARENTID, $parentid, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CategoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the module column
	 * 
	 * @param     string $module The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CategoryPeer::MODULE, $module, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(CategoryPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the isPublic column
	 * 
	 * @param     boolean|string $ispublic The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByIspublic($ispublic = null, $comparison = null)
	{
		if (is_string($ispublic)) {
			$isPublic = in_array(strtolower($ispublic), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(CategoryPeer::ISPUBLIC, $ispublic, $comparison);
	}

	/**
	 * Filter the query by a related GroupCategory object
	 *
	 * @param     GroupCategory $groupCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByGroupCategory($groupCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(CategoryPeer::ID, $groupCategory->getCategoryid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the GroupCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function joinGroupCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GroupCategory');
		
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
			$this->addJoinObject($join, 'GroupCategory');
		}
		
		return $this;
	}

	/**
	 * Use the GroupCategory relation GroupCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useGroupCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGroupCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GroupCategory', 'GroupCategoryQuery');
	}

	/**
	 * Filter the query by a related AffiliateGroupCategory object
	 *
	 * @param     AffiliateGroupCategory $affiliateGroupCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function filterByAffiliateGroupCategory($affiliateGroupCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(CategoryPeer::ID, $affiliateGroupCategory->getCategoryid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateGroupCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoryQuery The current query, for fluid interface
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
	 * @param     Category $category Object to remove from the list of results
	 *
	 * @return    CategoryQuery The current query, for fluid interface
	 */
	public function prune($category = null)
	{
		if ($category) {
			$this->addUsingAlias(CategoryPeer::ID, $category->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCategoryQuery
