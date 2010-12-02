<?php


/**
 * Base class that represents a query for the 'import_clientPurchaseOrder' table.
 *
 * Orden de Pedido a Cliente
 *
 * @method     ClientPurchaseOrderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientPurchaseOrderQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     ClientPurchaseOrderQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ClientPurchaseOrderQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 * @method     ClientPurchaseOrderQuery orderByClientquoteid($order = Criteria::ASC) Order by the clientQuoteId column
 * @method     ClientPurchaseOrderQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     ClientPurchaseOrderQuery orderByAffiliateuserid($order = Criteria::ASC) Order by the affiliateUserId column
 * @method     ClientPurchaseOrderQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 *
 * @method     ClientPurchaseOrderQuery groupById() Group by the id column
 * @method     ClientPurchaseOrderQuery groupByCreatedat() Group by the createdAt column
 * @method     ClientPurchaseOrderQuery groupByStatus() Group by the status column
 * @method     ClientPurchaseOrderQuery groupByTimestampstatus() Group by the timestampStatus column
 * @method     ClientPurchaseOrderQuery groupByClientquoteid() Group by the clientQuoteId column
 * @method     ClientPurchaseOrderQuery groupByAffiliateid() Group by the affiliateId column
 * @method     ClientPurchaseOrderQuery groupByAffiliateuserid() Group by the affiliateUserId column
 * @method     ClientPurchaseOrderQuery groupByUserid() Group by the userId column
 *
 * @method     ClientPurchaseOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientPurchaseOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientPurchaseOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientPurchaseOrderQuery leftJoinClientQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuote relation
 * @method     ClientPurchaseOrderQuery rightJoinClientQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuote relation
 * @method     ClientPurchaseOrderQuery innerJoinClientQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuote relation
 *
 * @method     ClientPurchaseOrderQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ClientPurchaseOrderQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ClientPurchaseOrderQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ClientPurchaseOrderQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     ClientPurchaseOrderQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     ClientPurchaseOrderQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     ClientPurchaseOrderQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     ClientPurchaseOrderQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     ClientPurchaseOrderQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     ClientPurchaseOrderQuery leftJoinClientPurchaseOrderItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrderItem relation
 * @method     ClientPurchaseOrderQuery rightJoinClientPurchaseOrderItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrderItem relation
 * @method     ClientPurchaseOrderQuery innerJoinClientPurchaseOrderItem($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrderItem relation
 *
 * @method     ClientPurchaseOrderQuery leftJoinClientPurchaseOrderHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrderHistory relation
 * @method     ClientPurchaseOrderQuery rightJoinClientPurchaseOrderHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrderHistory relation
 * @method     ClientPurchaseOrderQuery innerJoinClientPurchaseOrderHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrderHistory relation
 *
 * @method     ClientPurchaseOrder findOne(PropelPDO $con = null) Return the first ClientPurchaseOrder matching the query
 * @method     ClientPurchaseOrder findOneOrCreate(PropelPDO $con = null) Return the first ClientPurchaseOrder matching the query, or a new ClientPurchaseOrder object populated from the query conditions when no match is found
 *
 * @method     ClientPurchaseOrder findOneById(int $id) Return the first ClientPurchaseOrder filtered by the id column
 * @method     ClientPurchaseOrder findOneByCreatedat(string $createdAt) Return the first ClientPurchaseOrder filtered by the createdAt column
 * @method     ClientPurchaseOrder findOneByStatus(int $status) Return the first ClientPurchaseOrder filtered by the status column
 * @method     ClientPurchaseOrder findOneByTimestampstatus(string $timestampStatus) Return the first ClientPurchaseOrder filtered by the timestampStatus column
 * @method     ClientPurchaseOrder findOneByClientquoteid(int $clientQuoteId) Return the first ClientPurchaseOrder filtered by the clientQuoteId column
 * @method     ClientPurchaseOrder findOneByAffiliateid(int $affiliateId) Return the first ClientPurchaseOrder filtered by the affiliateId column
 * @method     ClientPurchaseOrder findOneByAffiliateuserid(int $affiliateUserId) Return the first ClientPurchaseOrder filtered by the affiliateUserId column
 * @method     ClientPurchaseOrder findOneByUserid(int $userId) Return the first ClientPurchaseOrder filtered by the userId column
 *
 * @method     array findById(int $id) Return ClientPurchaseOrder objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return ClientPurchaseOrder objects filtered by the createdAt column
 * @method     array findByStatus(int $status) Return ClientPurchaseOrder objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return ClientPurchaseOrder objects filtered by the timestampStatus column
 * @method     array findByClientquoteid(int $clientQuoteId) Return ClientPurchaseOrder objects filtered by the clientQuoteId column
 * @method     array findByAffiliateid(int $affiliateId) Return ClientPurchaseOrder objects filtered by the affiliateId column
 * @method     array findByAffiliateuserid(int $affiliateUserId) Return ClientPurchaseOrder objects filtered by the affiliateUserId column
 * @method     array findByUserid(int $userId) Return ClientPurchaseOrder objects filtered by the userId column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientPurchaseOrderQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientPurchaseOrderQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientPurchaseOrder', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientPurchaseOrderQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientPurchaseOrderQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientPurchaseOrderQuery) {
			return $criteria;
		}
		$query = new ClientPurchaseOrderQuery();
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
	 * @return    ClientPurchaseOrder|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientPurchaseOrderPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientPurchaseOrderPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientPurchaseOrderPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
	}

	/**
	 * Filter the query on the clientQuoteId column
	 * 
	 * @param     int|array $clientquoteid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientquoteid($clientquoteid = null, $comparison = null)
	{
		if (is_array($clientquoteid)) {
			$useMinMax = false;
			if (isset($clientquoteid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientquoteid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::CLIENTQUOTEID, $clientquoteid, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the affiliateUserId column
	 * 
	 * @param     int|array $affiliateuserid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateuserid($affiliateuserid = null, $comparison = null)
	{
		if (is_array($affiliateuserid)) {
			$useMinMax = false;
			if (isset($affiliateuserid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateuserid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEUSERID, $affiliateuserid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(ClientPurchaseOrderPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientPurchaseOrderPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query by a related ClientQuote object
	 *
	 * @param     ClientQuote $clientQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientQuote($clientQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::CLIENTQUOTEID, $clientQuote->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::USERID, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
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
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
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
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::AFFILIATEUSERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
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
	 * Filter the query by a related ClientPurchaseOrderItem object
	 *
	 * @param     ClientPurchaseOrderItem $clientPurchaseOrderItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrderItem($clientPurchaseOrderItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::ID, $clientPurchaseOrderItem->getClientpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrderItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrderItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientPurchaseOrderItem');
		
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
			$this->addJoinObject($join, 'ClientPurchaseOrderItem');
		}
		
		return $this;
	}

	/**
	 * Use the ClientPurchaseOrderItem relation ClientPurchaseOrderItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderItemQuery A secondary query class using the current class as primary query
	 */
	public function useClientPurchaseOrderItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientPurchaseOrderItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientPurchaseOrderItem', 'ClientPurchaseOrderItemQuery');
	}

	/**
	 * Filter the query by a related ClientPurchaseOrderHistory object
	 *
	 * @param     ClientPurchaseOrderHistory $clientPurchaseOrderHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrderHistory($clientPurchaseOrderHistory, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientPurchaseOrderPeer::ID, $clientPurchaseOrderHistory->getClientpurchaseorderid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrderHistory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrderHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientPurchaseOrderHistory');
		
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
			$this->addJoinObject($join, 'ClientPurchaseOrderHistory');
		}
		
		return $this;
	}

	/**
	 * Use the ClientPurchaseOrderHistory relation ClientPurchaseOrderHistory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientPurchaseOrderHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useClientPurchaseOrderHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientPurchaseOrderHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientPurchaseOrderHistory', 'ClientPurchaseOrderHistoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClientPurchaseOrder $clientPurchaseOrder Object to remove from the list of results
	 *
	 * @return    ClientPurchaseOrderQuery The current query, for fluid interface
	 */
	public function prune($clientPurchaseOrder = null)
	{
		if ($clientPurchaseOrder) {
			$this->addUsingAlias(ClientPurchaseOrderPeer::ID, $clientPurchaseOrder->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientPurchaseOrderQuery
