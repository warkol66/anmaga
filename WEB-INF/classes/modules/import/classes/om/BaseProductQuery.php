<?php


/**
 * Base class that represents a query for the 'import_product' table.
 *
 * Productos
 *
 * @method     ProductQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProductQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ProductQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ProductQuery orderByNamespanish($order = Criteria::ASC) Order by the nameSpanish column
 * @method     ProductQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ProductQuery orderByDescriptionspanish($order = Criteria::ASC) Order by the descriptionSpanish column
 * @method     ProductQuery orderByNamechinese($order = Criteria::ASC) Order by the nameChinese column
 * @method     ProductQuery orderByDescriptionchinese($order = Criteria::ASC) Order by the descriptionChinese column
 * @method     ProductQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ProductQuery groupById() Group by the id column
 * @method     ProductQuery groupByCode() Group by the code column
 * @method     ProductQuery groupByName() Group by the name column
 * @method     ProductQuery groupByNamespanish() Group by the nameSpanish column
 * @method     ProductQuery groupByDescription() Group by the description column
 * @method     ProductQuery groupByDescriptionspanish() Group by the descriptionSpanish column
 * @method     ProductQuery groupByNamechinese() Group by the nameChinese column
 * @method     ProductQuery groupByDescriptionchinese() Group by the descriptionChinese column
 * @method     ProductQuery groupByStatus() Group by the status column
 *
 * @method     ProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductQuery leftJoinProductSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductSupplier relation
 * @method     ProductQuery rightJoinProductSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductSupplier relation
 * @method     ProductQuery innerJoinProductSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductSupplier relation
 *
 * @method     ProductQuery leftJoinClientQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuoteItem relation
 * @method     ProductQuery rightJoinClientQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuoteItem relation
 * @method     ProductQuery innerJoinClientQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuoteItem relation
 *
 * @method     ProductQuery leftJoinSupplierQuoteItemRelatedByProductid($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItemRelatedByProductid relation
 * @method     ProductQuery rightJoinSupplierQuoteItemRelatedByProductid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItemRelatedByProductid relation
 * @method     ProductQuery innerJoinSupplierQuoteItemRelatedByProductid($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItemRelatedByProductid relation
 *
 * @method     ProductQuery leftJoinSupplierQuoteItemRelatedByReplacedproductid($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItemRelatedByReplacedproductid relation
 * @method     ProductQuery rightJoinSupplierQuoteItemRelatedByReplacedproductid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItemRelatedByReplacedproductid relation
 * @method     ProductQuery innerJoinSupplierQuoteItemRelatedByReplacedproductid($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItemRelatedByReplacedproductid relation
 *
 * @method     ProductQuery leftJoinClientPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrderItem relation
 * @method     ProductQuery rightJoinClientPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrderItem relation
 * @method     ProductQuery innerJoinClientPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrderItem relation
 *
 * @method     ProductQuery leftJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     ProductQuery rightJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     ProductQuery innerJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderItem relation
 *
 * @method     Product findOne(PropelPDO $con = null) Return the first Product matching the query
 * @method     Product findOneOrCreate(PropelPDO $con = null) Return the first Product matching the query, or a new Product object populated from the query conditions when no match is found
 *
 * @method     Product findOneById(int $id) Return the first Product filtered by the id column
 * @method     Product findOneByCode(string $code) Return the first Product filtered by the code column
 * @method     Product findOneByName(string $name) Return the first Product filtered by the name column
 * @method     Product findOneByNamespanish(string $nameSpanish) Return the first Product filtered by the nameSpanish column
 * @method     Product findOneByDescription(string $description) Return the first Product filtered by the description column
 * @method     Product findOneByDescriptionspanish(string $descriptionSpanish) Return the first Product filtered by the descriptionSpanish column
 * @method     Product findOneByNamechinese(string $nameChinese) Return the first Product filtered by the nameChinese column
 * @method     Product findOneByDescriptionchinese(string $descriptionChinese) Return the first Product filtered by the descriptionChinese column
 * @method     Product findOneByStatus(int $status) Return the first Product filtered by the status column
 *
 * @method     array findById(int $id) Return Product objects filtered by the id column
 * @method     array findByCode(string $code) Return Product objects filtered by the code column
 * @method     array findByName(string $name) Return Product objects filtered by the name column
 * @method     array findByNamespanish(string $nameSpanish) Return Product objects filtered by the nameSpanish column
 * @method     array findByDescription(string $description) Return Product objects filtered by the description column
 * @method     array findByDescriptionspanish(string $descriptionSpanish) Return Product objects filtered by the descriptionSpanish column
 * @method     array findByNamechinese(string $nameChinese) Return Product objects filtered by the nameChinese column
 * @method     array findByDescriptionchinese(string $descriptionChinese) Return Product objects filtered by the descriptionChinese column
 * @method     array findByStatus(int $status) Return Product objects filtered by the status column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseProductQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseProductQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Product', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProductQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProductQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProductQuery) {
			return $criteria;
		}
		$query = new ProductQuery();
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
	 * @return    Product|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ProductPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProductPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProductPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProductPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProductPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the nameSpanish column
	 * 
	 * @param     string $namespanish The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByNamespanish($namespanish = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($namespanish)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $namespanish)) {
				$namespanish = str_replace('*', '%', $namespanish);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductPeer::NAMESPANISH, $namespanish, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ProductPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the descriptionSpanish column
	 * 
	 * @param     string $descriptionspanish The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByDescriptionspanish($descriptionspanish = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descriptionspanish)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descriptionspanish)) {
				$descriptionspanish = str_replace('*', '%', $descriptionspanish);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductPeer::DESCRIPTIONSPANISH, $descriptionspanish, $comparison);
	}

	/**
	 * Filter the query on the nameChinese column
	 * 
	 * @param     string $namechinese The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByNamechinese($namechinese = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($namechinese)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $namechinese)) {
				$namechinese = str_replace('*', '%', $namechinese);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductPeer::NAMECHINESE, $namechinese, $comparison);
	}

	/**
	 * Filter the query on the descriptionChinese column
	 * 
	 * @param     string $descriptionchinese The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByDescriptionchinese($descriptionchinese = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descriptionchinese)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descriptionchinese)) {
				$descriptionchinese = str_replace('*', '%', $descriptionchinese);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductPeer::DESCRIPTIONCHINESE, $descriptionchinese, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ProductPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ProductPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query by a related ProductSupplier object
	 *
	 * @param     ProductSupplier $productSupplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByProductSupplier($productSupplier, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $productSupplier->getProductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ProductSupplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinProductSupplier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductSupplier');
		
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
			$this->addJoinObject($join, 'ProductSupplier');
		}
		
		return $this;
	}

	/**
	 * Use the ProductSupplier relation ProductSupplier object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductSupplierQuery A secondary query class using the current class as primary query
	 */
	public function useProductSupplierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProductSupplier($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductSupplier', 'ProductSupplierQuery');
	}

	/**
	 * Filter the query by a related ClientQuoteItem object
	 *
	 * @param     ClientQuoteItem $clientQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByClientQuoteItem($clientQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $clientQuoteItem->getProductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinClientQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientQuoteItem');
		
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
			$this->addJoinObject($join, 'ClientQuoteItem');
		}
		
		return $this;
	}

	/**
	 * Use the ClientQuoteItem relation ClientQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientQuoteItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientQuoteItem', 'ClientQuoteItemQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItem object
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItemRelatedByProductid($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $supplierQuoteItem->getProductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItemRelatedByProductid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItemRelatedByProductid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItemRelatedByProductid');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItemRelatedByProductid');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItemRelatedByProductid relation SupplierQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemRelatedByProductidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteItemRelatedByProductid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItemRelatedByProductid', 'SupplierQuoteItemQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItem object
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItemRelatedByReplacedproductid($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $supplierQuoteItem->getReplacedproductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItemRelatedByReplacedproductid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItemRelatedByReplacedproductid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItemRelatedByReplacedproductid');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItemRelatedByReplacedproductid');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItemRelatedByReplacedproductid relation SupplierQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemRelatedByReplacedproductidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplierQuoteItemRelatedByReplacedproductid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItemRelatedByReplacedproductid', 'SupplierQuoteItemQuery');
	}

	/**
	 * Filter the query by a related ClientPurchaseOrderItem object
	 *
	 * @param     ClientPurchaseOrderItem $clientPurchaseOrderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrderItem($clientPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $clientPurchaseOrderItem->getProductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientPurchaseOrderItem');
		
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
			$this->addJoinObject($join, 'ClientPurchaseOrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the ClientPurchaseOrderItem relation ClientPurchaseOrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useClientPurchaseOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientPurchaseOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientPurchaseOrderItem', 'ClientPurchaseOrderItemQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrderItem object
	 *
	 * @param     SupplierPurchaseOrderItem $supplierPurchaseOrderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderItem($supplierPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ProductPeer::ID, $supplierPurchaseOrderItem->getProductid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrderItem');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrderItem relation SupplierPurchaseOrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrderItem', 'SupplierPurchaseOrderItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Product $product Object to remove from the list of results
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function prune($product = null)
	{
		if ($product) {
			$this->addUsingAlias(ProductPeer::ID, $product->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseProductQuery
