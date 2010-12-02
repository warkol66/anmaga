<?php


/**
 * Base class that represents a query for the 'import_productSupplier' table.
 *
 * Relacion Productos Proveedores
 *
 * @method     ProductSupplierQuery orderByProductid($order = Criteria::ASC) Order by the productId column
 * @method     ProductSupplierQuery orderBySupplierid($order = Criteria::ASC) Order by the supplierId column
 * @method     ProductSupplierQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method     ProductSupplierQuery groupByProductid() Group by the productId column
 * @method     ProductSupplierQuery groupBySupplierid() Group by the supplierId column
 * @method     ProductSupplierQuery groupByCode() Group by the code column
 *
 * @method     ProductSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductSupplierQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ProductSupplierQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ProductSupplierQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ProductSupplierQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ProductSupplierQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ProductSupplierQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ProductSupplier findOne(PropelPDO $con = null) Return the first ProductSupplier matching the query
 * @method     ProductSupplier findOneOrCreate(PropelPDO $con = null) Return the first ProductSupplier matching the query, or a new ProductSupplier object populated from the query conditions when no match is found
 *
 * @method     ProductSupplier findOneByProductid(int $productId) Return the first ProductSupplier filtered by the productId column
 * @method     ProductSupplier findOneBySupplierid(string $supplierId) Return the first ProductSupplier filtered by the supplierId column
 * @method     ProductSupplier findOneByCode(string $code) Return the first ProductSupplier filtered by the code column
 *
 * @method     array findByProductid(int $productId) Return ProductSupplier objects filtered by the productId column
 * @method     array findBySupplierid(string $supplierId) Return ProductSupplier objects filtered by the supplierId column
 * @method     array findByCode(string $code) Return ProductSupplier objects filtered by the code column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseProductSupplierQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseProductSupplierQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ProductSupplier', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProductSupplierQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProductSupplierQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProductSupplierQuery) {
			return $criteria;
		}
		$query = new ProductSupplierQuery();
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
	 * @return    ProductSupplier|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ProductSupplierPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProductSupplierPeer::PRODUCTID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProductSupplierPeer::PRODUCTID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the productId column
	 * 
	 * @param     int|array $productid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterByProductid($productid = null, $comparison = null)
	{
		if (is_array($productid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductSupplierPeer::PRODUCTID, $productid, $comparison);
	}

	/**
	 * Filter the query on the supplierId column
	 * 
	 * @param     string $supplierid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterBySupplierid($supplierid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($supplierid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $supplierid)) {
				$supplierid = str_replace('*', '%', $supplierid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductSupplierPeer::SUPPLIERID, $supplierid, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductSupplierPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductSupplierPeer::PRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
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
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductSupplierPeer::SUPPLIERID, $supplier->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function joinSupplier($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Supplier');
		
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
			$this->addJoinObject($join, 'Supplier');
		}
		
		return $this;
	}

	/**
	 * Use the Supplier relation Supplier object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplier($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Supplier', 'SupplierQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ProductSupplier $productSupplier Object to remove from the list of results
	 *
	 * @return    ProductSupplierQuery The current query, for fluid interface
	 */
	public function prune($productSupplier = null)
	{
		if ($productSupplier) {
			$this->addUsingAlias(ProductSupplierPeer::PRODUCTID, $productSupplier->getProductid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseProductSupplierQuery
