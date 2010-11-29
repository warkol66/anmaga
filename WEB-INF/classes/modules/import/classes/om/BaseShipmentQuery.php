<?php


/**
 * Base class that represents a query for the 'import_shipment' table.
 *
 * Datos de envio
 *
 * @method     ShipmentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShipmentQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     ShipmentQuery orderBySupplierid($order = Criteria::ASC) Order by the supplierId column
 * @method     ShipmentQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ShipmentQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 * @method     ShipmentQuery orderBySupplierpurchaseorderid($order = Criteria::ASC) Order by the supplierPurchaseOrderId column
 * @method     ShipmentQuery orderByClientquoteid($order = Criteria::ASC) Order by the clientQuoteId column
 * @method     ShipmentQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 *
 * @method     ShipmentQuery groupById() Group by the id column
 * @method     ShipmentQuery groupByCreatedat() Group by the createdAt column
 * @method     ShipmentQuery groupBySupplierid() Group by the supplierId column
 * @method     ShipmentQuery groupByStatus() Group by the status column
 * @method     ShipmentQuery groupByTimestampstatus() Group by the timestampStatus column
 * @method     ShipmentQuery groupBySupplierpurchaseorderid() Group by the supplierPurchaseOrderId column
 * @method     ShipmentQuery groupByClientquoteid() Group by the clientQuoteId column
 * @method     ShipmentQuery groupByAffiliateid() Group by the affiliateId column
 *
 * @method     ShipmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShipmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShipmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShipmentQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ShipmentQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ShipmentQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     ShipmentQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     ShipmentQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     ShipmentQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     ShipmentQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     ShipmentQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     ShipmentQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
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
 * @method     Shipment findOneBySupplierid(int $supplierId) Return the first Shipment filtered by the supplierId column
 * @method     Shipment findOneByStatus(int $status) Return the first Shipment filtered by the status column
 * @method     Shipment findOneByTimestampstatus(string $timestampStatus) Return the first Shipment filtered by the timestampStatus column
 * @method     Shipment findOneBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return the first Shipment filtered by the supplierPurchaseOrderId column
 * @method     Shipment findOneByClientquoteid(int $clientQuoteId) Return the first Shipment filtered by the clientQuoteId column
 * @method     Shipment findOneByAffiliateid(int $affiliateId) Return the first Shipment filtered by the affiliateId column
 *
 * @method     array findById(int $id) Return Shipment objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return Shipment objects filtered by the createdAt column
 * @method     array findBySupplierid(int $supplierId) Return Shipment objects filtered by the supplierId column
 * @method     array findByStatus(int $status) Return Shipment objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return Shipment objects filtered by the timestampStatus column
 * @method     array findBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return Shipment objects filtered by the supplierPurchaseOrderId column
 * @method     array findByClientquoteid(int $clientQuoteId) Return Shipment objects filtered by the clientQuoteId column
 * @method     array findByAffiliateid(int $affiliateId) Return Shipment objects filtered by the affiliateId column
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
	 * Filter the query on the supplierId column
	 * 
	 * @param     int|array $supplierid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterBySupplierid($supplierid = null, $comparison = null)
	{
		if (is_array($supplierid)) {
			$useMinMax = false;
			if (isset($supplierid['min'])) {
				$this->addUsingAlias(ShipmentPeer::SUPPLIERID, $supplierid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierid['max'])) {
				$this->addUsingAlias(ShipmentPeer::SUPPLIERID, $supplierid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::SUPPLIERID, $supplierid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ShipmentPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ShipmentPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(ShipmentPeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(ShipmentPeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
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
	 * Filter the query on the clientQuoteId column
	 * 
	 * @param     int|array $clientquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByClientquoteid($clientquoteid = null, $comparison = null)
	{
		if (is_array($clientquoteid)) {
			$useMinMax = false;
			if (isset($clientquoteid['min'])) {
				$this->addUsingAlias(ShipmentPeer::CLIENTQUOTEID, $clientquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteid['max'])) {
				$this->addUsingAlias(ShipmentPeer::CLIENTQUOTEID, $clientquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::CLIENTQUOTEID, $clientquoteid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(ShipmentPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(ShipmentPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShipmentPeer::AFFILIATEID, $affiliateid, $comparison);
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
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentPeer::SUPPLIERID, $supplier->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function joinSupplier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useSupplierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplier($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Supplier', 'SupplierQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(ShipmentPeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShipmentQuery The current query, for fluid interface
	 */
	public function joinAffiliate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Affiliate');
		
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
			$this->addJoinObject($join, 'Affiliate');
		}
		
		return $this;
	}

	/**
	 * Use the Affiliate relation Affiliate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Affiliate', 'AffiliateQuery');
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
