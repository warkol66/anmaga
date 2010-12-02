<?php


/**
 * Base class that represents a query for the 'import_supplierPurchaseOrder' table.
 *
 * Orden de Pedido a Proveedor
 *
 * @method     SupplierPurchaseOrderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierPurchaseOrderQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     SupplierPurchaseOrderQuery orderBySupplierid($order = Criteria::ASC) Order by the supplierId column
 * @method     SupplierPurchaseOrderQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SupplierPurchaseOrderQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 * @method     SupplierPurchaseOrderQuery orderBySupplierquoteid($order = Criteria::ASC) Order by the supplierQuoteId column
 * @method     SupplierPurchaseOrderQuery orderByClientquoteid($order = Criteria::ASC) Order by the clientQuoteId column
 * @method     SupplierPurchaseOrderQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     SupplierPurchaseOrderQuery orderByAffiliateuserid($order = Criteria::ASC) Order by the affiliateUserId column
 * @method     SupplierPurchaseOrderQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 *
 * @method     SupplierPurchaseOrderQuery groupById() Group by the id column
 * @method     SupplierPurchaseOrderQuery groupByCreatedat() Group by the createdAt column
 * @method     SupplierPurchaseOrderQuery groupBySupplierid() Group by the supplierId column
 * @method     SupplierPurchaseOrderQuery groupByStatus() Group by the status column
 * @method     SupplierPurchaseOrderQuery groupByTimestampstatus() Group by the timestampStatus column
 * @method     SupplierPurchaseOrderQuery groupBySupplierquoteid() Group by the supplierQuoteId column
 * @method     SupplierPurchaseOrderQuery groupByClientquoteid() Group by the clientQuoteId column
 * @method     SupplierPurchaseOrderQuery groupByAffiliateid() Group by the affiliateId column
 * @method     SupplierPurchaseOrderQuery groupByAffiliateuserid() Group by the affiliateUserId column
 * @method     SupplierPurchaseOrderQuery groupByUserid() Group by the userId column
 *
 * @method     SupplierPurchaseOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierPurchaseOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierPurchaseOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierPurchaseOrderQuery leftJoinSupplierQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierPurchaseOrderQuery rightJoinSupplierQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierPurchaseOrderQuery innerJoinSupplierQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuote relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinClientQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuote relation
 * @method     SupplierPurchaseOrderQuery rightJoinClientQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuote relation
 * @method     SupplierPurchaseOrderQuery innerJoinClientQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuote relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     SupplierPurchaseOrderQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     SupplierPurchaseOrderQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     SupplierPurchaseOrderQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     SupplierPurchaseOrderQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     SupplierPurchaseOrderQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     SupplierPurchaseOrderQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     SupplierPurchaseOrderQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     SupplierPurchaseOrderQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     SupplierPurchaseOrderQuery rightJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderItem relation
 * @method     SupplierPurchaseOrderQuery innerJoinSupplierPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderItem relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinSupplierPurchaseOrderHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderHistory relation
 * @method     SupplierPurchaseOrderQuery rightJoinSupplierPurchaseOrderHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderHistory relation
 * @method     SupplierPurchaseOrderQuery innerJoinSupplierPurchaseOrderHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderHistory relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 * @method     SupplierPurchaseOrderQuery rightJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 * @method     SupplierPurchaseOrderQuery innerJoinSupplierPurchaseOrderBankTransfer($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
 *
 * @method     SupplierPurchaseOrderQuery leftJoinShipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipment relation
 * @method     SupplierPurchaseOrderQuery rightJoinShipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipment relation
 * @method     SupplierPurchaseOrderQuery innerJoinShipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipment relation
 *
 * @method     SupplierPurchaseOrder findOne(PropelPDO $con = null) Return the first SupplierPurchaseOrder matching the query
 * @method     SupplierPurchaseOrder findOneOrCreate(PropelPDO $con = null) Return the first SupplierPurchaseOrder matching the query, or a new SupplierPurchaseOrder object populated from the query conditions when no match is found
 *
 * @method     SupplierPurchaseOrder findOneById(int $id) Return the first SupplierPurchaseOrder filtered by the id column
 * @method     SupplierPurchaseOrder findOneByCreatedat(string $createdAt) Return the first SupplierPurchaseOrder filtered by the createdAt column
 * @method     SupplierPurchaseOrder findOneBySupplierid(int $supplierId) Return the first SupplierPurchaseOrder filtered by the supplierId column
 * @method     SupplierPurchaseOrder findOneByStatus(int $status) Return the first SupplierPurchaseOrder filtered by the status column
 * @method     SupplierPurchaseOrder findOneByTimestampstatus(string $timestampStatus) Return the first SupplierPurchaseOrder filtered by the timestampStatus column
 * @method     SupplierPurchaseOrder findOneBySupplierquoteid(int $supplierQuoteId) Return the first SupplierPurchaseOrder filtered by the supplierQuoteId column
 * @method     SupplierPurchaseOrder findOneByClientquoteid(int $clientQuoteId) Return the first SupplierPurchaseOrder filtered by the clientQuoteId column
 * @method     SupplierPurchaseOrder findOneByAffiliateid(int $affiliateId) Return the first SupplierPurchaseOrder filtered by the affiliateId column
 * @method     SupplierPurchaseOrder findOneByAffiliateuserid(int $affiliateUserId) Return the first SupplierPurchaseOrder filtered by the affiliateUserId column
 * @method     SupplierPurchaseOrder findOneByUserid(int $userId) Return the first SupplierPurchaseOrder filtered by the userId column
 *
 * @method     array findById(int $id) Return SupplierPurchaseOrder objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return SupplierPurchaseOrder objects filtered by the createdAt column
 * @method     array findBySupplierid(int $supplierId) Return SupplierPurchaseOrder objects filtered by the supplierId column
 * @method     array findByStatus(int $status) Return SupplierPurchaseOrder objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return SupplierPurchaseOrder objects filtered by the timestampStatus column
 * @method     array findBySupplierquoteid(int $supplierQuoteId) Return SupplierPurchaseOrder objects filtered by the supplierQuoteId column
 * @method     array findByClientquoteid(int $clientQuoteId) Return SupplierPurchaseOrder objects filtered by the clientQuoteId column
 * @method     array findByAffiliateid(int $affiliateId) Return SupplierPurchaseOrder objects filtered by the affiliateId column
 * @method     array findByAffiliateuserid(int $affiliateUserId) Return SupplierPurchaseOrder objects filtered by the affiliateUserId column
 * @method     array findByUserid(int $userId) Return SupplierPurchaseOrder objects filtered by the userId column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierPurchaseOrderQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierPurchaseOrder', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierPurchaseOrderQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierPurchaseOrderQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierPurchaseOrderQuery) {
			return $criteria;
		}
		$query = new SupplierPurchaseOrderQuery();
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
	 * @return    SupplierPurchaseOrder|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierPurchaseOrderPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the supplierId column
	 * 
	 * @param     int|array $supplierid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierid($supplierid = null, $comparison = null)
	{
		if (is_array($supplierid)) {
			$useMinMax = false;
			if (isset($supplierid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERID, $supplierid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERID, $supplierid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERID, $supplierid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
	}

	/**
	 * Filter the query on the supplierQuoteId column
	 * 
	 * @param     int|array $supplierquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierquoteid($supplierquoteid = null, $comparison = null)
	{
		if (is_array($supplierquoteid)) {
			$useMinMax = false;
			if (isset($supplierquoteid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, $supplierquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierquoteid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, $supplierquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, $supplierquoteid, $comparison);
	}

	/**
	 * Filter the query on the clientQuoteId column
	 * 
	 * @param     int|array $clientquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientquoteid($clientquoteid = null, $comparison = null)
	{
		if (is_array($clientquoteid)) {
			$useMinMax = false;
			if (isset($clientquoteid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the affiliateUserId column
	 * 
	 * @param     int|array $affiliateuserid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateuserid($affiliateuserid = null, $comparison = null)
	{
		if (is_array($affiliateuserid)) {
			$useMinMax = false;
			if (isset($affiliateuserid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateuserid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query by a related SupplierQuote object
	 *
	 * @param     SupplierQuote $supplierQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuote($supplierQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERQUOTEID, $supplierQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related ClientQuote object
	 *
	 * @param     ClientQuote $clientQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientQuote($clientQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::CLIENTQUOTEID, $clientQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinClientQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientQuote');
		
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
			$this->addJoinObject($join, 'ClientQuote');
		}
		
		return $this;
	}

	/**
	 * Use the ClientQuote relation ClientQuote object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientQuote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientQuote', 'ClientQuoteQuery');
	}

	/**
	 * Filter the query by a related Supplier object
	 *
	 * @param     Supplier $supplier  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::SUPPLIERID, $supplier->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::USERID, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser $affiliateUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::AFFILIATEUSERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinAffiliateUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUser');
		
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
			$this->addJoinObject($join, 'AffiliateUser');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUser relation AffiliateUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAffiliateUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUser', 'AffiliateUserQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrderItem object
	 *
	 * @param     SupplierPurchaseOrderItem $supplierPurchaseOrderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderItem($supplierPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::ID, $supplierPurchaseOrderItem->getSupplierpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related SupplierPurchaseOrderHistory object
	 *
	 * @param     SupplierPurchaseOrderHistory $supplierPurchaseOrderHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderHistory($supplierPurchaseOrderHistory, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::ID, $supplierPurchaseOrderHistory->getSupplierpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderHistory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrderHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrderHistory');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrderHistory');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrderHistory relation SupplierPurchaseOrderHistory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrderHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrderHistory', 'SupplierPurchaseOrderHistoryQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrderBankTransfer object
	 *
	 * @param     SupplierPurchaseOrderBankTransfer $supplierPurchaseOrderBankTransfer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrderBankTransfer($supplierPurchaseOrderBankTransfer, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::ID, $supplierPurchaseOrderBankTransfer->getSupplierpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrderBankTransfer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrderBankTransfer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierPurchaseOrderBankTransfer');
		
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
			$this->addJoinObject($join, 'SupplierPurchaseOrderBankTransfer');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierPurchaseOrderBankTransfer relation SupplierPurchaseOrderBankTransfer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderBankTransferQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierPurchaseOrderBankTransferQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrderBankTransfer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrderBankTransfer', 'SupplierPurchaseOrderBankTransferQuery');
	}

	/**
	 * Filter the query by a related Shipment object
	 *
	 * @param     Shipment $shipment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByShipment($shipment, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderPeer::ID, $shipment->getSupplierpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Shipment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
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
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder Object to remove from the list of results
	 *
	 * @return    SupplierPurchaseOrderQuery The current query, for fluid interface
	 */
	public function prune($supplierPurchaseOrder = null)
	{
		if ($supplierPurchaseOrder) {
			$this->addUsingAlias(SupplierPurchaseOrderPeer::ID, $supplierPurchaseOrder->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierPurchaseOrderQuery
