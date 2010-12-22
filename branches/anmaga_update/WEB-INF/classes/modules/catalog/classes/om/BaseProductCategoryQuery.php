<?php


/**
 * Base class that represents a query for the 'productCategory' table.
 *
 * Categorias de Productos
 *
 * @method     ProductCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProductCategoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ProductCategoryQuery groupById() Group by the id column
 * @method     ProductCategoryQuery groupByDescription() Group by the description column
 *
 * @method     ProductCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductCategory findOne(PropelPDO $con = null) Return the first ProductCategory matching the query
 * @method     ProductCategory findOneOrCreate(PropelPDO $con = null) Return the first ProductCategory matching the query, or a new ProductCategory object populated from the query conditions when no match is found
 *
 * @method     ProductCategory findOneById(int $id) Return the first ProductCategory filtered by the id column
 * @method     ProductCategory findOneByDescription(string $description) Return the first ProductCategory filtered by the description column
 *
 * @method     array findById(int $id) Return ProductCategory objects filtered by the id column
 * @method     array findByDescription(string $description) Return ProductCategory objects filtered by the description column
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
	public function __construct($dbName = 'anmaga', $modelName = 'ProductCategory', $modelAlias = null)
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
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ProductCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ProductCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProductCategoryPeer::ID, $key, Criteria::EQUAL);
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
		return $this->addUsingAlias(ProductCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductCategoryQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductCategoryPeer::DESCRIPTION, $description, $comparison);
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
			$this->addUsingAlias(ProductCategoryPeer::ID, $productCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseProductCategoryQuery
