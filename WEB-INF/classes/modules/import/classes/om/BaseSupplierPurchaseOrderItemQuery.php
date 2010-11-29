<?php


/**
 * Base class that represents a query for the 'import_supplierPurchaseOrderItem' table.
 *
 * Elemento de Orden de Pedido a Proveedor
 *
 * @method     SupplierPurchaseOrderItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierPurchaseOrderItemQuery orderByProductid($order = Criteria::ASC) Order by the productId column
 * @method     SupplierPurchaseOrderItemQuery orderBySupplierpurchaseorderid($order = Criteria::ASC) Order by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderItemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     SupplierPurchaseOrderItemQuery orderByPortid($order = Criteria::ASC) Order by the portId column
 * @method     SupplierPurchaseOrderItemQuery orderByIncotermid($order = Criteria::ASC) Order by the incotermId column
 * @method     SupplierPurchaseOrderItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     SupplierPurchaseOrderItemQuery orderByDelivery($order = Criteria::ASC) Order by the delivery column
 * @method     SupplierPurchaseOrderItemQuery orderByPackage($order = Criteria::ASC) Order by the package column
 * @method     SupplierPurchaseOrderItemQuery orderByUnitlength($order = Criteria::ASC) Order by the unitLength column
 * @method     SupplierPurchaseOrderItemQuery orderByUnitwidth($order = Criteria::ASC) Order by the unitWidth column
 * @method     SupplierPurchaseOrderItemQuery orderByUnitheight($order = Criteria::ASC) Order by the unitHeight column
 * @method     SupplierPurchaseOrderItemQuery orderByUnitgrossweigth($order = Criteria::ASC) Order by the unitGrossWeigth column
 * @method     SupplierPurchaseOrderItemQuery orderByUnitspercarton($order = Criteria::ASC) Order by the unitsPerCarton column
 * @method     SupplierPurchaseOrderItemQuery orderByCartons($order = Criteria::ASC) Order by the cartons column
 * @method     SupplierPurchaseOrderItemQuery orderByCartonlength($order = Criteria::ASC) Order by the cartonLength column
 * @method     SupplierPurchaseOrderItemQuery orderByCartonwidth($order = Criteria::ASC) Order by the cartonWidth column
 * @method     SupplierPurchaseOrderItemQuery orderByCartonheight($order = Criteria::ASC) Order by the cartonHeight column
 * @method     SupplierPurchaseOrderItemQuery orderByCartongrossweigth($order = Criteria::ASC) Order by the cartonGrossWeigth column
 *
 * @method     SupplierPurchaseOrderItemQuery groupById() Group by the id column
 * @method     SupplierPurchaseOrderItemQuery groupByProductid() Group by the productId column
 * @method     SupplierPurchaseOrderItemQuery groupBySupplierpurchaseorderid() Group by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderItemQuery groupByQuantity() Group by the quantity column
 * @method     SupplierPurchaseOrderItemQuery groupByPortid() Group by the portId column
 * @method     SupplierPurchaseOrderItemQuery groupByIncotermid() Group by the incotermId column
 * @method     SupplierPurchaseOrderItemQuery groupByPrice() Group by the price column
 * @method     SupplierPurchaseOrderItemQuery groupByDelivery() Group by the delivery column
 * @method     SupplierPurchaseOrderItemQuery groupByPackage() Group by the package column
 * @method     SupplierPurchaseOrderItemQuery groupByUnitlength() Group by the unitLength column
 * @method     SupplierPurchaseOrderItemQuery groupByUnitwidth() Group by the unitWidth column
 * @method     SupplierPurchaseOrderItemQuery groupByUnitheight() Group by the unitHeight column
 * @method     SupplierPurchaseOrderItemQuery groupByUnitgrossweigth() Group by the unitGrossWeigth column
 * @method     SupplierPurchaseOrderItemQuery groupByUnitspercarton() Group by the unitsPerCarton column
 * @method     SupplierPurchaseOrderItemQuery groupByCartons() Group by the cartons column
 * @method     SupplierPurchaseOrderItemQuery groupByCartonlength() Group by the cartonLength column
 * @method     SupplierPurchaseOrderItemQuery groupByCartonwidth() Group by the cartonWidth column
 * @method     SupplierPurchaseOrderItemQuery groupByCartonheight() Group by the cartonHeight column
 * @method     SupplierPurchaseOrderItemQuery groupByCartongrossweigth() Group by the cartonGrossWeigth column
 *
 * @method     SupplierPurchaseOrderItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierPurchaseOrderItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierPurchaseOrderItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierPurchaseOrderItemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     SupplierPurchaseOrderItemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     SupplierPurchaseOrderItemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     SupplierPurchaseOrderItemQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderItemQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderItemQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     SupplierPurchaseOrderItemQuery leftJoinIncoterm($relationAlias = null) Adds a LEFT JOIN clause to the query using the Incoterm relation
 * @method     SupplierPurchaseOrderItemQuery rightJoinIncoterm($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Incoterm relation
 * @method     SupplierPurchaseOrderItemQuery innerJoinIncoterm($relationAlias = null) Adds a INNER JOIN clause to the query using the Incoterm relation
 *
 * @method     SupplierPurchaseOrderItemQuery leftJoinPort($relationAlias = null) Adds a LEFT JOIN clause to the query using the Port relation
 * @method     SupplierPurchaseOrderItemQuery rightJoinPort($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Port relation
 * @method     SupplierPurchaseOrderItemQuery innerJoinPort($relationAlias = null) Adds a INNER JOIN clause to the query using the Port relation
 *
 * @method     SupplierPurchaseOrderItem findOne(PropelPDO $con = null) Return the first SupplierPurchaseOrderItem matching the query
 * @method     SupplierPurchaseOrderItem findOneOrCreate(PropelPDO $con = null) Return the first SupplierPurchaseOrderItem matching the query, or a new SupplierPurchaseOrderItem object populated from the query conditions when no match is found
 *
 * @method     SupplierPurchaseOrderItem findOneById(int $id) Return the first SupplierPurchaseOrderItem filtered by the id column
 * @method     SupplierPurchaseOrderItem findOneByProductid(int $productId) Return the first SupplierPurchaseOrderItem filtered by the productId column
 * @method     SupplierPurchaseOrderItem findOneBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return the first SupplierPurchaseOrderItem filtered by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderItem findOneByQuantity(int $quantity) Return the first SupplierPurchaseOrderItem filtered by the quantity column
 * @method     SupplierPurchaseOrderItem findOneByPortid(int $portId) Return the first SupplierPurchaseOrderItem filtered by the portId column
 * @method     SupplierPurchaseOrderItem findOneByIncotermid(int $incotermId) Return the first SupplierPurchaseOrderItem filtered by the incotermId column
 * @method     SupplierPurchaseOrderItem findOneByPrice(double $price) Return the first SupplierPurchaseOrderItem filtered by the price column
 * @method     SupplierPurchaseOrderItem findOneByDelivery(int $delivery) Return the first SupplierPurchaseOrderItem filtered by the delivery column
 * @method     SupplierPurchaseOrderItem findOneByPackage(int $package) Return the first SupplierPurchaseOrderItem filtered by the package column
 * @method     SupplierPurchaseOrderItem findOneByUnitlength(double $unitLength) Return the first SupplierPurchaseOrderItem filtered by the unitLength column
 * @method     SupplierPurchaseOrderItem findOneByUnitwidth(double $unitWidth) Return the first SupplierPurchaseOrderItem filtered by the unitWidth column
 * @method     SupplierPurchaseOrderItem findOneByUnitheight(double $unitHeight) Return the first SupplierPurchaseOrderItem filtered by the unitHeight column
 * @method     SupplierPurchaseOrderItem findOneByUnitgrossweigth(double $unitGrossWeigth) Return the first SupplierPurchaseOrderItem filtered by the unitGrossWeigth column
 * @method     SupplierPurchaseOrderItem findOneByUnitspercarton(int $unitsPerCarton) Return the first SupplierPurchaseOrderItem filtered by the unitsPerCarton column
 * @method     SupplierPurchaseOrderItem findOneByCartons(int $cartons) Return the first SupplierPurchaseOrderItem filtered by the cartons column
 * @method     SupplierPurchaseOrderItem findOneByCartonlength(double $cartonLength) Return the first SupplierPurchaseOrderItem filtered by the cartonLength column
 * @method     SupplierPurchaseOrderItem findOneByCartonwidth(double $cartonWidth) Return the first SupplierPurchaseOrderItem filtered by the cartonWidth column
 * @method     SupplierPurchaseOrderItem findOneByCartonheight(double $cartonHeight) Return the first SupplierPurchaseOrderItem filtered by the cartonHeight column
 * @method     SupplierPurchaseOrderItem findOneByCartongrossweigth(double $cartonGrossWeigth) Return the first SupplierPurchaseOrderItem filtered by the cartonGrossWeigth column
 *
 * @method     array findById(int $id) Return SupplierPurchaseOrderItem objects filtered by the id column
 * @method     array findByProductid(int $productId) Return SupplierPurchaseOrderItem objects filtered by the productId column
 * @method     array findBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return SupplierPurchaseOrderItem objects filtered by the supplierPurchaseOrderId column
 * @method     array findByQuantity(int $quantity) Return SupplierPurchaseOrderItem objects filtered by the quantity column
 * @method     array findByPortid(int $portId) Return SupplierPurchaseOrderItem objects filtered by the portId column
 * @method     array findByIncotermid(int $incotermId) Return SupplierPurchaseOrderItem objects filtered by the incotermId column
 * @method     array findByPrice(double $price) Return SupplierPurchaseOrderItem objects filtered by the price column
 * @method     array findByDelivery(int $delivery) Return SupplierPurchaseOrderItem objects filtered by the delivery column
 * @method     array findByPackage(int $package) Return SupplierPurchaseOrderItem objects filtered by the package column
 * @method     array findByUnitlength(double $unitLength) Return SupplierPurchaseOrderItem objects filtered by the unitLength column
 * @method     array findByUnitwidth(double $unitWidth) Return SupplierPurchaseOrderItem objects filtered by the unitWidth column
 * @method     array findByUnitheight(double $unitHeight) Return SupplierPurchaseOrderItem objects filtered by the unitHeight column
 * @method     array findByUnitgrossweigth(double $unitGrossWeigth) Return SupplierPurchaseOrderItem objects filtered by the unitGrossWeigth column
 * @method     array findByUnitspercarton(int $unitsPerCarton) Return SupplierPurchaseOrderItem objects filtered by the unitsPerCarton column
 * @method     array findByCartons(int $cartons) Return SupplierPurchaseOrderItem objects filtered by the cartons column
 * @method     array findByCartonlength(double $cartonLength) Return SupplierPurchaseOrderItem objects filtered by the cartonLength column
 * @method     array findByCartonwidth(double $cartonWidth) Return SupplierPurchaseOrderItem objects filtered by the cartonWidth column
 * @method     array findByCartonheight(double $cartonHeight) Return SupplierPurchaseOrderItem objects filtered by the cartonHeight column
 * @method     array findByCartongrossweigth(double $cartonGrossWeigth) Return SupplierPurchaseOrderItem objects filtered by the cartonGrossWeigth column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierPurchaseOrderItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierPurchaseOrderItem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierPurchaseOrderItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierPurchaseOrderItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierPurchaseOrderItemQuery) {
			return $criteria;
		}
		$query = new SupplierPurchaseOrderItemQuery();
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
	 * @return    SupplierPurchaseOrderItem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierPurchaseOrderItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the productId column
	 * 
	 * @param     int|array $productid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByProductid($productid = null, $comparison = null)
	{
		if (is_array($productid)) {
			$useMinMax = false;
			if (isset($productid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRODUCTID, $productid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRODUCTID, $productid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRODUCTID, $productid, $comparison);
	}

	/**
	 * Filter the query on the supplierPurchaseOrderId column
	 * 
	 * @param     int|array $supplierpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierpurchaseorderid($supplierpurchaseorderid = null, $comparison = null)
	{
		if (is_array($supplierpurchaseorderid)) {
			$useMinMax = false;
			if (isset($supplierpurchaseorderid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierpurchaseorderid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the portId column
	 * 
	 * @param     int|array $portid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPortid($portid = null, $comparison = null)
	{
		if (is_array($portid)) {
			$useMinMax = false;
			if (isset($portid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PORTID, $portid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($portid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PORTID, $portid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::PORTID, $portid, $comparison);
	}

	/**
	 * Filter the query on the incotermId column
	 * 
	 * @param     int|array $incotermid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByIncotermid($incotermid = null, $comparison = null)
	{
		if (is_array($incotermid)) {
			$useMinMax = false;
			if (isset($incotermid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::INCOTERMID, $incotermid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($incotermid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::INCOTERMID, $incotermid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::INCOTERMID, $incotermid, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the delivery column
	 * 
	 * @param     int|array $delivery The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByDelivery($delivery = null, $comparison = null)
	{
		if (is_array($delivery)) {
			$useMinMax = false;
			if (isset($delivery['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::DELIVERY, $delivery['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($delivery['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::DELIVERY, $delivery['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::DELIVERY, $delivery, $comparison);
	}

	/**
	 * Filter the query on the package column
	 * 
	 * @param     int|array $package The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPackage($package = null, $comparison = null)
	{
		if (is_array($package)) {
			$useMinMax = false;
			if (isset($package['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PACKAGE, $package['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($package['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::PACKAGE, $package['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::PACKAGE, $package, $comparison);
	}

	/**
	 * Filter the query on the unitLength column
	 * 
	 * @param     double|array $unitlength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByUnitlength($unitlength = null, $comparison = null)
	{
		if (is_array($unitlength)) {
			$useMinMax = false;
			if (isset($unitlength['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITLENGTH, $unitlength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitlength['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITLENGTH, $unitlength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITLENGTH, $unitlength, $comparison);
	}

	/**
	 * Filter the query on the unitWidth column
	 * 
	 * @param     double|array $unitwidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByUnitwidth($unitwidth = null, $comparison = null)
	{
		if (is_array($unitwidth)) {
			$useMinMax = false;
			if (isset($unitwidth['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITWIDTH, $unitwidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitwidth['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITWIDTH, $unitwidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITWIDTH, $unitwidth, $comparison);
	}

	/**
	 * Filter the query on the unitHeight column
	 * 
	 * @param     double|array $unitheight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByUnitheight($unitheight = null, $comparison = null)
	{
		if (is_array($unitheight)) {
			$useMinMax = false;
			if (isset($unitheight['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITHEIGHT, $unitheight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitheight['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITHEIGHT, $unitheight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITHEIGHT, $unitheight, $comparison);
	}

	/**
	 * Filter the query on the unitGrossWeigth column
	 * 
	 * @param     double|array $unitgrossweigth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByUnitgrossweigth($unitgrossweigth = null, $comparison = null)
	{
		if (is_array($unitgrossweigth)) {
			$useMinMax = false;
			if (isset($unitgrossweigth['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH, $unitgrossweigth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitgrossweigth['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH, $unitgrossweigth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITGROSSWEIGTH, $unitgrossweigth, $comparison);
	}

	/**
	 * Filter the query on the unitsPerCarton column
	 * 
	 * @param     int|array $unitspercarton The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByUnitspercarton($unitspercarton = null, $comparison = null)
	{
		if (is_array($unitspercarton)) {
			$useMinMax = false;
			if (isset($unitspercarton['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITSPERCARTON, $unitspercarton['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($unitspercarton['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITSPERCARTON, $unitspercarton['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::UNITSPERCARTON, $unitspercarton, $comparison);
	}

	/**
	 * Filter the query on the cartons column
	 * 
	 * @param     int|array $cartons The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByCartons($cartons = null, $comparison = null)
	{
		if (is_array($cartons)) {
			$useMinMax = false;
			if (isset($cartons['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONS, $cartons['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartons['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONS, $cartons['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONS, $cartons, $comparison);
	}

	/**
	 * Filter the query on the cartonLength column
	 * 
	 * @param     double|array $cartonlength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByCartonlength($cartonlength = null, $comparison = null)
	{
		if (is_array($cartonlength)) {
			$useMinMax = false;
			if (isset($cartonlength['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONLENGTH, $cartonlength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonlength['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONLENGTH, $cartonlength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONLENGTH, $cartonlength, $comparison);
	}

	/**
	 * Filter the query on the cartonWidth column
	 * 
	 * @param     double|array $cartonwidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByCartonwidth($cartonwidth = null, $comparison = null)
	{
		if (is_array($cartonwidth)) {
			$useMinMax = false;
			if (isset($cartonwidth['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONWIDTH, $cartonwidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonwidth['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONWIDTH, $cartonwidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONWIDTH, $cartonwidth, $comparison);
	}

	/**
	 * Filter the query on the cartonHeight column
	 * 
	 * @param     double|array $cartonheight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByCartonheight($cartonheight = null, $comparison = null)
	{
		if (is_array($cartonheight)) {
			$useMinMax = false;
			if (isset($cartonheight['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONHEIGHT, $cartonheight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartonheight['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONHEIGHT, $cartonheight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONHEIGHT, $cartonheight, $comparison);
	}

	/**
	 * Filter the query on the cartonGrossWeigth column
	 * 
	 * @param     double|array $cartongrossweigth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByCartongrossweigth($cartongrossweigth = null, $comparison = null)
	{
		if (is_array($cartongrossweigth)) {
			$useMinMax = false;
			if (isset($cartongrossweigth['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cartongrossweigth['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderItemPeer::CARTONGROSSWEIGTH, $cartongrossweigth, $comparison);
	}

	/**
	 * Filter the query by a related Product object
	 *
	 * @param     Product $product  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderItemPeer::PRODUCTID, $product->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Product relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
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
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderItemPeer::SUPPLIERPURCHASEORDERID, $supplierPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrder');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrder');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrder relation SupplierPurchaseOrder object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrder', 'SupplierPurchaseOrderQuery');
	}

	/**
	 * Filter the query by a related Incoterm object
	 *
	 * @param     Incoterm $incoterm  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByIncoterm($incoterm, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderItemPeer::INCOTERMID, $incoterm->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Incoterm relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
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
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function filterByPort($port, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderItemPeer::PORTID, $port->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Port relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     SupplierPurchaseOrderItem $supplierPurchaseOrderItem Object to remove from the list of results
	 *
	 * @return    SupplierPurchaseOrderItemQuery The current query, for fluid interface
	 */
	public function prune($supplierPurchaseOrderItem = null)
	{
		if ($supplierPurchaseOrderItem) {
			$this->addUsingAlias(SupplierPurchaseOrderItemPeer::ID, $supplierPurchaseOrderItem->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierPurchaseOrderItemQuery
