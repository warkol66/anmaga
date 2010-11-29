<?php


/**
 * Base class that represents a query for the 'import_supplierQuoteHistory' table.
 *
 * Historial de Cotizacion a Proveedor
 *
 * @method     SupplierQuoteHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierQuoteHistoryQuery orderBySupplierquoteid($order = Criteria::ASC) Order by the supplierQuoteId column
 * @method     SupplierQuoteHistoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SupplierQuoteHistoryQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 *
 * @method     SupplierQuoteHistoryQuery groupById() Group by the id column
 * @method     SupplierQuoteHistoryQuery groupBySupplierquoteid() Group by the supplierQuoteId column
 * @method     SupplierQuoteHistoryQuery groupByStatus() Group by the status column
 * @method     SupplierQuoteHistoryQuery groupByCreatedat() Group by the createdAt column
 *
 * @method     SupplierQuoteHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierQuoteHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierQuoteHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierQuoteHistoryQuery leftJoinSupplierQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuoteHistoryQuery rightJoinSupplierQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuote relation
 * @method     SupplierQuoteHistoryQuery innerJoinSupplierQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuote relation
 *
 * @method     SupplierQuoteHistory findOne(PropelPDO $con = null) Return the first SupplierQuoteHistory matching the query
 * @method     SupplierQuoteHistory findOneOrCreate(PropelPDO $con = null) Return the first SupplierQuoteHistory matching the query, or a new SupplierQuoteHistory object populated from the query conditions when no match is found
 *
 * @method     SupplierQuoteHistory findOneById(int $id) Return the first SupplierQuoteHistory filtered by the id column
 * @method     SupplierQuoteHistory findOneBySupplierquoteid(int $supplierQuoteId) Return the first SupplierQuoteHistory filtered by the supplierQuoteId column
 * @method     SupplierQuoteHistory findOneByStatus(int $status) Return the first SupplierQuoteHistory filtered by the status column
 * @method     SupplierQuoteHistory findOneByCreatedat(string $createdAt) Return the first SupplierQuoteHistory filtered by the createdAt column
 *
 * @method     array findById(int $id) Return SupplierQuoteHistory objects filtered by the id column
 * @method     array findBySupplierquoteid(int $supplierQuoteId) Return SupplierQuoteHistory objects filtered by the supplierQuoteId column
 * @method     array findByStatus(int $status) Return SupplierQuoteHistory objects filtered by the status column
 * @method     array findByCreatedat(string $createdAt) Return SupplierQuoteHistory objects filtered by the createdAt column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierQuoteHistoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierQuoteHistoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierQuoteHistory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierQuoteHistoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierQuoteHistoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierQuoteHistoryQuery) {
			return $criteria;
		}
		$query = new SupplierQuoteHistoryQuery();
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
	 * @return    SupplierQuoteHistory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierQuoteHistoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the supplierQuoteId column
	 * 
	 * @param     int|array $supplierquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterBySupplierquoteid($supplierquoteid = null, $comparison = null)
	{
		if (is_array($supplierquoteid)) {
			$useMinMax = false;
			if (isset($supplierquoteid['min'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::SUPPLIERQUOTEID, $supplierquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierquoteid['max'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::SUPPLIERQUOTEID, $supplierquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::SUPPLIERQUOTEID, $supplierquoteid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierQuoteHistoryPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierQuoteHistoryPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query by a related SupplierQuote object
	 *
	 * @param     SupplierQuote $supplierQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuote($supplierQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierQuoteHistoryPeer::SUPPLIERQUOTEID, $supplierQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     SupplierQuoteHistory $supplierQuoteHistory Object to remove from the list of results
	 *
	 * @return    SupplierQuoteHistoryQuery The current query, for fluid interface
	 */
	public function prune($supplierQuoteHistory = null)
	{
		if ($supplierQuoteHistory) {
			$this->addUsingAlias(SupplierQuoteHistoryPeer::ID, $supplierQuoteHistory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierQuoteHistoryQuery
