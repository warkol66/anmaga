<?php


/**
 * Base class that represents a query for the 'catalog_productCategory' table.
 *
 * Relacion Categorias y Productos
 *
 * @method     ProductCategoryQuery orderByProductcode($order = Criteria::ASC) Order by the productCode column
 * @method     ProductCategoryQuery orderByCategoryid($order = Criteria::ASC) Order by the categoryId column
 *
 * @method     ProductCategoryQuery groupByProductcode() Group by the productCode column
 * @method     ProductCategoryQuery groupByCategoryid() Group by the categoryId column
 *
 * @method     ProductCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductCategoryQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ProductCategoryQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ProductCategoryQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     ProductCategoryQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ProductCategoryQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ProductCategoryQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ProductCategory findOne(PropelPDO $con = null) Return the first ProductCategory matching the query
 * @method     ProductCategory findOneOrCreate(PropelPDO $con = null) Return the first ProductCategory matching the query, or a new ProductCategory object populated from the query conditions when no match is found
 *
 * @method     ProductCategory findOneByProductcode(string $productCode) Return the first ProductCategory filtered by the productCode column
 * @method     ProductCategory findOneByCategoryid(int $categoryId) Return the first ProductCategory filtered by the categoryId column
 *
 * @method     array findByProductcode(string $productCode) Return ProductCategory objects filtered by the productCode column
 * @method     array findByCategoryid(int $categoryId) Return ProductCategory objects filtered by the categoryId column
 *
 * @package    propel.generator.catalog.classes.om
 */
abstract class BaseProductCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseProductCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ProductCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProductCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProductCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProductCategoryQuery) {
			return $criteria;
		}
		$query = new ProductCategoryQuery();
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
	 * @param     array[$productCode, $categoryId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ProductCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ProductCategoryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ProductCategoryPeer::PRODUCTCODE, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ProductCategoryPeer::CATEGORYID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ProductCategoryPeer::PRODUCTCODE, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ProductCategoryPeer::CATEGORYID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProductCategoryPeer::PRODUCTCODE, $productcode, $comparison);
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByCategoryid($categoryid = null, $comparison = null)
	{
		if (is_array($categoryid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductCategoryPeer::CATEGORYID, $categoryid, $comparison);
	}

	/**
	 * Filter the query by a related Category object
	 *
	 * @param     Category|PropelCollection $category The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByCategory($category, $comparison = null)
	{
		if ($category instanceof Category) {
			return $this
				->addUsingAlias(ProductCategoryPeer::CATEGORYID, $category->getId(), $comparison);
		} elseif ($category instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProductCategoryPeer::CATEGORYID, $category->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
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
	 * Filter the query by a related Product object
	 *
	 * @param     Product|PropelCollection $product The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		if ($product instanceof Product) {
			return $this
				->addUsingAlias(ProductCategoryPeer::PRODUCTCODE, $product->getCode(), $comparison);
		} elseif ($product instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProductCategoryPeer::PRODUCTCODE, $product->toKeyValue('PrimaryKey', 'Code'), $comparison);
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ProductCategory $productCategory Object to remove from the list of results
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function prune($productCategory = null)
	{
		if ($productCategory) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ProductCategoryPeer::PRODUCTCODE), $productCategory->getProductcode(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ProductCategoryPeer::CATEGORYID), $productCategory->getCategoryid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseProductCategoryQuery
