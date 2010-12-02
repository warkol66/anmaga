<?php


/**
 * Base class that represents a query for the 'import_clientQuote' table.
 *
 * Cotizacion a Cliente
 *
 * @method     ClientQuoteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientQuoteQuery orderByCreatedat($order = Criteria::ASC) Order by the createdAt column
 * @method     ClientQuoteQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     ClientQuoteQuery orderByAffiliateuserid($order = Criteria::ASC) Order by the affiliateUserId column
 * @method     ClientQuoteQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     ClientQuoteQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ClientQuoteQuery orderByTimestampstatus($order = Criteria::ASC) Order by the timestampStatus column
 *
 * @method     ClientQuoteQuery groupById() Group by the id column
 * @method     ClientQuoteQuery groupByCreatedat() Group by the createdAt column
 * @method     ClientQuoteQuery groupByAffiliateid() Group by the affiliateId column
 * @method     ClientQuoteQuery groupByAffiliateuserid() Group by the affiliateUserId column
 * @method     ClientQuoteQuery groupByUserid() Group by the userId column
 * @method     ClientQuoteQuery groupByStatus() Group by the status column
 * @method     ClientQuoteQuery groupByTimestampstatus() Group by the timestampStatus column
 *
 * @method     ClientQuoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientQuoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientQuoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientQuoteQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ClientQuoteQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ClientQuoteQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ClientQuoteQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     ClientQuoteQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     ClientQuoteQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     ClientQuoteQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     ClientQuoteQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     ClientQuoteQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     ClientQuoteQuery leftJoinClientQuoteHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuoteHistory relation
 * @method     ClientQuoteQuery rightJoinClientQuoteHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuoteHistory relation
 * @method     ClientQuoteQuery innerJoinClientQuoteHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuoteHistory relation
 *
 * @method     ClientQuoteQuery leftJoinClientQuoteItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuoteItem relation
 * @method     ClientQuoteQuery rightJoinClientQuoteItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuoteItem relation
 * @method     ClientQuoteQuery innerJoinClientQuoteItem($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuoteItem relation
 *
 * @method     ClientQuoteQuery leftJoinSupplierQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuote relation
 * @method     ClientQuoteQuery rightJoinSupplierQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuote relation
 * @method     ClientQuoteQuery innerJoinSupplierQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuote relation
 *
 * @method     ClientQuoteQuery leftJoinClientPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientQuoteQuery rightJoinClientPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     ClientQuoteQuery innerJoinClientPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrder relation
 *
 * @method     ClientQuoteQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ClientQuoteQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     ClientQuoteQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     ClientQuote findOne(PropelPDO $con = null) Return the first ClientQuote matching the query
 * @method     ClientQuote findOneOrCreate(PropelPDO $con = null) Return the first ClientQuote matching the query, or a new ClientQuote object populated from the query conditions when no match is found
 *
 * @method     ClientQuote findOneById(int $id) Return the first ClientQuote filtered by the id column
 * @method     ClientQuote findOneByCreatedat(string $createdAt) Return the first ClientQuote filtered by the createdAt column
 * @method     ClientQuote findOneByAffiliateid(int $affiliateId) Return the first ClientQuote filtered by the affiliateId column
 * @method     ClientQuote findOneByAffiliateuserid(int $affiliateUserId) Return the first ClientQuote filtered by the affiliateUserId column
 * @method     ClientQuote findOneByUserid(int $userId) Return the first ClientQuote filtered by the userId column
 * @method     ClientQuote findOneByStatus(int $status) Return the first ClientQuote filtered by the status column
 * @method     ClientQuote findOneByTimestampstatus(string $timestampStatus) Return the first ClientQuote filtered by the timestampStatus column
 *
 * @method     array findById(int $id) Return ClientQuote objects filtered by the id column
 * @method     array findByCreatedat(string $createdAt) Return ClientQuote objects filtered by the createdAt column
 * @method     array findByAffiliateid(int $affiliateId) Return ClientQuote objects filtered by the affiliateId column
 * @method     array findByAffiliateuserid(int $affiliateUserId) Return ClientQuote objects filtered by the affiliateUserId column
 * @method     array findByUserid(int $userId) Return ClientQuote objects filtered by the userId column
 * @method     array findByStatus(int $status) Return ClientQuote objects filtered by the status column
 * @method     array findByTimestampstatus(string $timestampStatus) Return ClientQuote objects filtered by the timestampStatus column
 *
 * @package    propel.generator.import.classes.om
 */
abstract class BaseClientQuoteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientQuoteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientQuote', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientQuoteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientQuoteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientQuoteQuery) {
			return $criteria;
		}
		$query = new ClientQuoteQuery();
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
	 * @return    ClientQuote|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientQuotePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientQuotePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientQuotePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientQuotePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the createdAt column
	 * 
	 * @param     string|array $createdat The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByCreatedat($createdat = null, $comparison = null)
	{
		if (is_array($createdat)) {
			$useMinMax = false;
			if (isset($createdat['min'])) {
				$this->addUsingAlias(ClientQuotePeer::CREATEDAT, $createdat['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdat['max'])) {
				$this->addUsingAlias(ClientQuotePeer::CREATEDAT, $createdat['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::CREATEDAT, $createdat, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(ClientQuotePeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(ClientQuotePeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the affiliateUserId column
	 * 
	 * @param     int|array $affiliateuserid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByAffiliateuserid($affiliateuserid = null, $comparison = null)
	{
		if (is_array($affiliateuserid)) {
			$useMinMax = false;
			if (isset($affiliateuserid['min'])) {
				$this->addUsingAlias(ClientQuotePeer::AFFILIATEUSERID, $affiliateuserid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateuserid['max'])) {
				$this->addUsingAlias(ClientQuotePeer::AFFILIATEUSERID, $affiliateuserid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::AFFILIATEUSERID, $affiliateuserid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid)) {
			$useMinMax = false;
			if (isset($userid['min'])) {
				$this->addUsingAlias(ClientQuotePeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userid['max'])) {
				$this->addUsingAlias(ClientQuotePeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(ClientQuotePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(ClientQuotePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the timestampStatus column
	 * 
	 * @param     string|array $timestampstatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByTimestampstatus($timestampstatus = null, $comparison = null)
	{
		if (is_array($timestampstatus)) {
			$useMinMax = false;
			if (isset($timestampstatus['min'])) {
				$this->addUsingAlias(ClientQuotePeer::TIMESTAMPSTATUS, $timestampstatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestampstatus['max'])) {
				$this->addUsingAlias(ClientQuotePeer::TIMESTAMPSTATUS, $timestampstatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientQuotePeer::TIMESTAMPSTATUS, $timestampstatus, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::USERID, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
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
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
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
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::AFFILIATEUSERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
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
	 * Filter the query by a related ClientQuoteHistory object
	 *
	 * @param     ClientQuoteHistory $clientQuoteHistory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByClientQuoteHistory($clientQuoteHistory, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::ID, $clientQuoteHistory->getClientquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuoteHistory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function joinClientQuoteHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientQuoteHistory');
		
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
			$this->addJoinObject($join, 'ClientQuoteHistory');
		}
		
		return $this;
	}

	/**
	 * Use the ClientQuoteHistory relation ClientQuoteHistory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteHistoryQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuoteHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientQuoteHistory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientQuoteHistory', 'ClientQuoteHistoryQuery');
	}

	/**
	 * Filter the query by a related ClientQuoteItem object
	 *
	 * @param     ClientQuoteItem $clientQuoteItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByClientQuoteItem($clientQuoteItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::ID, $clientQuoteItem->getClientquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuoteItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function joinClientQuoteItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientQuoteItem');
		
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
			$this->addJoinObject($join, 'ClientQuoteItem');
		}
		
		return $this;
	}

	/**
	 * Use the ClientQuoteItem relation ClientQuoteItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteItemQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuoteItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientQuoteItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientQuoteItem', 'ClientQuoteItemQuery');
	}

	/**
	 * Filter the query by a related SupplierQuote object
	 *
	 * @param     SupplierQuote $supplierQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuote($supplierQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::ID, $supplierQuote->getClientquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function joinSupplierQuote($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useSupplierQuoteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplierQuote($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuote', 'SupplierQuoteQuery');
	}

	/**
	 * Filter the query by a related ClientPurchaseOrder object
	 *
	 * @param     ClientPurchaseOrder $clientPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrder($clientPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::ID, $clientPurchaseOrder->getClientquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
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
	 * Filter the query by a related SupplierPurchaseOrder object
	 *
	 * @param     SupplierPurchaseOrder $supplierPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientQuotePeer::ID, $supplierPurchaseOrder->getClientquoteid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
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
	 * @param     ClientQuote $clientQuote Object to remove from the list of results
	 *
	 * @return    ClientQuoteQuery The current query, for fluid interface
	 */
	public function prune($clientQuote = null)
	{
		if ($clientQuote) {
			$this->addUsingAlias(ClientQuotePeer::ID, $clientQuote->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientQuoteQuery
