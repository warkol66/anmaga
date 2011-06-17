<?php


/**
 * Base class that represents a query for the 'catalog_product' table.
 *
 * Producto
 *
 * @method     ProductQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProductQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ProductQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ProductQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ProductQuery orderByUnitid($order = Criteria::ASC) Order by the unitId column
 * @method     ProductQuery orderByMeasureunitid($order = Criteria::ASC) Order by the measureUnitId column
 * @method     ProductQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ProductQuery orderByOrdercode($order = Criteria::ASC) Order by the orderCode column
 * @method     ProductQuery orderBySalesunit($order = Criteria::ASC) Order by the salesUnit column
 * @method     ProductQuery orderByStockalert($order = Criteria::ASC) Order by the stockAlert column
 * @method     ProductQuery orderByStock01($order = Criteria::ASC) Order by the stock01 column
 * @method     ProductQuery orderByStock02($order = Criteria::ASC) Order by the stock02 column
 * @method     ProductQuery orderByStock03($order = Criteria::ASC) Order by the stock03 column
 *
 * @method     ProductQuery groupById() Group by the id column
 * @method     ProductQuery groupByCode() Group by the code column
 * @method     ProductQuery groupByName() Group by the name column
 * @method     ProductQuery groupByDescription() Group by the description column
 * @method     ProductQuery groupByPrice() Group by the price column
 * @method     ProductQuery groupByUnitid() Group by the unitId column
 * @method     ProductQuery groupByMeasureunitid() Group by the measureUnitId column
 * @method     ProductQuery groupByActive() Group by the active column
 * @method     ProductQuery groupByOrdercode() Group by the orderCode column
 * @method     ProductQuery groupBySalesunit() Group by the salesUnit column
 * @method     ProductQuery groupByStockalert() Group by the stockAlert column
 * @method     ProductQuery groupByStock01() Group by the stock01 column
 * @method     ProductQuery groupByStock02() Group by the stock02 column
 * @method     ProductQuery groupByStock03() Group by the stock03 column
 *
 * @method     ProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductQuery leftJoinUnit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Unit relation
 * @method     ProductQuery rightJoinUnit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Unit relation
 * @method     ProductQuery innerJoinUnit($relationAlias = null) Adds a INNER JOIN clause to the query using the Unit relation
 *
 * @method     ProductQuery leftJoinMeasureUnit($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureUnit relation
 * @method     ProductQuery rightJoinMeasureUnit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureUnit relation
 * @method     ProductQuery innerJoinMeasureUnit($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureUnit relation
 *
 * @method     ProductQuery leftJoinAffiliateProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateProduct relation
 * @method     ProductQuery rightJoinAffiliateProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateProduct relation
 * @method     ProductQuery innerJoinAffiliateProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateProduct relation
 *
 * @method     ProductQuery leftJoinProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategory relation
 * @method     ProductQuery rightJoinProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategory relation
 * @method     ProductQuery innerJoinProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategory relation
 *
 * @method     ProductQuery leftJoinOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderItem relation
 * @method     ProductQuery rightJoinOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderItem relation
 * @method     ProductQuery innerJoinOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderItem relation
 *
 * @method     ProductQuery leftJoinOrderTemplateItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplateItem relation
 * @method     ProductQuery rightJoinOrderTemplateItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplateItem relation
 * @method     ProductQuery innerJoinOrderTemplateItem($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplateItem relation
 *
 * @method     Product findOne(PropelPDO $con = null) Return the first Product matching the query
 * @method     Product findOneOrCreate(PropelPDO $con = null) Return the first Product matching the query, or a new Product object populated from the query conditions when no match is found
 *
 * @method     Product findOneById(int $id) Return the first Product filtered by the id column
 * @method     Product findOneByCode(string $code) Return the first Product filtered by the code column
 * @method     Product findOneByName(string $name) Return the first Product filtered by the name column
 * @method     Product findOneByDescription(string $description) Return the first Product filtered by the description column
 * @method     Product findOneByPrice(double $price) Return the first Product filtered by the price column
 * @method     Product findOneByUnitid(int $unitId) Return the first Product filtered by the unitId column
 * @method     Product findOneByMeasureunitid(int $measureUnitId) Return the first Product filtered by the measureUnitId column
 * @method     Product findOneByActive(boolean $active) Return the first Product filtered by the active column
 * @method     Product findOneByOrdercode(string $orderCode) Return the first Product filtered by the orderCode column
 * @method     Product findOneBySalesunit(int $salesUnit) Return the first Product filtered by the salesUnit column
 * @method     Product findOneByStockalert(int $stockAlert) Return the first Product filtered by the stockAlert column
 * @method     Product findOneByStock01(int $stock01) Return the first Product filtered by the stock01 column
 * @method     Product findOneByStock02(int $stock02) Return the first Product filtered by the stock02 column
 * @method     Product findOneByStock03(int $stock03) Return the first Product filtered by the stock03 column
 *
 * @method     array findById(int $id) Return Product objects filtered by the id column
 * @method     array findByCode(string $code) Return Product objects filtered by the code column
 * @method     array findByName(string $name) Return Product objects filtered by the name column
 * @method     array findByDescription(string $description) Return Product objects filtered by the description column
 * @method     array findByPrice(double $price) Return Product objects filtered by the price column
 * @method     array findByUnitid(int $unitId) Return Product objects filtered by the unitId column
 * @method     array findByMeasureunitid(int $measureUnitId) Return Product objects filtered by the measureUnitId column
 * @method     array findByActive(boolean $active) Return Product objects filtered by the active column
 * @method     array findByOrdercode(string $orderCode) Return Product objects filtered by the orderCode column
 * @method     array findBySalesunit(int $salesUnit) Return Product objects filtered by the salesUnit column
 * @method     array findByStockalert(int $stockAlert) Return Product objects filtered by the stockAlert column
 * @method     array findByStock01(int $stock01) Return Product objects filtered by the stock01 column
 * @method     array findByStock02(int $stock02) Return Product objects filtered by the stock02 column
 * @method     array findByStock03(int $stock03) Return Product objects filtered by the stock03 column
 *
 * @package    propel.generator.catalog.classes.om
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
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
	 * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $code The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Filter the query on the description column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $description The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Filter the query on the price column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPrice(1234); // WHERE price = 1234
	 * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
	 * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
	 * </code>
	 *
	 * @param     mixed $price The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(ProductPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(ProductPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the unitId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUnitid(1234); // WHERE unitId = 1234
	 * $query->filterByUnitid(array(12, 34)); // WHERE unitId IN (12, 34)
	 * $query->filterByUnitid(array('min' => 12)); // WHERE unitId > 12
	 * </code>
	 *
	 * @see       filterByUnit()
	 *
	 * @param     mixed $unitid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByUnitid($unitid = null, $comparison = null)
	{
		if (is_array($unitid)) {
			$useMinMax = false;
			if (isset($unitid['min'])) {
				$this->addUsingAlias(ProductPeer::UNITID, $unitid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitid['max'])) {
				$this->addUsingAlias(ProductPeer::UNITID, $unitid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::UNITID, $unitid, $comparison);
	}

	/**
	 * Filter the query on the measureUnitId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByMeasureunitid(1234); // WHERE measureUnitId = 1234
	 * $query->filterByMeasureunitid(array(12, 34)); // WHERE measureUnitId IN (12, 34)
	 * $query->filterByMeasureunitid(array('min' => 12)); // WHERE measureUnitId > 12
	 * </code>
	 *
	 * @see       filterByMeasureUnit()
	 *
	 * @param     mixed $measureunitid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByMeasureunitid($measureunitid = null, $comparison = null)
	{
		if (is_array($measureunitid)) {
			$useMinMax = false;
			if (isset($measureunitid['min'])) {
				$this->addUsingAlias(ProductPeer::MEASUREUNITID, $measureunitid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($measureunitid['max'])) {
				$this->addUsingAlias(ProductPeer::MEASUREUNITID, $measureunitid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::MEASUREUNITID, $measureunitid, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByActive(true); // WHERE active = true
	 * $query->filterByActive('yes'); // WHERE active = true
	 * </code>
	 *
	 * @param     boolean|string $active The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ProductPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the orderCode column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByOrdercode('fooValue');   // WHERE orderCode = 'fooValue'
	 * $query->filterByOrdercode('%fooValue%'); // WHERE orderCode LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ordercode The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByOrdercode($ordercode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ordercode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ordercode)) {
				$ordercode = str_replace('*', '%', $ordercode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductPeer::ORDERCODE, $ordercode, $comparison);
	}

	/**
	 * Filter the query on the salesUnit column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterBySalesunit(1234); // WHERE salesUnit = 1234
	 * $query->filterBySalesunit(array(12, 34)); // WHERE salesUnit IN (12, 34)
	 * $query->filterBySalesunit(array('min' => 12)); // WHERE salesUnit > 12
	 * </code>
	 *
	 * @param     mixed $salesunit The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterBySalesunit($salesunit = null, $comparison = null)
	{
		if (is_array($salesunit)) {
			$useMinMax = false;
			if (isset($salesunit['min'])) {
				$this->addUsingAlias(ProductPeer::SALESUNIT, $salesunit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($salesunit['max'])) {
				$this->addUsingAlias(ProductPeer::SALESUNIT, $salesunit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::SALESUNIT, $salesunit, $comparison);
	}

	/**
	 * Filter the query on the stockAlert column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStockalert(1234); // WHERE stockAlert = 1234
	 * $query->filterByStockalert(array(12, 34)); // WHERE stockAlert IN (12, 34)
	 * $query->filterByStockalert(array('min' => 12)); // WHERE stockAlert > 12
	 * </code>
	 *
	 * @param     mixed $stockalert The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByStockalert($stockalert = null, $comparison = null)
	{
		if (is_array($stockalert)) {
			$useMinMax = false;
			if (isset($stockalert['min'])) {
				$this->addUsingAlias(ProductPeer::STOCKALERT, $stockalert['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($stockalert['max'])) {
				$this->addUsingAlias(ProductPeer::STOCKALERT, $stockalert['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::STOCKALERT, $stockalert, $comparison);
	}

	/**
	 * Filter the query on the stock01 column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStock01(1234); // WHERE stock01 = 1234
	 * $query->filterByStock01(array(12, 34)); // WHERE stock01 IN (12, 34)
	 * $query->filterByStock01(array('min' => 12)); // WHERE stock01 > 12
	 * </code>
	 *
	 * @param     mixed $stock01 The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByStock01($stock01 = null, $comparison = null)
	{
		if (is_array($stock01)) {
			$useMinMax = false;
			if (isset($stock01['min'])) {
				$this->addUsingAlias(ProductPeer::STOCK01, $stock01['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($stock01['max'])) {
				$this->addUsingAlias(ProductPeer::STOCK01, $stock01['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::STOCK01, $stock01, $comparison);
	}

	/**
	 * Filter the query on the stock02 column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStock02(1234); // WHERE stock02 = 1234
	 * $query->filterByStock02(array(12, 34)); // WHERE stock02 IN (12, 34)
	 * $query->filterByStock02(array('min' => 12)); // WHERE stock02 > 12
	 * </code>
	 *
	 * @param     mixed $stock02 The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByStock02($stock02 = null, $comparison = null)
	{
		if (is_array($stock02)) {
			$useMinMax = false;
			if (isset($stock02['min'])) {
				$this->addUsingAlias(ProductPeer::STOCK02, $stock02['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($stock02['max'])) {
				$this->addUsingAlias(ProductPeer::STOCK02, $stock02['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::STOCK02, $stock02, $comparison);
	}

	/**
	 * Filter the query on the stock03 column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStock03(1234); // WHERE stock03 = 1234
	 * $query->filterByStock03(array(12, 34)); // WHERE stock03 IN (12, 34)
	 * $query->filterByStock03(array('min' => 12)); // WHERE stock03 > 12
	 * </code>
	 *
	 * @param     mixed $stock03 The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByStock03($stock03 = null, $comparison = null)
	{
		if (is_array($stock03)) {
			$useMinMax = false;
			if (isset($stock03['min'])) {
				$this->addUsingAlias(ProductPeer::STOCK03, $stock03['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($stock03['max'])) {
				$this->addUsingAlias(ProductPeer::STOCK03, $stock03['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductPeer::STOCK03, $stock03, $comparison);
	}

	/**
	 * Filter the query by a related Unit object
	 *
	 * @param     Unit|PropelCollection $unit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByUnit($unit, $comparison = null)
	{
		if ($unit instanceof Unit) {
			return $this
				->addUsingAlias(ProductPeer::UNITID, $unit->getId(), $comparison);
		} elseif ($unit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProductPeer::UNITID, $unit->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUnit() only accepts arguments of type Unit or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Unit relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinUnit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Unit');
		
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
			$this->addJoinObject($join, 'Unit');
		}
		
		return $this;
	}

	/**
	 * Use the Unit relation Unit object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UnitQuery A secondary query class using the current class as primary query
	 */
	public function useUnitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUnit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Unit', 'UnitQuery');
	}

	/**
	 * Filter the query by a related MeasureUnit object
	 *
	 * @param     MeasureUnit|PropelCollection $measureUnit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByMeasureUnit($measureUnit, $comparison = null)
	{
		if ($measureUnit instanceof MeasureUnit) {
			return $this
				->addUsingAlias(ProductPeer::MEASUREUNITID, $measureUnit->getId(), $comparison);
		} elseif ($measureUnit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProductPeer::MEASUREUNITID, $measureUnit->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMeasureUnit() only accepts arguments of type MeasureUnit or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MeasureUnit relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinMeasureUnit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MeasureUnit');
		
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
			$this->addJoinObject($join, 'MeasureUnit');
		}
		
		return $this;
	}

	/**
	 * Use the MeasureUnit relation MeasureUnit object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MeasureUnitQuery A secondary query class using the current class as primary query
	 */
	public function useMeasureUnitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMeasureUnit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MeasureUnit', 'MeasureUnitQuery');
	}

	/**
	 * Filter the query by a related AffiliateProduct object
	 *
	 * @param     AffiliateProduct $affiliateProduct  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByAffiliateProduct($affiliateProduct, $comparison = null)
	{
		if ($affiliateProduct instanceof AffiliateProduct) {
			return $this
				->addUsingAlias(ProductPeer::ID, $affiliateProduct->getProductid(), $comparison);
		} elseif ($affiliateProduct instanceof PropelCollection) {
			return $this
				->useAffiliateProductQuery()
					->filterByPrimaryKeys($affiliateProduct->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAffiliateProduct() only accepts arguments of type AffiliateProduct or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateProduct relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinAffiliateProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateProduct');
		
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
			$this->addJoinObject($join, 'AffiliateProduct');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateProduct relation AffiliateProduct object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateProductQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateProduct', 'AffiliateProductQuery');
	}

	/**
	 * Filter the query by a related ProductCategory object
	 *
	 * @param     ProductCategory $productCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByProductCategory($productCategory, $comparison = null)
	{
		if ($productCategory instanceof ProductCategory) {
			return $this
				->addUsingAlias(ProductPeer::CODE, $productCategory->getProductcode(), $comparison);
		} elseif ($productCategory instanceof PropelCollection) {
			return $this
				->useProductCategoryQuery()
					->filterByPrimaryKeys($productCategory->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByProductCategory() only accepts arguments of type ProductCategory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ProductCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinProductCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductCategory');
		
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
			$this->addJoinObject($join, 'ProductCategory');
		}
		
		return $this;
	}

	/**
	 * Use the ProductCategory relation ProductCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProductCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductCategory', 'ProductCategoryQuery');
	}

	/**
	 * Filter the query by a related OrderItem object
	 *
	 * @param     OrderItem $orderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByOrderItem($orderItem, $comparison = null)
	{
		if ($orderItem instanceof OrderItem) {
			return $this
				->addUsingAlias(ProductPeer::CODE, $orderItem->getProductcode(), $comparison);
		} elseif ($orderItem instanceof PropelCollection) {
			return $this
				->useOrderItemQuery()
					->filterByPrimaryKeys($orderItem->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderItem() only accepts arguments of type OrderItem or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinOrderItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderItem');
		
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
			$this->addJoinObject($join, 'OrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the OrderItem relation OrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useOrderItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderItem', 'OrderItemQuery');
	}

	/**
	 * Filter the query by a related OrderTemplateItem object
	 *
	 * @param     OrderTemplateItem $orderTemplateItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplateItem($orderTemplateItem, $comparison = null)
	{
		if ($orderTemplateItem instanceof OrderTemplateItem) {
			return $this
				->addUsingAlias(ProductPeer::CODE, $orderTemplateItem->getProductcode(), $comparison);
		} elseif ($orderTemplateItem instanceof PropelCollection) {
			return $this
				->useOrderTemplateItemQuery()
					->filterByPrimaryKeys($orderTemplateItem->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderTemplateItem() only accepts arguments of type OrderTemplateItem or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplateItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function joinOrderTemplateItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useOrderTemplateItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrderTemplateItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderTemplateItem', 'OrderTemplateItemQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 * using the catalog_affiliateProduct table as cross reference
	 *
	 * @param     Affiliate $affiliate the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAffiliateProductQuery()
				->filterByAffiliate($affiliate, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Category object
	 * using the catalog_productCategory table as cross reference
	 *
	 * @param     Category $category the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductQuery The current query, for fluid interface
	 */
	public function filterByCategory($category, $comparison = Criteria::EQUAL)
	{
		return $this
			->useProductCategoryQuery()
				->filterByCategory($category, $comparison)
			->endUse();
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
