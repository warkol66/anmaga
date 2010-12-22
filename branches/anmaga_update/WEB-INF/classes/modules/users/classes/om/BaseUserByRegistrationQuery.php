<?php


/**
 * Base class that represents a query for the 'usersByRegistration_user' table.
 *
 * Users by registration
 *
 * @method     UserByRegistrationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserByRegistrationQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     UserByRegistrationQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserByRegistrationQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     UserByRegistrationQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     UserByRegistrationQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     UserByRegistrationQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     UserByRegistrationQuery orderByLastlogin($order = Criteria::ASC) Order by the lastLogin column
 *
 * @method     UserByRegistrationQuery groupById() Group by the id column
 * @method     UserByRegistrationQuery groupByUsername() Group by the username column
 * @method     UserByRegistrationQuery groupByPassword() Group by the password column
 * @method     UserByRegistrationQuery groupByActive() Group by the active column
 * @method     UserByRegistrationQuery groupByCreated() Group by the created column
 * @method     UserByRegistrationQuery groupByUpdated() Group by the updated column
 * @method     UserByRegistrationQuery groupByIp() Group by the ip column
 * @method     UserByRegistrationQuery groupByLastlogin() Group by the lastLogin column
 *
 * @method     UserByRegistrationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserByRegistrationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserByRegistrationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserByRegistrationQuery leftJoinUserByRegistrationInfoRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserByRegistrationInfoRelatedById relation
 * @method     UserByRegistrationQuery rightJoinUserByRegistrationInfoRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserByRegistrationInfoRelatedById relation
 * @method     UserByRegistrationQuery innerJoinUserByRegistrationInfoRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the UserByRegistrationInfoRelatedById relation
 *
 * @method     UserByRegistrationQuery leftJoinUserByRegistrationInfoRelatedByUserid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserByRegistrationInfoRelatedByUserid relation
 * @method     UserByRegistrationQuery rightJoinUserByRegistrationInfoRelatedByUserid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserByRegistrationInfoRelatedByUserid relation
 * @method     UserByRegistrationQuery innerJoinUserByRegistrationInfoRelatedByUserid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserByRegistrationInfoRelatedByUserid relation
 *
 * @method     UserByRegistration findOne(PropelPDO $con = null) Return the first UserByRegistration matching the query
 * @method     UserByRegistration findOneOrCreate(PropelPDO $con = null) Return the first UserByRegistration matching the query, or a new UserByRegistration object populated from the query conditions when no match is found
 *
 * @method     UserByRegistration findOneById(int $id) Return the first UserByRegistration filtered by the id column
 * @method     UserByRegistration findOneByUsername(string $username) Return the first UserByRegistration filtered by the username column
 * @method     UserByRegistration findOneByPassword(string $password) Return the first UserByRegistration filtered by the password column
 * @method     UserByRegistration findOneByActive(boolean $active) Return the first UserByRegistration filtered by the active column
 * @method     UserByRegistration findOneByCreated(string $created) Return the first UserByRegistration filtered by the created column
 * @method     UserByRegistration findOneByUpdated(string $updated) Return the first UserByRegistration filtered by the updated column
 * @method     UserByRegistration findOneByIp(string $ip) Return the first UserByRegistration filtered by the ip column
 * @method     UserByRegistration findOneByLastlogin(string $lastLogin) Return the first UserByRegistration filtered by the lastLogin column
 *
 * @method     array findById(int $id) Return UserByRegistration objects filtered by the id column
 * @method     array findByUsername(string $username) Return UserByRegistration objects filtered by the username column
 * @method     array findByPassword(string $password) Return UserByRegistration objects filtered by the password column
 * @method     array findByActive(boolean $active) Return UserByRegistration objects filtered by the active column
 * @method     array findByCreated(string $created) Return UserByRegistration objects filtered by the created column
 * @method     array findByUpdated(string $updated) Return UserByRegistration objects filtered by the updated column
 * @method     array findByIp(string $ip) Return UserByRegistration objects filtered by the ip column
 * @method     array findByLastlogin(string $lastLogin) Return UserByRegistration objects filtered by the lastLogin column
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseUserByRegistrationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserByRegistrationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'UserByRegistration', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserByRegistrationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserByRegistrationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserByRegistrationQuery) {
			return $criteria;
		}
		$query = new UserByRegistrationQuery();
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
	 * @return    UserByRegistration|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserByRegistrationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserByRegistrationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserByRegistrationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserByRegistrationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserByRegistrationPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserByRegistrationPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(UserByRegistrationPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(UserByRegistrationPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(UserByRegistrationPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserByRegistrationPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 * 
	 * @param     string|array $updated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(UserByRegistrationPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(UserByRegistrationPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserByRegistrationPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the ip column
	 * 
	 * @param     string $ip The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserByRegistrationPeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the lastLogin column
	 * 
	 * @param     string|array $lastlogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByLastlogin($lastlogin = null, $comparison = null)
	{
		if (is_array($lastlogin)) {
			$useMinMax = false;
			if (isset($lastlogin['min'])) {
				$this->addUsingAlias(UserByRegistrationPeer::LASTLOGIN, $lastlogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastlogin['max'])) {
				$this->addUsingAlias(UserByRegistrationPeer::LASTLOGIN, $lastlogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserByRegistrationPeer::LASTLOGIN, $lastlogin, $comparison);
	}

	/**
	 * Filter the query by a related UserByRegistrationInfo object
	 *
	 * @param     UserByRegistrationInfo $userByRegistrationInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByUserByRegistrationInfoRelatedById($userByRegistrationInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(UserByRegistrationPeer::ID, $userByRegistrationInfo->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserByRegistrationInfoRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function joinUserByRegistrationInfoRelatedById($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserByRegistrationInfoRelatedById');
		
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
			$this->addJoinObject($join, 'UserByRegistrationInfoRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the UserByRegistrationInfoRelatedById relation UserByRegistrationInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationInfoQuery A secondary query class using the current class as primary query
	 */
	public function useUserByRegistrationInfoRelatedByIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserByRegistrationInfoRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserByRegistrationInfoRelatedById', 'UserByRegistrationInfoQuery');
	}

	/**
	 * Filter the query by a related UserByRegistrationInfo object
	 *
	 * @param     UserByRegistrationInfo $userByRegistrationInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function filterByUserByRegistrationInfoRelatedByUserid($userByRegistrationInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(UserByRegistrationPeer::ID, $userByRegistrationInfo->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserByRegistrationInfoRelatedByUserid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function joinUserByRegistrationInfoRelatedByUserid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserByRegistrationInfoRelatedByUserid');
		
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
			$this->addJoinObject($join, 'UserByRegistrationInfoRelatedByUserid');
		}
		
		return $this;
	}

	/**
	 * Use the UserByRegistrationInfoRelatedByUserid relation UserByRegistrationInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationInfoQuery A secondary query class using the current class as primary query
	 */
	public function useUserByRegistrationInfoRelatedByUseridQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserByRegistrationInfoRelatedByUserid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserByRegistrationInfoRelatedByUserid', 'UserByRegistrationInfoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserByRegistration $userByRegistration Object to remove from the list of results
	 *
	 * @return    UserByRegistrationQuery The current query, for fluid interface
	 */
	public function prune($userByRegistration = null)
	{
		if ($userByRegistration) {
			$this->addUsingAlias(UserByRegistrationPeer::ID, $userByRegistration->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUserByRegistrationQuery
