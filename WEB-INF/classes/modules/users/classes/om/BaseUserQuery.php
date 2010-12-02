<?php


/**
 * Base class that represents a query for the 'users_user' table.
 *
 * Users
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     UserQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     UserQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     UserQuery orderByLevelid($order = Criteria::ASC) Order by the levelId column
 * @method     UserQuery orderByLastlogin($order = Criteria::ASC) Order by the lastLogin column
 * @method     UserQuery orderByTimezone($order = Criteria::ASC) Order by the timezone column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupByUsername() Group by the username column
 * @method     UserQuery groupByPassword() Group by the password column
 * @method     UserQuery groupByActive() Group by the active column
 * @method     UserQuery groupByCreated() Group by the created column
 * @method     UserQuery groupByUpdated() Group by the updated column
 * @method     UserQuery groupByLevelid() Group by the levelId column
 * @method     UserQuery groupByLastlogin() Group by the lastLogin column
 * @method     UserQuery groupByTimezone() Group by the timezone column
 *
 * @method     UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserQuery leftJoinLevel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Level relation
 * @method     UserQuery rightJoinLevel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Level relation
 * @method     UserQuery innerJoinLevel($relationAlias = null) Adds a INNER JOIN clause to the query using the Level relation
 *
 * @method     UserQuery leftJoinActionlog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actionlog relation
 * @method     UserQuery rightJoinActionlog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actionlog relation
 * @method     UserQuery innerJoinActionlog($relationAlias = null) Adds a INNER JOIN clause to the query using the Actionlog relation
 *
 * @method     UserQuery leftJoinClientQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientQuote relation
 * @method     UserQuery rightJoinClientQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientQuote relation
 * @method     UserQuery innerJoinClientQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientQuote relation
 *
 * @method     UserQuery leftJoinSupplierQuoteItemComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     UserQuery rightJoinSupplierQuoteItemComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierQuoteItemComment relation
 * @method     UserQuery innerJoinSupplierQuoteItemComment($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierQuoteItemComment relation
 *
 * @method     UserQuery leftJoinClientPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     UserQuery rightJoinClientPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientPurchaseOrder relation
 * @method     UserQuery innerJoinClientPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientPurchaseOrder relation
 *
 * @method     UserQuery leftJoinSupplierPurchaseOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     UserQuery rightJoinSupplierPurchaseOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SupplierPurchaseOrder relation
 * @method     UserQuery innerJoinSupplierPurchaseOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SupplierPurchaseOrder relation
 *
 * @method     UserQuery leftJoinUserInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInfo relation
 * @method     UserQuery rightJoinUserInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInfo relation
 * @method     UserQuery innerJoinUserInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInfo relation
 *
 * @method     UserQuery leftJoinUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserGroup relation
 * @method     UserQuery rightJoinUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserGroup relation
 * @method     UserQuery innerJoinUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the UserGroup relation
 *
 * @method     User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method     User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method     User findOneById(int $id) Return the first User filtered by the id column
 * @method     User findOneByUsername(string $username) Return the first User filtered by the username column
 * @method     User findOneByPassword(string $password) Return the first User filtered by the password column
 * @method     User findOneByActive(boolean $active) Return the first User filtered by the active column
 * @method     User findOneByCreated(string $created) Return the first User filtered by the created column
 * @method     User findOneByUpdated(string $updated) Return the first User filtered by the updated column
 * @method     User findOneByLevelid(int $levelId) Return the first User filtered by the levelId column
 * @method     User findOneByLastlogin(string $lastLogin) Return the first User filtered by the lastLogin column
 * @method     User findOneByTimezone(string $timezone) Return the first User filtered by the timezone column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findByUsername(string $username) Return User objects filtered by the username column
 * @method     array findByPassword(string $password) Return User objects filtered by the password column
 * @method     array findByActive(boolean $active) Return User objects filtered by the active column
 * @method     array findByCreated(string $created) Return User objects filtered by the created column
 * @method     array findByUpdated(string $updated) Return User objects filtered by the updated column
 * @method     array findByLevelid(int $levelId) Return User objects filtered by the levelId column
 * @method     array findByLastlogin(string $lastLogin) Return User objects filtered by the lastLogin column
 * @method     array findByTimezone(string $timezone) Return User objects filtered by the timezone column
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'User', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserQuery) {
			return $criteria;
		}
		$query = new UserQuery();
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
	 * @return    User|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(UserPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(UserPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(UserPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 * 
	 * @param     string|array $updated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(UserPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(UserPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the levelId column
	 * 
	 * @param     int|array $levelid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLevelid($levelid = null, $comparison = null)
	{
		if (is_array($levelid)) {
			$useMinMax = false;
			if (isset($levelid['min'])) {
				$this->addUsingAlias(UserPeer::LEVELID, $levelid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($levelid['max'])) {
				$this->addUsingAlias(UserPeer::LEVELID, $levelid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::LEVELID, $levelid, $comparison);
	}

	/**
	 * Filter the query on the lastLogin column
	 * 
	 * @param     string|array $lastlogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLastlogin($lastlogin = null, $comparison = null)
	{
		if (is_array($lastlogin)) {
			$useMinMax = false;
			if (isset($lastlogin['min'])) {
				$this->addUsingAlias(UserPeer::LASTLOGIN, $lastlogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastlogin['max'])) {
				$this->addUsingAlias(UserPeer::LASTLOGIN, $lastlogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::LASTLOGIN, $lastlogin, $comparison);
	}

	/**
	 * Filter the query on the timezone column
	 * 
	 * @param     string $timezone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByTimezone($timezone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($timezone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $timezone)) {
				$timezone = str_replace('*', '%', $timezone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::TIMEZONE, $timezone, $comparison);
	}

	/**
	 * Filter the query by a related Level object
	 *
	 * @param     Level $level  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLevel($level, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::LEVELID, $level->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Level relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinLevel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Level');
		
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
			$this->addJoinObject($join, 'Level');
		}
		
		return $this;
	}

	/**
	 * Use the Level relation Level object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LevelQuery A secondary query class using the current class as primary query
	 */
	public function useLevelQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLevel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Level', 'LevelQuery');
	}

	/**
	 * Filter the query by a related Actionlog object
	 *
	 * @param     Actionlog $actionlog  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByActionlog($actionlog, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $actionlog->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Actionlog relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinActionlog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Actionlog');
		
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
			$this->addJoinObject($join, 'Actionlog');
		}
		
		return $this;
	}

	/**
	 * Use the Actionlog relation Actionlog object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActionlogQuery A secondary query class using the current class as primary query
	 */
	public function useActionlogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinActionlog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Actionlog', 'ActionlogQuery');
	}

	/**
	 * Filter the query by a related ClientQuote object
	 *
	 * @param     ClientQuote $clientQuote  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByClientQuote($clientQuote, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $clientQuote->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientQuote relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related SupplierQuoteItemComment object
	 *
	 * @param     SupplierQuoteItemComment $supplierQuoteItemComment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySupplierQuoteItemComment($supplierQuoteItemComment, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $supplierQuoteItemComment->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierQuoteItemComment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSupplierQuoteItemComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SupplierQuoteItemComment');
		
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
			$this->addJoinObject($join, 'SupplierQuoteItemComment');
		}
		
		return $this;
	}

	/**
	 * Use the SupplierQuoteItemComment relation SupplierQuoteItemComment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SupplierQuoteItemCommentQuery A secondary query class using the current class as primary query
	 */
	public function useSupplierQuoteItemCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplierQuoteItemComment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierQuoteItemComment', 'SupplierQuoteItemCommentQuery');
	}

	/**
	 * Filter the query by a related ClientPurchaseOrder object
	 *
	 * @param     ClientPurchaseOrder $clientPurchaseOrder  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByClientPurchaseOrder($clientPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $clientPurchaseOrder->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinClientPurchaseOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useClientPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySupplierPurchaseOrder($supplierPurchaseOrder, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $supplierPurchaseOrder->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SupplierPurchaseOrder relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSupplierPurchaseOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useSupplierPurchaseOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSupplierPurchaseOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SupplierPurchaseOrder', 'SupplierPurchaseOrderQuery');
	}

	/**
	 * Filter the query by a related UserInfo object
	 *
	 * @param     UserInfo $userInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserInfo($userInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $userInfo->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserInfo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinUserInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserInfo');
		
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
			$this->addJoinObject($join, 'UserInfo');
		}
		
		return $this;
	}

	/**
	 * Use the UserInfo relation UserInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserInfoQuery A secondary query class using the current class as primary query
	 */
	public function useUserInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserInfo', 'UserInfoQuery');
	}

	/**
	 * Filter the query by a related UserGroup object
	 *
	 * @param     UserGroup $userGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserGroup($userGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $userGroup->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserGroup');
		
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
			$this->addJoinObject($join, 'UserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the UserGroup relation UserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserGroup', 'UserGroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     User $user Object to remove from the list of results
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function prune($user = null)
	{
		if ($user) {
			$this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUserQuery
