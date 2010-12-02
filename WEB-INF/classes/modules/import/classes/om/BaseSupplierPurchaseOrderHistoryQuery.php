<?php


/**
 * Base class that represents a query for the 'import_supplierPurchaseOrderHistory' table.
 *
 * Historial de Estados por los que fue pasando la Orden de Pedido a Proveedor
 *
 * @method     SupplierPurchaseOrderHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SupplierPurchaseOrderHistoryQuery orderBySupplierpurchaseorderid($order = Criteria::ASC) Order by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderHistoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     SupplierPurchaseOrderHistoryQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     SupplierPurchaseOrderHistoryQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 *
 * @method     SupplierPurchaseOrderHistoryQuery groupById() Group by the id column
 * @method     SupplierPurchaseOrderHistoryQuery groupBySupplierpurchaseorderid() Group by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderHistoryQuery groupByStatus() Group by the status column
 * @method     SupplierPurchaseOrderHistoryQuery groupByComments() Group by the comments column
 * @method     SupplierPurchaseOrderHistoryQuery groupByCreatedat() Group by the createdAt column
 *
 * @method     SupplierPurchaseOrderHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SupplierPurchaseOrderHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SupplierPurchaseOrderHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SupplierPurchaseOrderHistoryQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderHistoryQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     SupplierPurchaseOrderHistoryQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     SupplierPurchaseOrderHistory findOne(PropelPDO $con = null) Return the first SupplierPurchaseOrderHistory matching the query
 * @method     SupplierPurchaseOrderHistory findOneOrCreate(PropelPDO $con = null) Return the first SupplierPurchaseOrderHistory matching the query, or a new SupplierPurchaseOrderHistory object populated from the query conditions when no match is found
 *
 * @method     SupplierPurchaseOrderHistory findOneById(int $id) Return the first SupplierPurchaseOrderHistory filtered by the id column
 * @method     SupplierPurchaseOrderHistory findOneBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return the first SupplierPurchaseOrderHistory filtered by the supplierPurchaseOrderId column
 * @method     SupplierPurchaseOrderHistory findOneByStatus(int $status) Return the first SupplierPurchaseOrderHistory filtered by the status column
 * @method     SupplierPurchaseOrderHistory findOneByComments(string $comments) Return the first SupplierPurchaseOrderHistory filtered by the comments column
 * @method     SupplierPurchaseOrderHistory findOneByCreatedat(string $createdAt) Return the first SupplierPurchaseOrderHistory filtered by the createdAt column
 *
 * @method     array findById(int $id) Return SupplierPurchaseOrderHistory objects filtered by the id column
 * @method     array findBySupplierpurchaseorderid(int $supplierPurchaseOrderId) Return SupplierPurchaseOrderHistory objects filtered by the supplierPurchaseOrderId column
 * @method     array findByStatus(int $status) Return SupplierPurchaseOrderHistory objects filtered by the status column
 * @method     array findByComments(string $comments) Return SupplierPurchaseOrderHistory objects filtered by the comments column
 * @method     array findByCreatedat(string $createdAt) Return SupplierPurchaseOrderHistory objects filtered by the createdAt column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseSupplierPurchaseOrderHistoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSupplierPurchaseOrderHistoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SupplierPurchaseOrderHistory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SupplierPurchaseOrderHistoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SupplierPurchaseOrderHistoryQuery) {
			return $criteria;
		}
		$query = new SupplierPurchaseOrderHistoryQuery();
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
	 * @return    SupplierPurchaseOrderHistory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SupplierPurchaseOrderHistoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the supplierPurchaseOrderId column
	 * 
	 * @param     int|array $supplierpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterBySupplierpurchaseorderid($supplierpurchaseorderid = null, $comparison = null)
	{
		if (is_array($supplierpurchaseorderid)) {
			$useMinMax = false;
			if (isset($supplierpurchaseorderid['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($supplierpurchaseorderid['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::SUPPLIERPURCHASEORDERID, $supplierpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(SupplierPurchaseOrderHistoryPeer::SUPPLIERPURCHASEORDERID, $supplierPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
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
	 * @param     SupplierPurchaseOrderHistory $supplierPurchaseOrderHistory Object to remove from the list of results
	 *
	 * @return    SupplierPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function prune($supplierPurchaseOrderHistory = null)
	{
		if ($supplierPurchaseOrderHistory) {
			$this->addUsingAlias(SupplierPurchaseOrderHistoryPeer::ID, $supplierPurchaseOrderHistory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSupplierPurchaseOrderHistoryQuery
