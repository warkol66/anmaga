<?php


/**
 * Base class that represents a query for the 'import_shipmentRelease' table.
 *
 * Datos de nacionalizacion
 *
 * @method     ShipmentReleaseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShipmentReleaseQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     ShipmentReleaseQuery orderByShipmentid($order = Criteria::ASC) Order by the shipmentId column
 * @method     ShipmentReleaseQuery orderByDocumentspresentationdate($order = Criteria::ASC) Order by the documentsPresentationDate column
 * @method     ShipmentReleaseQuery orderByBanktariffspaymentdate($order = Criteria::ASC) Order by the bankTariffsPaymentDate column
 * @method     ShipmentReleaseQuery orderByPhysicalrecognitiondate($order = Criteria::ASC) Order by the physicalRecognitionDate column
 * @method     ShipmentReleaseQuery orderByDocumentsvalidationdate($order = Criteria::ASC) Order by the documentsValidationDate column
 * @method     ShipmentReleaseQuery orderByExpensespaymentdate($order = Criteria::ASC) Order by the expensesPaymentDate column
 * @method     ShipmentReleaseQuery orderByLoadingorderdate($order = Criteria::ASC) Order by the loadingOrderDate column
 * @method     ShipmentReleaseQuery orderByContainersloadingdate($order = Criteria::ASC) Order by the containersLoadingDate column
 * @method     ShipmentReleaseQuery orderByEstimatedmovementtostorehousedate($order = Criteria::ASC) Order by the estimatedMovementToStorehouseDate column
 * @method     ShipmentReleaseQuery orderByArrivaltostorehousetimestamp($order = Criteria::ASC) Order by the arrivalToStorehouseTimestamp column
 * @method     ShipmentReleaseQuery orderByContainterreceiptonstorehousedate($order = Criteria::ASC) Order by the containterReceiptOnStorehouseDate column
 *
 * @method     ShipmentReleaseQuery groupById() Group by the id column
 * @method     ShipmentReleaseQuery groupByCreatedat() Group by the createdAt column
 * @method     ShipmentReleaseQuery groupByShipmentid() Group by the shipmentId column
 * @method     ShipmentReleaseQuery groupByDocumentspresentationdate() Group by the documentsPresentationDate column
 * @method     ShipmentReleaseQuery groupByBanktariffspaymentdate() Group by the bankTariffsPaymentDate column
 * @method     ShipmentReleaseQuery groupByPhysicalrecognitiondate() Group by the physicalRecognitionDate column
 * @method     ShipmentReleaseQuery groupByDocumentsvalidationdate() Group by the documentsValidationDate column
 * @method     ShipmentReleaseQuery groupByExpensespaymentdate() Group by the expensesPaymentDate column
 * @method     ShipmentReleaseQuery groupByLoadingorderdate() Group by the loadingOrderDate column
 * @method     ShipmentReleaseQuery groupByContainersloadingdate() Group by the containersLoadingDate column
 * @method     ShipmentReleaseQuery groupByEstimatedmovementtostorehousedate() Group by the estimatedMovementToStorehouseDate column
 * @method     ShipmentReleaseQuery groupByArrivaltostorehousetimestamp() Group by the arrivalToStorehouseTimestamp column
 * @method     ShipmentReleaseQuery groupByContainterreceiptonstorehousedate() Group by the containterReceiptOnStorehouseDate column
 *
 * @method     ShipmentReleaseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShipmentReleaseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShipmentReleaseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShipmentReleaseQuery leftJoinShipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipment relation
 * @method     ShipmentReleaseQuery rightJoinShipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipment relation
 * @method     ShipmentReleaseQuery innerJoinShipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipment relation
 *
 * @method     ShipmentRelease findOne(PropelPDO $con = null) Return the first ShipmentRelease matching the query
 * @method     ShipmentRelease findOneOrCreate(PropelPDO $con = null) Return the first ShipmentRelease matching the query, or a new ShipmentRelease object populated from the query conditions when no match is found
 *
 * @method     ShipmentRelease findOneById(int $id) Return the first ShipmentRelease filtered by the id column
 * @method     ShipmentRelease findOneByCreatedat(string $createdAt) Return the first ShipmentRelease filtered by the createdAt column
 * @method     ShipmentRelease findOneByShipmentid(int $shipmentId) Return the first ShipmentRelease filtered by the shipmentId column
 * @method     ShipmentRelease findOneByDocumentspresentationdate(string $documentsPresentationDate) Return the first ShipmentRelease filtered by the documentsPresentationDate column
 * @method     ShipmentRelease findOneByBanktariffspaymentdate(string $bankTariffsPaymentDate) Return the first ShipmentRelease filtered by the bankTariffsPaymentDate column
 * @method     ShipmentRelease findOneByPhysicalrecognitiondate(string $physicalRecognitionDate) Return the first ShipmentRelease filtered by the physicalRecognitionDate column
 * @method     ShipmentRelease findOneByDocumentsvalidationdate(string $documentsValidationDate) Return the first ShipmentRelease filtered by the documentsValidationDate column
 * @method     ShipmentRelease findOneByExpensespaymentdate(string $expensesPaymentDate) Return the first ShipmentRelease filtered by the expensesPaymentDate column
 * @method     ShipmentRelease findOneByLoadingorderdate(string $loadingOrderDate) Return the first ShipmentRelease filtered by the loadingOrderDate column
 * @method     ShipmentRelease findOneByContainersloadingdate(int $containersLoadingDate) Return the first ShipmentRelease filtered by the containersLoadingDate column
 * @method     ShipmentRelease findOneByEstimatedmovementtostorehousedate(string $estimatedMovementToStorehouseDate) Return the first ShipmentRelease filtered by the estimatedMovementToStorehouseDate column
 * @method     ShipmentRelease findOneByArrivaltostorehousetimestamp(string $arrivalToStorehouseTimestamp) Return the first ShipmentRelease filtered by the arrivalToStorehouseTimestamp column
 * @method     ShipmentRelease findOneByContainterreceiptonstorehousedate(string $containterReceiptOnStorehouseDate) Return the first ShipmentRelease filtered by the containterReceiptOnStorehouseDate column
 *
 * @method     array findById(int $id) Return ShipmentRelease objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return ShipmentRelease objects filtered by the createdAt column
 * @method     array findByShipmentid(int $shipmentId) Return ShipmentRelease objects filtered by the shipmentId column
 * @method     array findByDocumentspresentationdate(string $documentsPresentationDate) Return ShipmentRelease objects filtered by the documentsPresentationDate column
 * @method     array findByBanktariffspaymentdate(string $bankTariffsPaymentDate) Return ShipmentRelease objects filtered by the bankTariffsPaymentDate column
 * @method     array findByPhysicalrecognitiondate(string $physicalRecognitionDate) Return ShipmentRelease objects filtered by the physicalRecognitionDate column
 * @method     array findByDocumentsvalidationdate(string $documentsValidationDate) Return ShipmentRelease objects filtered by the documentsValidationDate column
 * @method     array findByExpensespaymentdate(string $expensesPaymentDate) Return ShipmentRelease objects filtered by the expensesPaymentDate column
 * @method     array findByLoadingorderdate(string $loadingOrderDate) Return ShipmentRelease objects filtered by the loadingOrderDate column
 * @method     array findByContainersloadingdate(int $containersLoadingDate) Return ShipmentRelease objects filtered by the containersLoadingDate column
 * @method     array findByEstimatedmovementtostorehousedate(string $estimatedMovementToStorehouseDate) Return ShipmentRelease objects filtered by the estimatedMovementToStorehouseDate column
 * @method     array findByArrivaltostorehousetimestamp(string $arrivalToStorehouseTimestamp) Return ShipmentRelease objects filtered by the arrivalToStorehouseTimestamp column
 * @method     array findByContainterreceiptonstorehousedate(string $containterReceiptOnStorehouseDate) Return ShipmentRelease objects filtered by the containterReceiptOnStorehouseDate column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseShipmentReleaseQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShipmentReleaseQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ShipmentRelease', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShipmentReleaseQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShipmentReleaseQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShipmentReleaseQuery) {
			return $criteria;
		}
		$query = new ShipmentReleaseQuery();
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
	 * @return    ShipmentRelease|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShipmentReleasePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShipmentReleasePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the shipmentId column
	 * 
	 * @param     int|array $shipmentid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByShipmentid($shipmentid = null, $comparison = null)
	{
		if (is_array($shipmentid)) {
			$useMinMax = false;
			if (isset($shipmentid['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($shipmentid['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipmentid, $comparison);
	}

	/**
	 * Filter the query on the documentsPresentationDate column
	 * 
	 * @param     string|array $documentspresentationdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByDocumentspresentationdate($documentspresentationdate = null, $comparison = null)
	{
		if (is_array($documentspresentationdate)) {
			$useMinMax = false;
			if (isset($documentspresentationdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSPRESENTATIONDATE, $documentspresentationdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($documentspresentationdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSPRESENTATIONDATE, $documentspresentationdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSPRESENTATIONDATE, $documentspresentationdate, $comparison);
	}

	/**
	 * Filter the query on the bankTariffsPaymentDate column
	 * 
	 * @param     string|array $banktariffspaymentdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByBanktariffspaymentdate($banktariffspaymentdate = null, $comparison = null)
	{
		if (is_array($banktariffspaymentdate)) {
			$useMinMax = false;
			if (isset($banktariffspaymentdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::BANKTARIFFSPAYMENTDATE, $banktariffspaymentdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($banktariffspaymentdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::BANKTARIFFSPAYMENTDATE, $banktariffspaymentdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::BANKTARIFFSPAYMENTDATE, $banktariffspaymentdate, $comparison);
	}

	/**
	 * Filter the query on the physicalRecognitionDate column
	 * 
	 * @param     string|array $physicalrecognitiondate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByPhysicalrecognitiondate($physicalrecognitiondate = null, $comparison = null)
	{
		if (is_array($physicalrecognitiondate)) {
			$useMinMax = false;
			if (isset($physicalrecognitiondate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::PHYSICALRECOGNITIONDATE, $physicalrecognitiondate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($physicalrecognitiondate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::PHYSICALRECOGNITIONDATE, $physicalrecognitiondate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::PHYSICALRECOGNITIONDATE, $physicalrecognitiondate, $comparison);
	}

	/**
	 * Filter the query on the documentsValidationDate column
	 * 
	 * @param     string|array $documentsvalidationdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByDocumentsvalidationdate($documentsvalidationdate = null, $comparison = null)
	{
		if (is_array($documentsvalidationdate)) {
			$useMinMax = false;
			if (isset($documentsvalidationdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSVALIDATIONDATE, $documentsvalidationdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($documentsvalidationdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSVALIDATIONDATE, $documentsvalidationdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::DOCUMENTSVALIDATIONDATE, $documentsvalidationdate, $comparison);
	}

	/**
	 * Filter the query on the expensesPaymentDate column
	 * 
	 * @param     string|array $expensespaymentdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByExpensespaymentdate($expensespaymentdate = null, $comparison = null)
	{
		if (is_array($expensespaymentdate)) {
			$useMinMax = false;
			if (isset($expensespaymentdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::EXPENSESPAYMENTDATE, $expensespaymentdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($expensespaymentdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::EXPENSESPAYMENTDATE, $expensespaymentdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::EXPENSESPAYMENTDATE, $expensespaymentdate, $comparison);
	}

	/**
	 * Filter the query on the loadingOrderDate column
	 * 
	 * @param     string|array $loadingorderdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByLoadingorderdate($loadingorderdate = null, $comparison = null)
	{
		if (is_array($loadingorderdate)) {
			$useMinMax = false;
			if (isset($loadingorderdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::LOADINGORDERDATE, $loadingorderdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($loadingorderdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::LOADINGORDERDATE, $loadingorderdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::LOADINGORDERDATE, $loadingorderdate, $comparison);
	}

	/**
	 * Filter the query on the containersLoadingDate column
	 * 
	 * @param     int|array $containersloadingdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByContainersloadingdate($containersloadingdate = null, $comparison = null)
	{
		if (is_array($containersloadingdate)) {
			$useMinMax = false;
			if (isset($containersloadingdate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CONTAINERSLOADINGDATE, $containersloadingdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($containersloadingdate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CONTAINERSLOADINGDATE, $containersloadingdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::CONTAINERSLOADINGDATE, $containersloadingdate, $comparison);
	}

	/**
	 * Filter the query on the estimatedMovementToStorehouseDate column
	 * 
	 * @param     string|array $estimatedmovementtostorehousedate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByEstimatedmovementtostorehousedate($estimatedmovementtostorehousedate = null, $comparison = null)
	{
		if (is_array($estimatedmovementtostorehousedate)) {
			$useMinMax = false;
			if (isset($estimatedmovementtostorehousedate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::ESTIMATEDMOVEMENTTOSTOREHOUSEDATE, $estimatedmovementtostorehousedate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estimatedmovementtostorehousedate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::ESTIMATEDMOVEMENTTOSTOREHOUSEDATE, $estimatedmovementtostorehousedate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::ESTIMATEDMOVEMENTTOSTOREHOUSEDATE, $estimatedmovementtostorehousedate, $comparison);
	}

	/**
	 * Filter the query on the arrivalToStorehouseTimestamp column
	 * 
	 * @param     string|array $arrivaltostorehousetimestamp The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByArrivaltostorehousetimestamp($arrivaltostorehousetimestamp = null, $comparison = null)
	{
		if (is_array($arrivaltostorehousetimestamp)) {
			$useMinMax = false;
			if (isset($arrivaltostorehousetimestamp['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::ARRIVALTOSTOREHOUSETIMESTAMP, $arrivaltostorehousetimestamp['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($arrivaltostorehousetimestamp['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::ARRIVALTOSTOREHOUSETIMESTAMP, $arrivaltostorehousetimestamp['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::ARRIVALTOSTOREHOUSETIMESTAMP, $arrivaltostorehousetimestamp, $comparison);
	}

	/**
	 * Filter the query on the containterReceiptOnStorehouseDate column
	 * 
	 * @param     string|array $containterreceiptonstorehousedate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByContainterreceiptonstorehousedate($containterreceiptonstorehousedate = null, $comparison = null)
	{
		if (is_array($containterreceiptonstorehousedate)) {
			$useMinMax = false;
			if (isset($containterreceiptonstorehousedate['min'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CONTAINTERRECEIPTONSTOREHOUSEDATE, $containterreceiptonstorehousedate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($containterreceiptonstorehousedate['max'])) {
				$this->addUsingAlias(ShipmentReleasePeer::CONTAINTERRECEIPTONSTOREHOUSEDATE, $containterreceiptonstorehousedate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentReleasePeer::CONTAINTERRECEIPTONSTOREHOUSEDATE, $containterreceiptonstorehousedate, $comparison);
	}

	/**
	 * Filter the query by a related Shipment object
	 *
	 * @param     Shipment $shipment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function filterByShipment($shipment, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentReleasePeer::SHIPMENTID, $shipment->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Shipment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function joinShipment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Shipment');
		
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
			$this->addJoinObject($join, 'Shipment');
		}
		
		return $this;
	}

	/**
	 * Use the Shipment relation Shipment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery A secondary query class using the current class as primary query
	 */
	public function useShipmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShipment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Shipment', 'ShipmentQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShipmentRelease $shipmentRelease Object to remove from the list of results
	 *
	 * @return    ShipmentReleaseQuery The current query, for fluid interface
	 */
	public function prune($shipmentRelease = null)
	{
		if ($shipmentRelease) {
			$this->addUsingAlias(ShipmentReleasePeer::ID, $shipmentRelease->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseShipmentReleaseQuery
