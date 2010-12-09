<?php


/**
 * Base class that represents a query for the 'import_shipment' table.
 *
 * Datos de envio
 *
 * @method     ShipmentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShipmentQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     ShipmentQuery orderBySupplierpurchaseorderid($order = Criteria::ASC) Order by the supplierPurchaseOrderId column
 * @method     ShipmentQuery orderByContainersrealcount20($order = Criteria::ASC) Order by the containersRealCount20 column
 * @method     ShipmentQuery orderByContainersrealcount40($order = Criteria::ASC) Order by the containersRealCount40 column
 * @method     ShipmentQuery orderByContainersnumbers($order = Criteria::ASC) Order by the containersNumbers column
 * @method     ShipmentQuery orderByPickupdate($order = Criteria::ASC) Order by the pickupDate column
 * @method     ShipmentQuery orderByShipmentdate($order = Criteria::ASC) Order by the shipmentDate column
 * @method     ShipmentQuery orderByBlnumber($order = Criteria::ASC) Order by the blNumber column
 * @method     ShipmentQuery orderByVesselname($order = Criteria::ASC) Order by the vesselName column
 * @method     ShipmentQuery orderByEstimateddeparturedate($order = Criteria::ASC) Order by the estimatedDepartureDate column
 * @method     ShipmentQuery orderByDeparturedate($order = Criteria::ASC) Order by the departureDate column
 * @method     ShipmentQuery orderByArrivalportid($order = Criteria::ASC) Order by the arrivalPortId column
 * @method     ShipmentQuery orderByArrivaltopanamadate($order = Criteria::ASC) Order by the arrivalToPanamaDate column
 * @method     ShipmentQuery orderByTransshipmentdate($order = Criteria::ASC) Order by the transshipmentDate column
 * @method     ShipmentQuery orderByTelexrelease($order = Criteria::ASC) Order by the telexRelease column
 * @method     ShipmentQuery orderByEstimatedarrivaldate($order = Criteria::ASC) Order by the estimatedArrivalDate column
 * @method     ShipmentQuery orderByArrivaldate($order = Criteria::ASC) Order by the arrivalDate column
 *
 * @method     ShipmentQuery groupById() Group by the id column
 * @method     ShipmentQuery groupByCreatedat() Group by the createdAt column
 * @method     ShipmentQuery groupBySupplierpurchaseorderid() Group by the supplierPurchaseOrderId column
 * @method     ShipmentQuery groupByContainersrealcount20() Group by the containersRealCount20 column
 * @method     ShipmentQuery groupByContainersrealcount40() Group by the containersRealCount40 column
 * @method     ShipmentQuery groupByContainersnumbers() Group by the containersNumbers column
 * @method     ShipmentQuery groupByPickupdate() Group by the pickupDate column
 * @method     ShipmentQuery groupByShipmentdate() Group by the shipmentDate column
 * @method     ShipmentQuery groupByBlnumber() Group by the blNumber column
 * @method     ShipmentQuery groupByVesselname() Group by the vesselName column
 * @method     ShipmentQuery groupByEstimateddeparturedate() Group by the estimatedDepartureDate column
 * @method     ShipmentQuery groupByDeparturedate() Group by the departureDate column
 * @method     ShipmentQuery groupByArrivalportid() Group by the arrivalPortId column
 * @method     ShipmentQuery groupByArrivaltopanamadate() Group by the arrivalToPanamaDate column
 * @method     ShipmentQuery groupByTransshipmentdate() Group by the transshipmentDate column
 * @method     ShipmentQuery groupByTelexrelease() Group by the telexRelease column
 * @method     ShipmentQuery groupByEstimatedarrivaldate() Group by the estimatedArrivalDate column
 * @method     ShipmentQuery groupByArrivaldate() Group by the arrivalDate column
 *
 * @method     ShipmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShipmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShipmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShipmentQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ShipmentQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ShipmentQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     ShipmentQuery leftJoinPort($relationAlias = null) Adds a LEFT JOIN clause to the query using the Port relation
 * @method     ShipmentQuery rightJoinPort($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Port relation
 * @method     ShipmentQuery innerJoinPort($relationAlias = null) Adds a INNER JOIN clause to the query using the Port relation
 *
 * @method     ShipmentQuery leftJoinShipmentRelease($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipmentRelease relation
 * @method     ShipmentQuery rightJoinShipmentRelease($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipmentRelease relation
 * @method     ShipmentQuery innerJoinShipmentRelease($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipmentRelease relation
 *
 * @method     Shipment findOne(PropelPDO $con = null) Return the first Shipment matching the query
 * @method     Shipment findOneOrCreate(PropelPDO $con = null) Return the first Shipment matching the query, or a new Shipment object populated from the query conditions when no match is found
 *
 * @method     Shipment findOneById(int $id) Return the first Shipment filtered by the id column
 * @method     Shipment findOneByCreatedat(string $createdAt) Return the first Shipment filtered by the createdAt column
 * @method     Shipment findOneBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return the first Shipment filtered by the supplierPurchaseOrderId column
 * @method     Shipment findOneByContainersrealcount20(int $containersRealCount20) Return the first Shipment filtered by the containersRealCount20 column
 * @method     Shipment findOneByContainersrealcount40(int $containersRealCount40) Return the first Shipment filtered by the containersRealCount40 column
 * @method     Shipment findOneByContainersnumbers(string $containersNumbers) Return the first Shipment filtered by the containersNumbers column
 * @method     Shipment findOneByPickupdate(string $pickupDate) Return the first Shipment filtered by the pickupDate column
 * @method     Shipment findOneByShipmentdate(string $shipmentDate) Return the first Shipment filtered by the shipmentDate column
 * @method     Shipment findOneByBlnumber(int $blNumber) Return the first Shipment filtered by the blNumber column
 * @method     Shipment findOneByVesselname(string $vesselName) Return the first Shipment filtered by the vesselName column
 * @method     Shipment findOneByEstimateddeparturedate(string $estimatedDepartureDate) Return the first Shipment filtered by the estimatedDepartureDate column
 * @method     Shipment findOneByDeparturedate(string $departureDate) Return the first Shipment filtered by the departureDate column
 * @method     Shipment findOneByArrivalportid(int $arrivalPortId) Return the first Shipment filtered by the arrivalPortId column
 * @method     Shipment findOneByArrivaltopanamadate(string $arrivalToPanamaDate) Return the first Shipment filtered by the arrivalToPanamaDate column
 * @method     Shipment findOneByTransshipmentdate(string $transshipmentDate) Return the first Shipment filtered by the transshipmentDate column
 * @method     Shipment findOneByTelexrelease(int $telexRelease) Return the first Shipment filtered by the telexRelease column
 * @method     Shipment findOneByEstimatedarrivaldate(string $estimatedArrivalDate) Return the first Shipment filtered by the estimatedArrivalDate column
 * @method     Shipment findOneByArrivaldate(string $arrivalDate) Return the first Shipment filtered by the arrivalDate column
 *
 * @method     array findById(int $id) Return Shipment objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return Shipment objects filtered by the createdAt column
 * @method     array findBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return Shipment objects filtered by the supplierPurchaseOrderId column
 * @method     array findByContainersrealcount20(int $containersRealCount20) Return Shipment objects filtered by the containersRealCount20 column
 * @method     array findByContainersrealcount40(int $containersRealCount40) Return Shipment objects filtered by the containersRealCount40 column
 * @method     array findByContainersnumbers(string $containersNumbers) Return Shipment objects filtered by the containersNumbers column
 * @method     array findByPickupdate(string $pickupDate) Return Shipment objects filtered by the pickupDate column
 * @method     array findByShipmentdate(string $shipmentDate) Return Shipment objects filtered by the shipmentDate column
 * @method     array findByBlnumber(int $blNumber) Return Shipment objects filtered by the blNumber column
 * @method     array findByVesselname(string $vesselName) Return Shipment objects filtered by the vesselName column
 * @method     array findByEstimateddeparturedate(string $estimatedDepartureDate) Return Shipment objects filtered by the estimatedDepartureDate column
 * @method     array findByDeparturedate(string $departureDate) Return Shipment objects filtered by the departureDate column
 * @method     array findByArrivalportid(int $arrivalPortId) Return Shipment objects filtered by the arrivalPortId column
 * @method     array findByArrivaltopanamadate(string $arrivalToPanamaDate) Return Shipment objects filtered by the arrivalToPanamaDate column
 * @method     array findByTransshipmentdate(string $transshipmentDate) Return Shipment objects filtered by the transshipmentDate column
 * @method     array findByTelexrelease(int $telexRelease) Return Shipment objects filtered by the telexRelease column
 * @method     array findByEstimatedarrivaldate(string $estimatedArrivalDate) Return Shipment objects filtered by the estimatedArrivalDate column
 * @method     array findByArrivaldate(string $arrivalDate) Return Shipment objects filtered by the arrivalDate column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseShipmentQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShipmentQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Shipment', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShipmentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShipmentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShipmentQuery) {
			return $criteria;
		}
		$query = new ShipmentQuery();
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
	 * @return    Shipment|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShipmentPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShipmentPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShipmentPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShipmentPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(ShipmentPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(ShipmentPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the supplierPurchaseOrderId column
	 * 
	 * @param     int|array $supplierpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterBySupplierpurchaseorderid($supplierpurchaseorderid = null, $comparison = null)
	{
		if (is_array($supplierpurchaseorderid)) {
			$useMinMax = false;
			if (isset($supplierpurchaseorderid['min'])) {
				$this->addUsingAlias(ShipmentPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierpurchaseorderid['max'])) {
				$this->addUsingAlias(ShipmentPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the containersRealCount20 column
	 * 
	 * @param     int|array $containersrealcount20 The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByContainersrealcount20($containersrealcount20 = null, $comparison = null)
	{
		if (is_array($containersrealcount20)) {
			$useMinMax = false;
			if (isset($containersrealcount20['min'])) {
				$this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT20, $containersrealcount20['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($containersrealcount20['max'])) {
				$this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT20, $containersrealcount20['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT20, $containersrealcount20, $comparison);
	}

	/**
	 * Filter the query on the containersRealCount40 column
	 * 
	 * @param     int|array $containersrealcount40 The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByContainersrealcount40($containersrealcount40 = null, $comparison = null)
	{
		if (is_array($containersrealcount40)) {
			$useMinMax = false;
			if (isset($containersrealcount40['min'])) {
				$this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT40, $containersrealcount40['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($containersrealcount40['max'])) {
				$this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT40, $containersrealcount40['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::CONTAINERSREALCOUNT40, $containersrealcount40, $comparison);
	}

	/**
	 * Filter the query on the containersNumbers column
	 * 
	 * @param     string $containersnumbers The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByContainersnumbers($containersnumbers = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($containersnumbers)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $containersnumbers)) {
				$containersnumbers = str_replace('*', '%', $containersnumbers);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::CONTAINERSNUMBERS, $containersnumbers, $comparison);
	}

	/**
	 * Filter the query on the pickupDate column
	 * 
	 * @param     string|array $pickupdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByPickupdate($pickupdate = null, $comparison = null)
	{
		if (is_array($pickupdate)) {
			$useMinMax = false;
			if (isset($pickupdate['min'])) {
				$this->addUsingAlias(ShipmentPeer::PICKUPDATE, $pickupdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pickupdate['max'])) {
				$this->addUsingAlias(ShipmentPeer::PICKUPDATE, $pickupdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::PICKUPDATE, $pickupdate, $comparison);
	}

	/**
	 * Filter the query on the shipmentDate column
	 * 
	 * @param     string|array $shipmentdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByShipmentdate($shipmentdate = null, $comparison = null)
	{
		if (is_array($shipmentdate)) {
			$useMinMax = false;
			if (isset($shipmentdate['min'])) {
				$this->addUsingAlias(ShipmentPeer::SHIPMENTDATE, $shipmentdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($shipmentdate['max'])) {
				$this->addUsingAlias(ShipmentPeer::SHIPMENTDATE, $shipmentdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::SHIPMENTDATE, $shipmentdate, $comparison);
	}

	/**
	 * Filter the query on the blNumber column
	 * 
	 * @param     int|array $blnumber The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByBlnumber($blnumber = null, $comparison = null)
	{
		if (is_array($blnumber)) {
			$useMinMax = false;
			if (isset($blnumber['min'])) {
				$this->addUsingAlias(ShipmentPeer::BLNUMBER, $blnumber['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($blnumber['max'])) {
				$this->addUsingAlias(ShipmentPeer::BLNUMBER, $blnumber['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::BLNUMBER, $blnumber, $comparison);
	}

	/**
	 * Filter the query on the vesselName column
	 * 
	 * @param     string $vesselname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByVesselname($vesselname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($vesselname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $vesselname)) {
				$vesselname = str_replace('*', '%', $vesselname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::VESSELNAME, $vesselname, $comparison);
	}

	/**
	 * Filter the query on the estimatedDepartureDate column
	 * 
	 * @param     string|array $estimateddeparturedate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByEstimateddeparturedate($estimateddeparturedate = null, $comparison = null)
	{
		if (is_array($estimateddeparturedate)) {
			$useMinMax = false;
			if (isset($estimateddeparturedate['min'])) {
				$this->addUsingAlias(ShipmentPeer::ESTIMATEDDEPARTUREDATE, $estimateddeparturedate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estimateddeparturedate['max'])) {
				$this->addUsingAlias(ShipmentPeer::ESTIMATEDDEPARTUREDATE, $estimateddeparturedate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::ESTIMATEDDEPARTUREDATE, $estimateddeparturedate, $comparison);
	}

	/**
	 * Filter the query on the departureDate column
	 * 
	 * @param     string|array $departuredate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByDeparturedate($departuredate = null, $comparison = null)
	{
		if (is_array($departuredate)) {
			$useMinMax = false;
			if (isset($departuredate['min'])) {
				$this->addUsingAlias(ShipmentPeer::DEPARTUREDATE, $departuredate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($departuredate['max'])) {
				$this->addUsingAlias(ShipmentPeer::DEPARTUREDATE, $departuredate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::DEPARTUREDATE, $departuredate, $comparison);
	}

	/**
	 * Filter the query on the arrivalPortId column
	 * 
	 * @param     int|array $arrivalportid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByArrivalportid($arrivalportid = null, $comparison = null)
	{
		if (is_array($arrivalportid)) {
			$useMinMax = false;
			if (isset($arrivalportid['min'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALPORTID, $arrivalportid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($arrivalportid['max'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALPORTID, $arrivalportid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::ARRIVALPORTID, $arrivalportid, $comparison);
	}

	/**
	 * Filter the query on the arrivalToPanamaDate column
	 * 
	 * @param     string|array $arrivaltopanamadate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByArrivaltopanamadate($arrivaltopanamadate = null, $comparison = null)
	{
		if (is_array($arrivaltopanamadate)) {
			$useMinMax = false;
			if (isset($arrivaltopanamadate['min'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALTOPANAMADATE, $arrivaltopanamadate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($arrivaltopanamadate['max'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALTOPANAMADATE, $arrivaltopanamadate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::ARRIVALTOPANAMADATE, $arrivaltopanamadate, $comparison);
	}

	/**
	 * Filter the query on the transshipmentDate column
	 * 
	 * @param     string|array $transshipmentdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByTransshipmentdate($transshipmentdate = null, $comparison = null)
	{
		if (is_array($transshipmentdate)) {
			$useMinMax = false;
			if (isset($transshipmentdate['min'])) {
				$this->addUsingAlias(ShipmentPeer::TRANSSHIPMENTDATE, $transshipmentdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($transshipmentdate['max'])) {
				$this->addUsingAlias(ShipmentPeer::TRANSSHIPMENTDATE, $transshipmentdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::TRANSSHIPMENTDATE, $transshipmentdate, $comparison);
	}

	/**
	 * Filter the query on the telexRelease column
	 * 
	 * @param     int|array $telexrelease The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByTelexrelease($telexrelease = null, $comparison = null)
	{
		if (is_array($telexrelease)) {
			$useMinMax = false;
			if (isset($telexrelease['min'])) {
				$this->addUsingAlias(ShipmentPeer::TELEXRELEASE, $telexrelease['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($telexrelease['max'])) {
				$this->addUsingAlias(ShipmentPeer::TELEXRELEASE, $telexrelease['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::TELEXRELEASE, $telexrelease, $comparison);
	}

	/**
	 * Filter the query on the estimatedArrivalDate column
	 * 
	 * @param     string|array $estimatedarrivaldate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByEstimatedarrivaldate($estimatedarrivaldate = null, $comparison = null)
	{
		if (is_array($estimatedarrivaldate)) {
			$useMinMax = false;
			if (isset($estimatedarrivaldate['min'])) {
				$this->addUsingAlias(ShipmentPeer::ESTIMATEDARRIVALDATE, $estimatedarrivaldate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estimatedarrivaldate['max'])) {
				$this->addUsingAlias(ShipmentPeer::ESTIMATEDARRIVALDATE, $estimatedarrivaldate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::ESTIMATEDARRIVALDATE, $estimatedarrivaldate, $comparison);
	}

	/**
	 * Filter the query on the arrivalDate column
	 * 
	 * @param     string|array $arrivaldate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByArrivaldate($arrivaldate = null, $comparison = null)
	{
		if (is_array($arrivaldate)) {
			$useMinMax = false;
			if (isset($arrivaldate['min'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALDATE, $arrivaldate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($arrivaldate['max'])) {
				$this->addUsingAlias(ShipmentPeer::ARRIVALDATE, $arrivaldate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::ARRIVALDATE, $arrivaldate, $comparison);
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentPeer::SUPPLIERPURCHASEORDERID, $supplierPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
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
	 * Filter the query by a related Port object
	 *
	 * @param     Port $port  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByPort($port, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentPeer::ARRIVALPORTID, $port->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Port relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function joinPort($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function usePortQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPort($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Port', 'PortQuery');
	}

	/**
	 * Filter the query by a related ShipmentRelease object
	 *
	 * @param     ShipmentRelease $shipmentRelease  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByShipmentRelease($shipmentRelease, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentPeer::ID, $shipmentRelease->getShipmentid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ShipmentRelease relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function joinShipmentRelease($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShipmentRelease');
		
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
			$this->addJoinObject($join, 'ShipmentRelease');
		}
		
		return $this;
	}

	/**
	 * Use the ShipmentRelease relation ShipmentRelease object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentReleaseQuery A secondary query class using the current class as primary query
	 */
	public function useShipmentReleaseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShipmentRelease($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShipmentRelease', 'ShipmentReleaseQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Shipment $shipment Object to remove from the list of results
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function prune($shipment = null)
	{
		if ($shipment) {
			$this->addUsingAlias(ShipmentPeer::ID, $shipment->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseShipmentQuery
