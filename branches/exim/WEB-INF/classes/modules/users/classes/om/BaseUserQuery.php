<?php


/**
 * Base class that represents a query for the 'users_user' table.
 *
 * Users
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserQuery orderByPasswordupdated($order = Criteria::ASC) Order by the passwordUpdated column
 * @method     UserQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     UserQuery orderByLevelid($order = Criteria::ASC) Order by the levelId column
 * @method     UserQuery orderByLastlogin($order = Criteria::ASC) Order by the lastLogin column
 * @method     UserQuery orderByTimezone($order = Criteria::ASC) Order by the timezone column
 * @method     UserQuery orderByRecoveryhash($order = Criteria::ASC) Order by the recoveryHash column
 * @method     UserQuery orderByRecoveryhashcreatedon($order = Criteria::ASC) Order by the recoveryHashCreatedOn column
 * @method     UserQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     UserQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     UserQuery orderByMailaddress($order = Criteria::ASC) Order by the mailAddress column
 * @method     UserQuery orderByMailaddressalt($order = Criteria::ASC) Order by the mailAddressAlt column
 * @method     UserQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     UserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     UserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupByUsername() Group by the username column
 * @method     UserQuery groupByPassword() Group by the password column
 * @method     UserQuery groupByPasswordupdated() Group by the passwordUpdated column
 * @method     UserQuery groupByActive() Group by the active column
 * @method     UserQuery groupByLevelid() Group by the levelId column
 * @method     UserQuery groupByLastlogin() Group by the lastLogin column
 * @method     UserQuery groupByTimezone() Group by the timezone column
 * @method     UserQuery groupByRecoveryhash() Group by the recoveryHash column
 * @method     UserQuery groupByRecoveryhashcreatedon() Group by the recoveryHashCreatedOn column
 * @method     UserQuery groupByName() Group by the name column
 * @method     UserQuery groupBySurname() Group by the surname column
 * @method     UserQuery groupByMailaddress() Group by the mailAddress column
 * @method     UserQuery groupByMailaddressalt() Group by the mailAddressAlt column
 * @method     UserQuery groupByDeletedAt() Group by the deleted_at column
 * @method     UserQuery groupByCreatedAt() Group by the created_at column
 * @method     UserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserQuery leftJoinLevel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Level relation
 * @method     UserQuery rightJoinLevel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Level relation
 * @method     UserQuery innerJoinLevel($relationAlias = null) Adds a INNER JOIN clause to the query using the Level relation
 *
 * @method     UserQuery leftJoinActionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionLog relation
 * @method     UserQuery rightJoinActionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionLog relation
 * @method     UserQuery innerJoinActionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionLog relation
 *
 * @method     UserQuery leftJoinAlertSubscriptionUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscriptionUser relation
 * @method     UserQuery rightJoinAlertSubscriptionUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscriptionUser relation
 * @method     UserQuery innerJoinAlertSubscriptionUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscriptionUser relation
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
 * @method     User findOneByPasswordupdated(string $passwordUpdated) Return the first User filtered by the passwordUpdated column
 * @method     User findOneByActive(boolean $active) Return the first User filtered by the active column
 * @method     User findOneByLevelid(int $levelId) Return the first User filtered by the levelId column
 * @method     User findOneByLastlogin(string $lastLogin) Return the first User filtered by the lastLogin column
 * @method     User findOneByTimezone(string $timezone) Return the first User filtered by the timezone column
 * @method     User findOneByRecoveryhash(string $recoveryHash) Return the first User filtered by the recoveryHash column
 * @method     User findOneByRecoveryhashcreatedon(string $recoveryHashCreatedOn) Return the first User filtered by the recoveryHashCreatedOn column
 * @method     User findOneByName(string $name) Return the first User filtered by the name column
 * @method     User findOneBySurname(string $surname) Return the first User filtered by the surname column
 * @method     User findOneByMailaddress(string $mailAddress) Return the first User filtered by the mailAddress column
 * @method     User findOneByMailaddressalt(string $mailAddressAlt) Return the first User filtered by the mailAddressAlt column
 * @method     User findOneByDeletedAt(string $deleted_at) Return the first User filtered by the deleted_at column
 * @method     User findOneByCreatedAt(string $created_at) Return the first User filtered by the created_at column
 * @method     User findOneByUpdatedAt(string $updated_at) Return the first User filtered by the updated_at column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findByUsername(string $username) Return User objects filtered by the username column
 * @method     array findByPassword(string $password) Return User objects filtered by the password column
 * @method     array findByPasswordupdated(string $passwordUpdated) Return User objects filtered by the passwordUpdated column
 * @method     array findByActive(boolean $active) Return User objects filtered by the active column
 * @method     array findByLevelid(int $levelId) Return User objects filtered by the levelId column
 * @method     array findByLastlogin(string $lastLogin) Return User objects filtered by the lastLogin column
 * @method     array findByTimezone(string $timezone) Return User objects filtered by the timezone column
 * @method     array findByRecoveryhash(string $recoveryHash) Return User objects filtered by the recoveryHash column
 * @method     array findByRecoveryhashcreatedon(string $recoveryHashCreatedOn) Return User objects filtered by the recoveryHashCreatedOn column
 * @method     array findByName(string $name) Return User objects filtered by the name column
 * @method     array findBySurname(string $surname) Return User objects filtered by the surname column
 * @method     array findByMailaddress(string $mailAddress) Return User objects filtered by the mailAddress column
 * @method     array findByMailaddressalt(string $mailAddressAlt) Return User objects filtered by the mailAddressAlt column
 * @method     array findByDeletedAt(string $deleted_at) Return User objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return User objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return User objects filtered by the updated_at column
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

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
	 * Filter the query on the passwordUpdated column
	 * 
	 * @param     string|array $passwordupdated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPasswordupdated($passwordupdated = null, $comparison = null)
	{
		if (is_array($passwordupdated)) {
			$useMinMax = false;
			if (isset($passwordupdated['min'])) {
				$this->addUsingAlias(UserPeer::PASSWORDUPDATED, $passwordupdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($passwordupdated['max'])) {
				$this->addUsingAlias(UserPeer::PASSWORDUPDATED, $passwordupdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::PASSWORDUPDATED, $passwordupdated, $comparison);
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
	 * Filter the query on the recoveryHash column
	 * 
	 * @param     string $recoveryhash The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByRecoveryhash($recoveryhash = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recoveryhash)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recoveryhash)) {
				$recoveryhash = str_replace('*', '%', $recoveryhash);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::RECOVERYHASH, $recoveryhash, $comparison);
	}

	/**
	 * Filter the query on the recoveryHashCreatedOn column
	 * 
	 * @param     string|array $recoveryhashcreatedon The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByRecoveryhashcreatedon($recoveryhashcreatedon = null, $comparison = null)
	{
		if (is_array($recoveryhashcreatedon)) {
			$useMinMax = false;
			if (isset($recoveryhashcreatedon['min'])) {
				$this->addUsingAlias(UserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($recoveryhashcreatedon['max'])) {
				$this->addUsingAlias(UserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the surname column
	 * 
	 * @param     string $surname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySurname($surname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($surname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $surname)) {
				$surname = str_replace('*', '%', $surname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::SURNAME, $surname, $comparison);
	}

	/**
	 * Filter the query on the mailAddress column
	 * 
	 * @param     string $mailaddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByMailaddress($mailaddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mailaddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mailaddress)) {
				$mailaddress = str_replace('*', '%', $mailaddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::MAILADDRESS, $mailaddress, $comparison);
	}

	/**
	 * Filter the query on the mailAddressAlt column
	 * 
	 * @param     string $mailaddressalt The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByMailaddressalt($mailaddressalt = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mailaddressalt)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mailaddressalt)) {
				$mailaddressalt = str_replace('*', '%', $mailaddressalt);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::MAILADDRESSALT, $mailaddressalt, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * @param     string|array $deletedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(UserPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(UserPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt, $comparison);
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
	 * Filter the query by a related ActionLog object
	 *
	 * @param     ActionLog $actionLog  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByActionLog($actionLog, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $actionLog->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ActionLog relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinActionLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ActionLog');
		
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
			$this->addJoinObject($join, 'ActionLog');
		}
		
		return $this;
	}

	/**
	 * Use the ActionLog relation ActionLog object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActionLogQuery A secondary query class using the current class as primary query
	 */
	public function useActionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinActionLog($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ActionLog', 'ActionLogQuery');
	}

	/**
	 * Filter the query by a related AlertSubscriptionUser object
	 *
	 * @param     AlertSubscriptionUser $alertSubscriptionUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscriptionUser($alertSubscriptionUser, $comparison = null)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $alertSubscriptionUser->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscriptionUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinAlertSubscriptionUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscriptionUser');
		
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
			$this->addJoinObject($join, 'AlertSubscriptionUser');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscriptionUser relation AlertSubscriptionUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionUserQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlertSubscriptionUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscriptionUser', 'AlertSubscriptionUserQuery');
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
	 * Filter the query by a related AlertSubscription object
	 * using the common_alertSubscriptionUser table as cross reference
	 *
	 * @param     AlertSubscription $alertSubscription the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscription($alertSubscription, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAlertSubscriptionUserQuery()
				->filterByAlertSubscription($alertSubscription, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Group object
	 * using the users_userGroup table as cross reference
	 *
	 * @param     Group $group the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserGroupQuery()
				->filterByGroup($group, $comparison)
			->endUse();
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

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		// soft_delete behavior
		if (UserQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(UserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			UserPeer::enableSoftDelete();
		}
		
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		// soft_delete behavior
		if (UserQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			return $this->softDelete($con);
		} else {
			return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
		}
		
		return $this->preDelete($con);
	}

	// soft_delete behavior
	
	/**
	 * Temporarily disable the filter on deleted rows
	 * Valid only for the current query
	 * 
	 * @see UserQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return UserQuery The current query, for fuid interface
	 */
	public function includeDeleted()
	{
		$this->localSoftDelete = false;
		return $this;
	}
	
	/**
	 * Soft delete the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of updated rows
	 */
	public function softDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => time()), $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		return UserPeer::doForceDelete($this, $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of all the rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDeleteAll(PropelPDO $con = null)
	{
		return UserPeer::doForceDeleteAll($con);}
	
	/**
	 * Undelete selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => null), $con);
	}
		
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		self::$softDelete = true;
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		self::$softDelete = false;
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 *
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return self::$softDelete;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(UserPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(UserPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(UserPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(UserPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(UserPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     UserQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(UserPeer::CREATED_AT);
	}

} // BaseUserQuery
