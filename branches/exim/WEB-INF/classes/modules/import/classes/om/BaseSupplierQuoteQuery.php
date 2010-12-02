<?php


/**
 * Base class that represents a query for the 'import_supplierQuote' table.
 *
 * Cotizacion de Proveedor
 *
 * @method     SupplierQuoteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierQuoteQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     SupplierQuoteQuery orderBySupplierid($order = Criteria::ASC) Order by the supplierId column
 * @method     SupplierQuoteQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SupplierQuoteQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 * @method     SupplierQuoteQuery orderByClientquoteid($order = Criteria::ASC) Order by the clientQuoteId column
 * @method     SupplierQuoteQuery orderBySupplieraccesstoken($order = Criteria::ASC) Order by the supplierAccessToken column
 *
 * @method     SupplierQuoteQuery groupById() Group by the id column
 * @method     SupplierQuoteQuery groupByCreatedat() Group by the createdAt column
 * @method     SupplierQuoteQuery groupBySupplierid() Group by the supplierId column
 * @method     SupplierQuoteQuery groupByStatus() Group by the status column
 * @method     SupplierQuoteQuery groupByTimestampstatus() Group by the timestampStatus column
 * @method     SupplierQuoteQuery groupByClientquoteid() Group by the clientQuoteId column
 * @method     SupplierQuoteQuery groupBySupplieraccesstoken() Group by the supplierAccessToken column
 *
 * @method     SupplierQuoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierQuoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierQuoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierQuoteQuery leftJoinClientQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuote relation
 * @method     SupplierQuoteQuery rightJoinClientQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuote relation
 * @method     SupplierQuoteQuery innerJoinClientQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuote relation
 *
 * @method     SupplierQuoteQuery leftJoinSupplier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Supplier relation
 * @method     SupplierQuoteQuery rightJoinSupplier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Supplier relation
 * @method     SupplierQuoteQuery innerJoinSupplier($relationAlias = null) Adds a INNER JOIN clause to the query using the Supplier relation
 *
 * @method     SupplierQuoteQuery leftJoinSupplierQuoteHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteHistory relation
 * @method     SupplierQuoteQuery rightJoinSupplierQuoteHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteHistory relation
 * @method     SupplierQuoteQuery innerJoinSupplierQuoteHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteHistory relation
 *
 * @method     SupplierQuoteQuery leftJoinSupplierQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     SupplierQuoteQuery rightJoinSupplierQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItem relation
 * @method     SupplierQuoteQuery innerJoinSupplierQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItem relation
 *
 * @method     SupplierQuoteQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierQuoteQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierQuoteQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     SupplierQuote findOne(PropelPDO $con = null) Return the first SupplierQuote matching the query
 * @method     SupplierQuote findOneOrCreate(PropelPDO $con = null) Return the first SupplierQuote matching the query, or a new SupplierQuote object populated from the query conditions when no match is found
 *
 * @method     SupplierQuote findOneById(int $id) Return the first SupplierQuote filtered by the id column
 * @method     SupplierQuote findOneByCreatedat(string $createdAt) Return the first SupplierQuote filtered by the createdAt column
 * @method     SupplierQuote findOneBySupplierid(int $supplierId) Return the first SupplierQuote filtered by the supplierId column
 * @method     SupplierQuote findOneByStatus(int $status) Return the first SupplierQuote filtered by the status column
 * @method     SupplierQuote findOneByTimestampstatus(string $timestampStatus) Return the first SupplierQuote filtered by the timestampStatus column
 * @method     SupplierQuote findOneByClientquoteid(int $clientQuoteId) Return the first SupplierQuote filtered by the clientQuoteId column
 * @method     SupplierQuote findOneBySupplieraccesstoken(string $supplierAccessToken) Return the first SupplierQuote filtered by the supplierAccessToken column
 *
 * @method     array findById(int $id) Return SupplierQuote objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return SupplierQuote objects filtered by the createdAt column
 * @method     array findBySupplierid(int $supplierId) Return SupplierQuote objects filtered by the supplierId column
 * @method     array findByStatus(int $status) Return SupplierQuote objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return SupplierQuote objects filtered by the timestampStatus column
 * @method     array findByClientquoteid(int $clientQuoteId) Return SupplierQuote objects filtered by the clientQuoteId column
 * @method     array findBySupplieraccesstoken(string $supplierAccessToken) Return SupplierQuote objects filtered by the supplierAccessToken column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierQuoteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierQuote', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierQuoteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierQuoteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierQuoteQuery) {
			return $criteria;
		}
		$query = new SupplierQuoteQuery();
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
	 * @return    SupplierQuote|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierQuotePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierQuotePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierQuotePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierQuotePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierQuotePeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierQuotePeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the supplierId column
	 * 
	 * @param     int|array $supplierid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierid($supplierid = null, $comparison = null)
	{
		if (is_array($supplierid)) {
			$useMinMax = false;
			if (isset($supplierid['min'])) {
				$this->addUsingAlias(SupplierQuotePeer::SUPPLIERID, $supplierid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierid['max'])) {
				$this->addUsingAlias(SupplierQuotePeer::SUPPLIERID, $supplierid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::SUPPLIERID, $supplierid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SupplierQuotePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SupplierQuotePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(SupplierQuotePeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(SupplierQuotePeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
	}

	/**
	 * Filter the query on the clientQuoteId column
	 * 
	 * @param     int|array $clientquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByClientquoteid($clientquoteid = null, $comparison = null)
	{
		if (is_array($clientquoteid)) {
			$useMinMax = false;
			if (isset($clientquoteid['min'])) {
				$this->addUsingAlias(SupplierQuotePeer::CLIENTQUOTEID, $clientquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteid['max'])) {
				$this->addUsingAlias(SupplierQuotePeer::CLIENTQUOTEID, $clientquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::CLIENTQUOTEID, $clientquoteid, $comparison);
	}

	/**
	 * Filter the query on the supplierAccessToken column
	 * 
	 * @param     string $supplieraccesstoken The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplieraccesstoken($supplieraccesstoken = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($supplieraccesstoken)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $supplieraccesstoken)) {
				$supplieraccesstoken = str_replace('*', '%', $supplieraccesstoken);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierQuotePeer::SUPPLIERACCESSTOKEN, $supplieraccesstoken, $comparison);
	}

	/**
	 * Filter the query by a related ClientQuote object
	 *
	 * @param     ClientQuote $clientQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterByClientQuote($clientQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuotePeer::CLIENTQUOTEID, $clientQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function joinClientQuote($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useClientQuoteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplier($supplier, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuotePeer::SUPPLIERID, $supplier->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Supplier relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
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
	 * Filter the query by a related SupplierQuoteHistory object
	 *
	 * @param     SupplierQuoteHistory $supplierQuoteHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteHistory($supplierQuoteHistory, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuotePeer::ID, $supplierQuoteHistory->getSupplierquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteHistory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteHistory');
		
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
			$this->addJoinObject($join, 'SupplierQuoteHistory');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteHistory relation SupplierQuoteHistory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteHistory', 'SupplierQuoteHistoryQuery');
	}

	/**
	 * Filter the query by a related SupplierQuoteItem object
	 *
	 * @param     SupplierQuoteItem $supplierQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItem($supplierQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuotePeer::ID, $supplierQuoteItem->getSupplierquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItem');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItem');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItem relation SupplierQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSupplierQuoteItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItem', 'SupplierQuoteItemQuery');
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuotePeer::ID, $supplierPurchaseOrder->getSupplierquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     SupplierQuote $supplierQuote Object to remove from the list of results
	 *
	 * @return    SupplierQuoteQuery The current query, for fluid interface
	 */
	public function prune($supplierQuote = null)
	{
		if ($supplierQuote) {
			$this->addUsingAlias(SupplierQuotePeer::ID, $supplierQuote->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierQuoteQuery
