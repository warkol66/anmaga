<?php


/**
 * Base class that represents a query for the 'import_clientPurchaseOrderHistory' table.
 *
 * Historial de Estados por los que fue pasando la Orden de Pedido a Cliente
 *
 * @method     ClientPurchaseOrderHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientPurchaseOrderHistoryQuery orderByClientpurchaseorderid($order = Criteria::ASC) Order by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderHistoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ClientPurchaseOrderHistoryQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 *
 * @method     ClientPurchaseOrderHistoryQuery groupById() Group by the id column
 * @method     ClientPurchaseOrderHistoryQuery groupByClientpurchaseorderid() Group by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderHistoryQuery groupByStatus() Group by the status column
 * @method     ClientPurchaseOrderHistoryQuery groupByCreatedat() Group by the createdAt column
 *
 * @method     ClientPurchaseOrderHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientPurchaseOrderHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientPurchaseOrderHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientPurchaseOrderHistoryQuery leftJoinClientPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientPurchaseOrderHistoryQuery rightJoinClientPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientPurchaseOrderHistoryQuery innerJoinClientPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrder relation
 *
 * @method     ClientPurchaseOrderHistory findOne(PropelPDO $con = null) Return the first ClientPurchaseOrderHistory matching the query
 * @method     ClientPurchaseOrderHistory findOneOrCreate(PropelPDO $con = null) Return the first ClientPurchaseOrderHistory matching the query, or a new ClientPurchaseOrderHistory object populated from the query conditions when no match is found
 *
 * @method     ClientPurchaseOrderHistory findOneById(int $id) Return the first ClientPurchaseOrderHistory filtered by the id column
 * @method     ClientPurchaseOrderHistory findOneByClientpurchaseorderid(int $clientPurchaseOrderId) Return the first ClientPurchaseOrderHistory filtered by the clientPurchaseOrderId column
 * @method     ClientPurchaseOrderHistory findOneByStatus(int $status) Return the first ClientPurchaseOrderHistory filtered by the status column
 * @method     ClientPurchaseOrderHistory findOneByCreatedat(string $createdAt) Return the first ClientPurchaseOrderHistory filtered by the createdAt column
 *
 * @method     array findById(int $id) Return ClientPurchaseOrderHistory objects filtered by the id column
 * @method     array findByClientpurchaseorderid(int $clientPurchaseOrderId) Return ClientPurchaseOrderHistory objects filtered by the clientPurchaseOrderId column
 * @method     array findByStatus(int $status) Return ClientPurchaseOrderHistory objects filtered by the status column
 * @method     array findByCreatedat(string $createdAt) Return ClientPurchaseOrderHistory objects filtered by the createdAt column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientPurchaseOrderHistoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientPurchaseOrderHistoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientPurchaseOrderHistory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientPurchaseOrderHistoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientPurchaseOrderHistoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientPurchaseOrderHistoryQuery) {
			return $criteria;
		}
		$query = new ClientPurchaseOrderHistoryQuery();
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
	 * @return    ClientPurchaseOrderHistory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientPurchaseOrderHistoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the clientPurchaseOrderId column
	 * 
	 * @param     int|array $clientpurchaseorderid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByClientpurchaseorderid($clientpurchaseorderid = null, $comparison = null)
	{
		if (is_array($clientpurchaseorderid)) {
			$useMinMax = false;
			if (isset($clientpurchaseorderid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientpurchaseorderid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CLIENTPURCHASEORDERID, $clientpurchaseorderid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderHistoryPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query by a related ClientPurchaseOrder object
	 *
	 * @param     ClientPurchaseOrder $clientPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrder($clientPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderHistoryPeer::CLIENTPURCHASEORDERID, $clientPurchaseOrder->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientPurchaseOrder');
		
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
			$this->addJoinObject($join, 'ClientPurchaseOrder');
		}
		
		return $this;
	}

	/**
	 * Use the ClientPurchaseOrder relation ClientPurchaseOrder object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery A secondary query class using the current class as primary query
	 */
	public function useClientPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientPurchaseOrder', 'ClientPurchaseOrderQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClientPurchaseOrderHistory $clientPurchaseOrderHistory Object to remove from the list of results
	 *
	 * @return    ClientPurchaseOrderHistoryQuery The current query, for fluid interface
	 */
	public function prune($clientPurchaseOrderHistory = null)
	{
		if ($clientPurchaseOrderHistory) {
			$this->addUsingAlias(ClientPurchaseOrderHistoryPeer::ID, $clientPurchaseOrderHistory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientPurchaseOrderHistoryQuery
