<?php


/**
 * Base class that represents a query for the 'import_supplierQuoteItem' table.
 *
 * Elemento de Cotizacion de Proveedor
 *
 * @method     SupplierQuoteItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierQuoteItemQuery orderBySupplierquoteid($order = Criteria::ASC) Order by the supplierQuoteId column
 * @method     SupplierQuoteItemQuery orderByProductid($order = Criteria::ASC) Order by the productId column
 * @method     SupplierQuoteItemQuery orderByReplacedproductid($order = Criteria::ASC) Order by the replacedProductId column
 * @method     SupplierQuoteItemQuery orderByClientquoteitemid($order = Criteria::ASC) Order by the clientQuoteItemId column
 * @method     SupplierQuoteItemQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SupplierQuoteItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     SupplierQuoteItemQuery orderByPortid($order = Criteria::ASC) Order by the portId column
 * @method     SupplierQuoteItemQuery orderByIncotermid($order = Criteria::ASC) Order by the incotermId column
 * @method     SupplierQuoteItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SupplierQuoteItemQuery orderBySuppliercomments($order = Criteria::ASC) Order by the supplierComments column
 * @method     SupplierQuoteItemQuery orderByDelivery($order = Criteria::ASC) Order by the delivery column
 * @method     SupplierQuoteItemQuery orderByPackage($order = Criteria::ASC) Order by the package column
 * @method     SupplierQuoteItemQuery orderByUnitlength($order = Criteria::ASC) Order by the unitLength column
 * @method     SupplierQuoteItemQuery orderByUnitwidth($order = Criteria::ASC) Order by the unitWidth column
 * @method     SupplierQuoteItemQuery orderByUnitheight($order = Criteria::ASC) Order by the unitHeight column
 * @method     SupplierQuoteItemQuery orderByUnitgrossweigth($order = Criteria::ASC) Order by the unitGrossWeigth column
 * @method     SupplierQuoteItemQuery orderByUnitspercarton($order = Criteria::ASC) Order by the unitsPerCarton column
 * @method     SupplierQuoteItemQuery orderByCartons($order = Criteria::ASC) Order by the cartons column
 * @method     SupplierQuoteItemQuery orderByCartonlength($order = Criteria::ASC) Order by the cartonLength column
 * @method     SupplierQuoteItemQuery orderByCartonwidth($order = Criteria::ASC) Order by the cartonWidth column
 * @method     SupplierQuoteItemQuery orderByCartonheight($order = Criteria::ASC) Order by the cartonHeight column
 * @method     SupplierQuoteItemQuery orderByCartongrossweigth($order = Criteria::ASC) Order by the cartonGrossWeigth column
 *
 * @method     SupplierQuoteItemQuery groupById() Group by the id column
 * @method     SupplierQuoteItemQuery groupBySupplierquoteid() Group by the supplierQuoteId column
 * @method     SupplierQuoteItemQuery groupByProductid() Group by the productId column
 * @method     SupplierQuoteItemQuery groupByReplacedproductid() Group by the replacedProductId column
 * @method     SupplierQuoteItemQuery groupByClientquoteitemid() Group by the clientQuoteItemId column
 * @method     SupplierQuoteItemQuery groupByStatus() Group by the status column
 * @method     SupplierQuoteItemQuery groupByQuantity() Group by the quantity column
 * @method     SupplierQuoteItemQuery groupByPortid() Group by the portId column
 * @method     SupplierQuoteItemQuery groupByIncotermid() Group by the incotermId column
 * @method     SupplierQuoteItemQuery groupByPrice() Group by the price column
 * @method     SupplierQuoteItemQuery groupBySuppliercomments() Group by the supplierComments column
 * @method     SupplierQuoteItemQuery groupByDelivery() Group by the delivery column
 * @method     SupplierQuoteItemQuery groupByPackage() Group by the package column
 * @method     SupplierQuoteItemQuery groupByUnitlength() Group by the unitLength column
 * @method     SupplierQuoteItemQuery groupByUnitwidth() Group by the unitWidth column
 * @method     SupplierQuoteItemQuery groupByUnitheight() Group by the unitHeight column
 * @method     SupplierQuoteItemQuery groupByUnitgrossweigth() Group by the unitGrossWeigth column
 * @method     SupplierQuoteItemQuery groupByUnitspercarton() Group by the unitsPerCarton column
 * @method     SupplierQuoteItemQuery groupByCartons() Group by the cartons column
 * @method     SupplierQuoteItemQuery groupByCartonlength() Group by the cartonLength column
 * @method     SupplierQuoteItemQuery groupByCartonwidth() Group by the cartonWidth column
 * @method     SupplierQuoteItemQuery groupByCartonheight() Group by the cartonHeight column
 * @method     SupplierQuoteItemQuery groupByCartongrossweigth() Group by the cartonGrossWeigth column
 *
 * @method     SupplierQuoteItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierQuoteItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierQuoteItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierQuoteItemQuery leftJoinSupplierQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuoteItemQuery rightJoinSupplierQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuoteItemQuery innerJoinSupplierQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuote relation
 *
 * @method     SupplierQuoteItemQuery leftJoinClientQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuoteItem relation
 * @method     SupplierQuoteItemQuery rightJoinClientQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuoteItem relation
 * @method     SupplierQuoteItemQuery innerJoinClientQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuoteItem relation
 *
 * @method     SupplierQuoteItemQuery leftJoinProductRelatedByProductid($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductRelatedByProductid relation
 * @method     SupplierQuoteItemQuery rightJoinProductRelatedByProductid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductRelatedByProductid relation
 * @method     SupplierQuoteItemQuery innerJoinProductRelatedByProductid($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductRelatedByProductid relation
 *
 * @method     SupplierQuoteItemQuery leftJoinProductRelatedByReplacedproductid($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductRelatedByReplacedproductid relation
 * @method     SupplierQuoteItemQuery rightJoinProductRelatedByReplacedproductid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductRelatedByReplacedproductid relation
 * @method     SupplierQuoteItemQuery innerJoinProductRelatedByReplacedproductid($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductRelatedByReplacedproductid relation
 *
 * @method     SupplierQuoteItemQuery leftJoinIncoterm($relationAlias = null) Adds a LEFT JOIN clause to the query using the Incoterm relation
 * @method     SupplierQuoteItemQuery rightJoinIncoterm($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Incoterm relation
 * @method     SupplierQuoteItemQuery innerJoinIncoterm($relationAlias = null) Adds a INNER JOIN clause to the query using the Incoterm relation
 *
 * @method     SupplierQuoteItemQuery leftJoinPort($relationAlias = null) Adds a LEFT JOIN clause to the query using the Port relation
 * @method     SupplierQuoteItemQuery rightJoinPort($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Port relation
 * @method     SupplierQuoteItemQuery innerJoinPort($relationAlias = null) Adds a INNER JOIN clause to the query using the Port relation
 *
 * @method     SupplierQuoteItemQuery leftJoinSupplierQuoteItemComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     SupplierQuoteItemQuery rightJoinSupplierQuoteItemComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     SupplierQuoteItemQuery innerJoinSupplierQuoteItemComment($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItemComment relation
 *
 * @method     SupplierQuoteItem findOne(PropelPDO $con = null) Return the first SupplierQuoteItem matching the query
 * @method     SupplierQuoteItem findOneOrCreate(PropelPDO $con = null) Return the first SupplierQuoteItem matching the query, or a new SupplierQuoteItem object populated from the query conditions when no match is found
 *
 * @method     SupplierQuoteItem findOneById(int $id) Return the first SupplierQuoteItem filtered by the id column
 * @method     SupplierQuoteItem findOneBySupplierquoteid(int $supplierQuoteId) Return the first SupplierQuoteItem filtered by the supplierQuoteId column
 * @method     SupplierQuoteItem findOneByProductid(int $productId) Return the first SupplierQuoteItem filtered by the productId column
 * @method     SupplierQuoteItem findOneByReplacedproductid(int $replacedProductId) Return the first SupplierQuoteItem filtered by the replacedProductId column
 * @method     SupplierQuoteItem findOneByClientquoteitemid(int $clientQuoteItemId) Return the first SupplierQuoteItem filtered by the clientQuoteItemId column
 * @method     SupplierQuoteItem findOneByStatus(int $status) Return the first SupplierQuoteItem filtered by the status column
 * @method     SupplierQuoteItem findOneByQuantity(int $quantity) Return the first SupplierQuoteItem filtered by the quantity column
 * @method     SupplierQuoteItem findOneByPortid(int $portId) Return the first SupplierQuoteItem filtered by the portId column
 * @method     SupplierQuoteItem findOneByIncotermid(int $incotermId) Return the first SupplierQuoteItem filtered by the incotermId column
 * @method     SupplierQuoteItem findOneByPrice(double $price) Return the first SupplierQuoteItem filtered by the price column
 * @method     SupplierQuoteItem findOneBySuppliercomments(string $supplierComments) Return the first SupplierQuoteItem filtered by the supplierComments column
 * @method     SupplierQuoteItem findOneByDelivery(int $delivery) Return the first SupplierQuoteItem filtered by the delivery column
 * @method     SupplierQuoteItem findOneByPackage(int $package) Return the first SupplierQuoteItem filtered by the package column
 * @method     SupplierQuoteItem findOneByUnitlength(double $unitLength) Return the first SupplierQuoteItem filtered by the unitLength column
 * @method     SupplierQuoteItem findOneByUnitwidth(double $unitWidth) Return the first SupplierQuoteItem filtered by the unitWidth column
 * @method     SupplierQuoteItem findOneByUnitheight(double $unitHeight) Return the first SupplierQuoteItem filtered by the unitHeight column
 * @method     SupplierQuoteItem findOneByUnitgrossweigth(double $unitGrossWeigth) Return the first SupplierQuoteItem filtered by the unitGrossWeigth column
 * @method     SupplierQuoteItem findOneByUnitspercarton(int $unitsPerCarton) Return the first SupplierQuoteItem filtered by the unitsPerCarton column
 * @method     SupplierQuoteItem findOneByCartons(int $cartons) Return the first SupplierQuoteItem filtered by the cartons column
 * @method     SupplierQuoteItem findOneByCartonlength(double $cartonLength) Return the first SupplierQuoteItem filtered by the cartonLength column
 * @method     SupplierQuoteItem findOneByCartonwidth(double $cartonWidth) Return the first SupplierQuoteItem filtered by the cartonWidth column
 * @method     SupplierQuoteItem findOneByCartonheight(double $cartonHeight) Return the first SupplierQuoteItem filtered by the cartonHeight column
 * @method     SupplierQuoteItem findOneByCartongrossweigth(double $cartonGrossWeigth) Return the first SupplierQuoteItem filtered by the cartonGrossWeigth column
 *
 * @method     array findById(int $id) Return SupplierQuoteItem objects filtered by the id column
 * @method     array findBySupplierquoteid(int $supplierQuoteId) Return SupplierQuoteItem objects filtered by the supplierQuoteId column
 * @method     array findByProductid(int $productId) Return SupplierQuoteItem objects filtered by the productId column
 * @method     array findByReplacedproductid(int $replacedProductId) Return SupplierQuoteItem objects filtered by the replacedProductId column
 * @method     array findByClientquoteitemid(int $clientQuoteItemId) Return SupplierQuoteItem objects filtered by the clientQuoteItemId column
 * @method     array findByStatus(int $status) Return SupplierQuoteItem objects filtered by the status column
 * @method     array findByQuantity(int $quantity) Return SupplierQuoteItem objects filtered by the quantity column
 * @method     array findByPortid(int $portId) Return SupplierQuoteItem objects filtered by the portId column
 * @method     array findByIncotermid(int $incotermId) Return SupplierQuoteItem objects filtered by the incotermId column
 * @method     array findByPrice(double $price) Return SupplierQuoteItem objects filtered by the price column
 * @method     array findBySuppliercomments(string $supplierComments) Return SupplierQuoteItem objects filtered by the supplierComments column
 * @method     array findByDelivery(int $delivery) Return SupplierQuoteItem objects filtered by the delivery column
 * @method     array findByPackage(int $package) Return SupplierQuoteItem objects filtered by the package column
 * @method     array findByUnitlength(double $unitLength) Return SupplierQuoteItem objects filtered by the unitLength column
 * @method     array findByUnitwidth(double $unitWidth) Return SupplierQuoteItem objects filtered by the unitWidth column
 * @method     array findByUnitheight(double $unitHeight) Return SupplierQuoteItem objects filtered by the unitHeight column
 * @method     array findByUnitgrossweigth(double $unitGrossWeigth) Return SupplierQuoteItem objects filtered by the unitGrossWeigth column
 * @method     array findByUnitspercarton(int $unitsPerCarton) Return SupplierQuoteItem objects filtered by the unitsPerCarton column
 * @method     array findByCartons(int $cartons) Return SupplierQuoteItem objects filtered by the cartons column
 * @method     array findByCartonlength(double $cartonLength) Return SupplierQuoteItem objects filtered by the cartonLength column
 * @method     array findByCartonwidth(double $cartonWidth) Return SupplierQuoteItem objects filtered by the cartonWidth column
 * @method     array findByCartonheight(double $cartonHeight) Return SupplierQuoteItem objects filtered by the cartonHeight column
 * @method     array findByCartongrossweigth(double $cartonGrossWeigth) Return SupplierQuoteItem objects filtered by the cartonGrossWeigth column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierQuoteItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierQuoteItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierQuoteItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierQuoteItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierQuoteItemQuery) {
			return $criteria;
		}
		$query = new SupplierQuoteItemQuery();
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
	 * @return    SupplierQuoteItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierQuoteItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierQuoteItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierQuoteItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the supplierQuoteId column
	 * 
	 * @param     int|array $supplierquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierquoteid($supplierquoteid = null, $comparison = null)
	{
		if (is_array($supplierquoteid)) {
			$useMinMax = false;
			if (isset($supplierquoteid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::SUPPLIERQUOTEID, $supplierquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierquoteid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::SUPPLIERQUOTEID, $supplierquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::SUPPLIERQUOTEID, $supplierquoteid, $comparison);
	}

	/**
	 * Filter the query on the productId column
	 * 
	 * @param     int|array $productid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByProductid($productid = null, $comparison = null)
	{
		if (is_array($productid)) {
			$useMinMax = false;
			if (isset($productid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PRODUCTID, $productid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PRODUCTID, $productid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::PRODUCTID, $productid, $comparison);
	}

	/**
	 * Filter the query on the replacedProductId column
	 * 
	 * @param     int|array $replacedproductid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByReplacedproductid($replacedproductid = null, $comparison = null)
	{
		if (is_array($replacedproductid)) {
			$useMinMax = false;
			if (isset($replacedproductid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $replacedproductid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($replacedproductid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $replacedproductid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $replacedproductid, $comparison);
	}

	/**
	 * Filter the query on the clientQuoteItemId column
	 * 
	 * @param     int|array $clientquoteitemid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByClientquoteitemid($clientquoteitemid = null, $comparison = null)
	{
		if (is_array($clientquoteitemid)) {
			$useMinMax = false;
			if (isset($clientquoteitemid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, $clientquoteitemid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteitemid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, $clientquoteitemid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, $clientquoteitemid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the portId column
	 * 
	 * @param     int|array $portid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPortid($portid = null, $comparison = null)
	{
		if (is_array($portid)) {
			$useMinMax = false;
			if (isset($portid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PORTID, $portid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($portid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PORTID, $portid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::PORTID, $portid, $comparison);
	}

	/**
	 * Filter the query on the incotermId column
	 * 
	 * @param     int|array $incotermid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByIncotermid($incotermid = null, $comparison = null)
	{
		if (is_array($incotermid)) {
			$useMinMax = false;
			if (isset($incotermid['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::INCOTERMID, $incotermid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($incotermid['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::INCOTERMID, $incotermid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::INCOTERMID, $incotermid, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the supplierComments column
	 * 
	 * @param     string $suppliercomments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterBySuppliercomments($suppliercomments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($suppliercomments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $suppliercomments)) {
				$suppliercomments = str_replace('*', '%', $suppliercomments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::SUPPLIERCOMMENTS, $suppliercomments, $comparison);
	}

	/**
	 * Filter the query on the delivery column
	 * 
	 * @param     int|array $delivery The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByDelivery($delivery = null, $comparison = null)
	{
		if (is_array($delivery)) {
			$useMinMax = false;
			if (isset($delivery['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::DELIVERY, $delivery['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($delivery['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::DELIVERY, $delivery['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::DELIVERY, $delivery, $comparison);
	}

	/**
	 * Filter the query on the package column
	 * 
	 * @param     int|array $package The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPackage($package = null, $comparison = null)
	{
		if (is_array($package)) {
			$useMinMax = false;
			if (isset($package['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PACKAGE, $package['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($package['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::PACKAGE, $package['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::PACKAGE, $package, $comparison);
	}

	/**
	 * Filter the query on the unitLength column
	 * 
	 * @param     double|array $unitlength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByUnitlength($unitlength = null, $comparison = null)
	{
		if (is_array($unitlength)) {
			$useMinMax = false;
			if (isset($unitlength['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITLENGTH, $unitlength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitlength['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITLENGTH, $unitlength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::UNITLENGTH, $unitlength, $comparison);
	}

	/**
	 * Filter the query on the unitWidth column
	 * 
	 * @param     double|array $unitwidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByUnitwidth($unitwidth = null, $comparison = null)
	{
		if (is_array($unitwidth)) {
			$useMinMax = false;
			if (isset($unitwidth['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITWIDTH, $unitwidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitwidth['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITWIDTH, $unitwidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::UNITWIDTH, $unitwidth, $comparison);
	}

	/**
	 * Filter the query on the unitHeight column
	 * 
	 * @param     double|array $unitheight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByUnitheight($unitheight = null, $comparison = null)
	{
		if (is_array($unitheight)) {
			$useMinMax = false;
			if (isset($unitheight['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITHEIGHT, $unitheight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitheight['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITHEIGHT, $unitheight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::UNITHEIGHT, $unitheight, $comparison);
	}

	/**
	 * Filter the query on the unitGrossWeigth column
	 * 
	 * @param     double|array $unitgrossweigth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByUnitgrossweigth($unitgrossweigth = null, $comparison = null)
	{
		if (is_array($unitgrossweigth)) {
			$useMinMax = false;
			if (isset($unitgrossweigth['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITGROSSWEIGTH, $unitgrossweigth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitgrossweigth['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITGROSSWEIGTH, $unitgrossweigth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::UNITGROSSWEIGTH, $unitgrossweigth, $comparison);
	}

	/**
	 * Filter the query on the unitsPerCarton column
	 * 
	 * @param     int|array $unitspercarton The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByUnitspercarton($unitspercarton = null, $comparison = null)
	{
		if (is_array($unitspercarton)) {
			$useMinMax = false;
			if (isset($unitspercarton['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITSPERCARTON, $unitspercarton['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitspercarton['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::UNITSPERCARTON, $unitspercarton['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::UNITSPERCARTON, $unitspercarton, $comparison);
	}

	/**
	 * Filter the query on the cartons column
	 * 
	 * @param     int|array $cartons The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByCartons($cartons = null, $comparison = null)
	{
		if (is_array($cartons)) {
			$useMinMax = false;
			if (isset($cartons['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONS, $cartons['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartons['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONS, $cartons['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CARTONS, $cartons, $comparison);
	}

	/**
	 * Filter the query on the cartonLength column
	 * 
	 * @param     double|array $cartonlength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByCartonlength($cartonlength = null, $comparison = null)
	{
		if (is_array($cartonlength)) {
			$useMinMax = false;
			if (isset($cartonlength['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONLENGTH, $cartonlength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonlength['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONLENGTH, $cartonlength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CARTONLENGTH, $cartonlength, $comparison);
	}

	/**
	 * Filter the query on the cartonWidth column
	 * 
	 * @param     double|array $cartonwidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByCartonwidth($cartonwidth = null, $comparison = null)
	{
		if (is_array($cartonwidth)) {
			$useMinMax = false;
			if (isset($cartonwidth['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONWIDTH, $cartonwidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonwidth['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONWIDTH, $cartonwidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CARTONWIDTH, $cartonwidth, $comparison);
	}

	/**
	 * Filter the query on the cartonHeight column
	 * 
	 * @param     double|array $cartonheight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByCartonheight($cartonheight = null, $comparison = null)
	{
		if (is_array($cartonheight)) {
			$useMinMax = false;
			if (isset($cartonheight['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONHEIGHT, $cartonheight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonheight['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONHEIGHT, $cartonheight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CARTONHEIGHT, $cartonheight, $comparison);
	}

	/**
	 * Filter the query on the cartonGrossWeigth column
	 * 
	 * @param     double|array $cartongrossweigth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByCartongrossweigth($cartongrossweigth = null, $comparison = null)
	{
		if (is_array($cartongrossweigth)) {
			$useMinMax = false;
			if (isset($cartongrossweigth['min'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartongrossweigth['max'])) {
				$this->addUsingAlias(SupplierQuoteItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth, $comparison);
	}

	/**
	 * Filter the query by a related SupplierQuote object
	 *
	 * @param     SupplierQuote $supplierQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuote($supplierQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::SUPPLIERQUOTEID, $supplierQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinSupplierQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuote');
		
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
			$this->addJoinObject($join, 'SupplierQuote');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuote relation SupplierQuote object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuote', 'SupplierQuoteQuery');
	}

	/**
	 * Filter the query by a related ClientQuoteItem object
	 *
	 * @param     ClientQuoteItem $clientQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByClientQuoteItem($clientQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::CLIENTQUOTEITEMID, $clientQuoteItem->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
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
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByProductRelatedByProductid($product, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::PRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ProductRelatedByProductid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinProductRelatedByProductid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductRelatedByProductid');
		
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
			$this->addJoinObject($join, 'ProductRelatedByProductid');
		}
		
		return $this;
	}

	/**
	 * Use the ProductRelatedByProductid relation Product object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery A secondary query class using the current class as primary query
	 */
	public function useProductRelatedByProductidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProductRelatedByProductid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductRelatedByProductid', 'ProductQuery');
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByProductRelatedByReplacedproductid($product, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::REPLACEDPRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ProductRelatedByReplacedproductid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinProductRelatedByReplacedproductid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductRelatedByReplacedproductid');
		
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
			$this->addJoinObject($join, 'ProductRelatedByReplacedproductid');
		}
		
		return $this;
	}

	/**
	 * Use the ProductRelatedByReplacedproductid relation Product object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductQuery A secondary query class using the current class as primary query
	 */
	public function useProductRelatedByReplacedproductidQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProductRelatedByReplacedproductid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductRelatedByReplacedproductid', 'ProductQuery');
	}

	/**
	 * Filter the query by a related Incoterm object
	 *
	 * @param     Incoterm $incoterm  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByIncoterm($incoterm, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::INCOTERMID, $incoterm->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Incoterm relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinIncoterm($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Incoterm');
		
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
			$this->addJoinObject($join, 'Incoterm');
		}
		
		return $this;
	}

	/**
	 * Use the Incoterm relation Incoterm object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IncotermQuery A secondary query class using the current class as primary query
	 */
	public function useIncotermQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIncoterm($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Incoterm', 'IncotermQuery');
	}

	/**
	 * Filter the query by a related Port object
	 *
	 * @param     Port $port  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterByPort($port, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::PORTID, $port->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Port relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinPort($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Port');
		
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
			$this->addJoinObject($join, 'Port');
		}
		
		return $this;
	}

	/**
	 * Use the Port relation Port object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PortQuery A secondary query class using the current class as primary query
	 */
	public function usePortQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPort($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Port', 'PortQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItemComment object
	 *
	 * @param     SupplierQuoteItemComment $supplierQuoteItemComment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItemComment($supplierQuoteItemComment, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteItemPeer::ID, $supplierQuoteItemComment->getSupplierquoteitemid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItemComment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItemComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItemComment');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItemComment');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItemComment relation SupplierQuoteItemComment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteItemComment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItemComment', 'SupplierQuoteItemCommentQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem Object to remove from the list of results
	 *
	 * @return    SupplierQuoteItemQuery The current query, for fluid interface
	 */
	public function prune($supplierQuoteItem = null)
	{
		if ($supplierQuoteItem) {
			$this->addUsingAlias(SupplierQuoteItemPeer::ID, $supplierQuoteItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierQuoteItemQuery
