<?php


/**
 * Base class that represents a query for the 'affiliates_user' table.
 *
 * Usuarios de afiliado
 *
 * @method     AffiliateUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AffiliateUserQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     AffiliateUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     AffiliateUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     AffiliateUserQuery orderByPasswordupdated($order = Criteria::ASC) Order by the passwordUpdated column
 * @method     AffiliateUserQuery orderByLevelid($order = Criteria::ASC) Order by the levelId column
 * @method     AffiliateUserQuery orderByLastlogin($order = Criteria::ASC) Order by the lastLogin column
 * @method     AffiliateUserQuery orderByTimezone($order = Criteria::ASC) Order by the timezone column
 * @method     AffiliateUserQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AffiliateUserQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     AffiliateUserQuery orderByMailaddress($order = Criteria::ASC) Order by the mailAddress column
 * @method     AffiliateUserQuery orderByMailaddressalt($order = Criteria::ASC) Order by the mailAddressAlt column
 * @method     AffiliateUserQuery orderByRecoveryhash($order = Criteria::ASC) Order by the recoveryHash column
 * @method     AffiliateUserQuery orderByRecoveryhashcreatedon($order = Criteria::ASC) Order by the recoveryHashCreatedOn column
 * @method     AffiliateUserQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     AffiliateUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AffiliateUserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AffiliateUserQuery groupById() Group by the id column
 * @method     AffiliateUserQuery groupByAffiliateid() Group by the affiliateId column
 * @method     AffiliateUserQuery groupByUsername() Group by the username column
 * @method     AffiliateUserQuery groupByPassword() Group by the password column
 * @method     AffiliateUserQuery groupByPasswordupdated() Group by the passwordUpdated column
 * @method     AffiliateUserQuery groupByLevelid() Group by the levelId column
 * @method     AffiliateUserQuery groupByLastlogin() Group by the lastLogin column
 * @method     AffiliateUserQuery groupByTimezone() Group by the timezone column
 * @method     AffiliateUserQuery groupByName() Group by the name column
 * @method     AffiliateUserQuery groupBySurname() Group by the surname column
 * @method     AffiliateUserQuery groupByMailaddress() Group by the mailAddress column
 * @method     AffiliateUserQuery groupByMailaddressalt() Group by the mailAddressAlt column
 * @method     AffiliateUserQuery groupByRecoveryhash() Group by the recoveryHash column
 * @method     AffiliateUserQuery groupByRecoveryhashcreatedon() Group by the recoveryHashCreatedOn column
 * @method     AffiliateUserQuery groupByDeletedAt() Group by the deleted_at column
 * @method     AffiliateUserQuery groupByCreatedAt() Group by the created_at column
 * @method     AffiliateUserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     AffiliateUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateUserQuery leftJoinAffiliateLevel($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateLevel relation
 * @method     AffiliateUserQuery rightJoinAffiliateLevel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateLevel relation
 * @method     AffiliateUserQuery innerJoinAffiliateLevel($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateLevel relation
 *
 * @method     AffiliateUserQuery leftJoinAffiliateRelatedByAffiliateid($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateRelatedByAffiliateid relation
 * @method     AffiliateUserQuery rightJoinAffiliateRelatedByAffiliateid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateRelatedByAffiliateid relation
 * @method     AffiliateUserQuery innerJoinAffiliateRelatedByAffiliateid($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateRelatedByAffiliateid relation
 *
 * @method     AffiliateUserQuery leftJoinAffiliateRelatedByOwnerid($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateRelatedByOwnerid relation
 * @method     AffiliateUserQuery rightJoinAffiliateRelatedByOwnerid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateRelatedByOwnerid relation
 * @method     AffiliateUserQuery innerJoinAffiliateRelatedByOwnerid($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateRelatedByOwnerid relation
 *
 * @method     AffiliateUserQuery leftJoinAffiliateUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUserGroup relation
 * @method     AffiliateUserQuery rightJoinAffiliateUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUserGroup relation
 * @method     AffiliateUserQuery innerJoinAffiliateUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUserGroup relation
 *
 * @method     AffiliateUserQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     AffiliateUserQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     AffiliateUserQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     AffiliateUserQuery leftJoinOrderStateChange($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderStateChange relation
 * @method     AffiliateUserQuery rightJoinOrderStateChange($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderStateChange relation
 * @method     AffiliateUserQuery innerJoinOrderStateChange($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderStateChange relation
 *
 * @method     AffiliateUserQuery leftJoinOrderTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplate relation
 * @method     AffiliateUserQuery rightJoinOrderTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplate relation
 * @method     AffiliateUserQuery innerJoinOrderTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplate relation
 *
 * @method     AffiliateUser findOne(PropelPDO $con = null) Return the first AffiliateUser matching the query
 * @method     AffiliateUser findOneOrCreate(PropelPDO $con = null) Return the first AffiliateUser matching the query, or a new AffiliateUser object populated from the query conditions when no match is found
 *
 * @method     AffiliateUser findOneById(int $id) Return the first AffiliateUser filtered by the id column
 * @method     AffiliateUser findOneByAffiliateid(int $affiliateId) Return the first AffiliateUser filtered by the affiliateId column
 * @method     AffiliateUser findOneByUsername(string $username) Return the first AffiliateUser filtered by the username column
 * @method     AffiliateUser findOneByPassword(string $password) Return the first AffiliateUser filtered by the password column
 * @method     AffiliateUser findOneByPasswordupdated(string $passwordUpdated) Return the first AffiliateUser filtered by the passwordUpdated column
 * @method     AffiliateUser findOneByLevelid(int $levelId) Return the first AffiliateUser filtered by the levelId column
 * @method     AffiliateUser findOneByLastlogin(string $lastLogin) Return the first AffiliateUser filtered by the lastLogin column
 * @method     AffiliateUser findOneByTimezone(string $timezone) Return the first AffiliateUser filtered by the timezone column
 * @method     AffiliateUser findOneByName(string $name) Return the first AffiliateUser filtered by the name column
 * @method     AffiliateUser findOneBySurname(string $surname) Return the first AffiliateUser filtered by the surname column
 * @method     AffiliateUser findOneByMailaddress(string $mailAddress) Return the first AffiliateUser filtered by the mailAddress column
 * @method     AffiliateUser findOneByMailaddressalt(string $mailAddressAlt) Return the first AffiliateUser filtered by the mailAddressAlt column
 * @method     AffiliateUser findOneByRecoveryhash(string $recoveryHash) Return the first AffiliateUser filtered by the recoveryHash column
 * @method     AffiliateUser findOneByRecoveryhashcreatedon(string $recoveryHashCreatedOn) Return the first AffiliateUser filtered by the recoveryHashCreatedOn column
 * @method     AffiliateUser findOneByDeletedAt(string $deleted_at) Return the first AffiliateUser filtered by the deleted_at column
 * @method     AffiliateUser findOneByCreatedAt(string $created_at) Return the first AffiliateUser filtered by the created_at column
 * @method     AffiliateUser findOneByUpdatedAt(string $updated_at) Return the first AffiliateUser filtered by the updated_at column
 *
 * @method     array findById(int $id) Return AffiliateUser objects filtered by the id column
 * @method     array findByAffiliateid(int $affiliateId) Return AffiliateUser objects filtered by the affiliateId column
 * @method     array findByUsername(string $username) Return AffiliateUser objects filtered by the username column
 * @method     array findByPassword(string $password) Return AffiliateUser objects filtered by the password column
 * @method     array findByPasswordupdated(string $passwordUpdated) Return AffiliateUser objects filtered by the passwordUpdated column
 * @method     array findByLevelid(int $levelId) Return AffiliateUser objects filtered by the levelId column
 * @method     array findByLastlogin(string $lastLogin) Return AffiliateUser objects filtered by the lastLogin column
 * @method     array findByTimezone(string $timezone) Return AffiliateUser objects filtered by the timezone column
 * @method     array findByName(string $name) Return AffiliateUser objects filtered by the name column
 * @method     array findBySurname(string $surname) Return AffiliateUser objects filtered by the surname column
 * @method     array findByMailaddress(string $mailAddress) Return AffiliateUser objects filtered by the mailAddress column
 * @method     array findByMailaddressalt(string $mailAddressAlt) Return AffiliateUser objects filtered by the mailAddressAlt column
 * @method     array findByRecoveryhash(string $recoveryHash) Return AffiliateUser objects filtered by the recoveryHash column
 * @method     array findByRecoveryhashcreatedon(string $recoveryHashCreatedOn) Return AffiliateUser objects filtered by the recoveryHashCreatedOn column
 * @method     array findByDeletedAt(string $deleted_at) Return AffiliateUser objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return AffiliateUser objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return AffiliateUser objects filtered by the updated_at column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateUserQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseAffiliateUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'AffiliateUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateUserQuery) {
			return $criteria;
		}
		$query = new AffiliateUserQuery();
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
	 * @return    AffiliateUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateUserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliateUserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliateUserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateUserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAffiliateid(1234); // WHERE affiliateId = 1234
	 * $query->filterByAffiliateid(array(12, 34)); // WHERE affiliateId IN (12, 34)
	 * $query->filterByAffiliateid(array('min' => 12)); // WHERE affiliateId > 12
	 * </code>
	 *
	 * @see       filterByAffiliateRelatedByAffiliateid()
	 *
	 * @param     mixed $affiliateid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
	 * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $username The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the passwordUpdated column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPasswordupdated('2011-03-14'); // WHERE passwordUpdated = '2011-03-14'
	 * $query->filterByPasswordupdated('now'); // WHERE passwordUpdated = '2011-03-14'
	 * $query->filterByPasswordupdated(array('max' => 'yesterday')); // WHERE passwordUpdated > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $passwordupdated The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByPasswordupdated($passwordupdated = null, $comparison = null)
	{
		if (is_array($passwordupdated)) {
			$useMinMax = false;
			if (isset($passwordupdated['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::PASSWORDUPDATED, $passwordupdated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($passwordupdated['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::PASSWORDUPDATED, $passwordupdated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::PASSWORDUPDATED, $passwordupdated, $comparison);
	}

	/**
	 * Filter the query on the levelId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLevelid(1234); // WHERE levelId = 1234
	 * $query->filterByLevelid(array(12, 34)); // WHERE levelId IN (12, 34)
	 * $query->filterByLevelid(array('min' => 12)); // WHERE levelId > 12
	 * </code>
	 *
	 * @see       filterByAffiliateLevel()
	 *
	 * @param     mixed $levelid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByLevelid($levelid = null, $comparison = null)
	{
		if (is_array($levelid)) {
			$useMinMax = false;
			if (isset($levelid['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::LEVELID, $levelid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($levelid['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::LEVELID, $levelid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::LEVELID, $levelid, $comparison);
	}

	/**
	 * Filter the query on the lastLogin column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLastlogin('2011-03-14'); // WHERE lastLogin = '2011-03-14'
	 * $query->filterByLastlogin('now'); // WHERE lastLogin = '2011-03-14'
	 * $query->filterByLastlogin(array('max' => 'yesterday')); // WHERE lastLogin > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $lastlogin The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByLastlogin($lastlogin = null, $comparison = null)
	{
		if (is_array($lastlogin)) {
			$useMinMax = false;
			if (isset($lastlogin['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::LASTLOGIN, $lastlogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastlogin['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::LASTLOGIN, $lastlogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::LASTLOGIN, $lastlogin, $comparison);
	}

	/**
	 * Filter the query on the timezone column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByTimezone('fooValue');   // WHERE timezone = 'fooValue'
	 * $query->filterByTimezone('%fooValue%'); // WHERE timezone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $timezone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::TIMEZONE, $timezone, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the surname column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterBySurname('fooValue');   // WHERE surname = 'fooValue'
	 * $query->filterBySurname('%fooValue%'); // WHERE surname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $surname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::SURNAME, $surname, $comparison);
	}

	/**
	 * Filter the query on the mailAddress column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByMailaddress('fooValue');   // WHERE mailAddress = 'fooValue'
	 * $query->filterByMailaddress('%fooValue%'); // WHERE mailAddress LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mailaddress The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::MAILADDRESS, $mailaddress, $comparison);
	}

	/**
	 * Filter the query on the mailAddressAlt column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByMailaddressalt('fooValue');   // WHERE mailAddressAlt = 'fooValue'
	 * $query->filterByMailaddressalt('%fooValue%'); // WHERE mailAddressAlt LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mailaddressalt The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::MAILADDRESSALT, $mailaddressalt, $comparison);
	}

	/**
	 * Filter the query on the recoveryHash column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByRecoveryhash('fooValue');   // WHERE recoveryHash = 'fooValue'
	 * $query->filterByRecoveryhash('%fooValue%'); // WHERE recoveryHash LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $recoveryhash The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserPeer::RECOVERYHASH, $recoveryhash, $comparison);
	}

	/**
	 * Filter the query on the recoveryHashCreatedOn column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByRecoveryhashcreatedon('2011-03-14'); // WHERE recoveryHashCreatedOn = '2011-03-14'
	 * $query->filterByRecoveryhashcreatedon('now'); // WHERE recoveryHashCreatedOn = '2011-03-14'
	 * $query->filterByRecoveryhashcreatedon(array('max' => 'yesterday')); // WHERE recoveryHashCreatedOn > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $recoveryhashcreatedon The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByRecoveryhashcreatedon($recoveryhashcreatedon = null, $comparison = null)
	{
		if (is_array($recoveryhashcreatedon)) {
			$useMinMax = false;
			if (isset($recoveryhashcreatedon['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($recoveryhashcreatedon['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::RECOVERYHASHCREATEDON, $recoveryhashcreatedon, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $deletedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $updatedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(AffiliateUserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(AffiliateUserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateUserPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateLevel object
	 *
	 * @param     AffiliateLevel|PropelCollection $affiliateLevel The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateLevel($affiliateLevel, $comparison = null)
	{
		if ($affiliateLevel instanceof AffiliateLevel) {
			return $this
				->addUsingAlias(AffiliateUserPeer::LEVELID, $affiliateLevel->getId(), $comparison);
		} elseif ($affiliateLevel instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AffiliateUserPeer::LEVELID, $affiliateLevel->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliateLevel() only accepts arguments of type AffiliateLevel or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateLevel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinAffiliateLevel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateLevel');
		
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
			$this->addJoinObject($join, 'AffiliateLevel');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateLevel relation AffiliateLevel object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateLevelQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateLevelQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAffiliateLevel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateLevel', 'AffiliateLevelQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate|PropelCollection $affiliate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateRelatedByAffiliateid($affiliate, $comparison = null)
	{
		if ($affiliate instanceof Affiliate) {
			return $this
				->addUsingAlias(AffiliateUserPeer::AFFILIATEID, $affiliate->getId(), $comparison);
		} elseif ($affiliate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AffiliateUserPeer::AFFILIATEID, $affiliate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAffiliateRelatedByAffiliateid() only accepts arguments of type Affiliate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateRelatedByAffiliateid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinAffiliateRelatedByAffiliateid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateRelatedByAffiliateid');
		
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
			$this->addJoinObject($join, 'AffiliateRelatedByAffiliateid');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateRelatedByAffiliateid relation Affiliate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateRelatedByAffiliateidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateRelatedByAffiliateid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateRelatedByAffiliateid', 'AffiliateQuery');
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateRelatedByOwnerid($affiliate, $comparison = null)
	{
		if ($affiliate instanceof Affiliate) {
			return $this
				->addUsingAlias(AffiliateUserPeer::ID, $affiliate->getOwnerid(), $comparison);
		} elseif ($affiliate instanceof PropelCollection) {
			return $this
				->useAffiliateRelatedByOwneridQuery()
					->filterByPrimaryKeys($affiliate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAffiliateRelatedByOwnerid() only accepts arguments of type Affiliate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateRelatedByOwnerid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinAffiliateRelatedByOwnerid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateRelatedByOwnerid');
		
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
			$this->addJoinObject($join, 'AffiliateRelatedByOwnerid');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateRelatedByOwnerid relation Affiliate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateRelatedByOwneridQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAffiliateRelatedByOwnerid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateRelatedByOwnerid', 'AffiliateQuery');
	}

	/**
	 * Filter the query by a related AffiliateUserGroup object
	 *
	 * @param     AffiliateUserGroup $affiliateUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUserGroup($affiliateUserGroup, $comparison = null)
	{
		if ($affiliateUserGroup instanceof AffiliateUserGroup) {
			return $this
				->addUsingAlias(AffiliateUserPeer::ID, $affiliateUserGroup->getUserid(), $comparison);
		} elseif ($affiliateUserGroup instanceof PropelCollection) {
			return $this
				->useAffiliateUserGroupQuery()
					->filterByPrimaryKeys($affiliateUserGroup->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAffiliateUserGroup() only accepts arguments of type AffiliateUserGroup or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinAffiliateUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUserGroup');
		
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
			$this->addJoinObject($join, 'AffiliateUserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUserGroup relation AffiliateUserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUserGroup', 'AffiliateUserGroupQuery');
	}

	/**
	 * Filter the query by a related Order object
	 *
	 * @param     Order $order  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByOrder($order, $comparison = null)
	{
		if ($order instanceof Order) {
			return $this
				->addUsingAlias(AffiliateUserPeer::ID, $order->getUserid(), $comparison);
		} elseif ($order instanceof PropelCollection) {
			return $this
				->useOrderQuery()
					->filterByPrimaryKeys($order->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrder() only accepts arguments of type Order or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Order relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Order');
		
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
			$this->addJoinObject($join, 'Order');
		}
		
		return $this;
	}

	/**
	 * Use the Order relation Order object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderQuery A secondary query class using the current class as primary query
	 */
	public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
	}

	/**
	 * Filter the query by a related OrderStateChange object
	 *
	 * @param     OrderStateChange $orderStateChange  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByOrderStateChange($orderStateChange, $comparison = null)
	{
		if ($orderStateChange instanceof OrderStateChange) {
			return $this
				->addUsingAlias(AffiliateUserPeer::ID, $orderStateChange->getUserid(), $comparison);
		} elseif ($orderStateChange instanceof PropelCollection) {
			return $this
				->useOrderStateChangeQuery()
					->filterByPrimaryKeys($orderStateChange->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderStateChange() only accepts arguments of type OrderStateChange or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderStateChange relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinOrderStateChange($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderStateChange');
		
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
			$this->addJoinObject($join, 'OrderStateChange');
		}
		
		return $this;
	}

	/**
	 * Use the OrderStateChange relation OrderStateChange object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderStateChangeQuery A secondary query class using the current class as primary query
	 */
	public function useOrderStateChangeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderStateChange($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderStateChange', 'OrderStateChangeQuery');
	}

	/**
	 * Filter the query by a related OrderTemplate object
	 *
	 * @param     OrderTemplate $orderTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplate($orderTemplate, $comparison = null)
	{
		if ($orderTemplate instanceof OrderTemplate) {
			return $this
				->addUsingAlias(AffiliateUserPeer::ID, $orderTemplate->getUserid(), $comparison);
		} elseif ($orderTemplate instanceof PropelCollection) {
			return $this
				->useOrderTemplateQuery()
					->filterByPrimaryKeys($orderTemplate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByOrderTemplate() only accepts arguments of type OrderTemplate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function joinOrderTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OrderTemplate');
		
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
			$this->addJoinObject($join, 'OrderTemplate');
		}
		
		return $this;
	}

	/**
	 * Use the OrderTemplate relation OrderTemplate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrderTemplateQuery A secondary query class using the current class as primary query
	 */
	public function useOrderTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinOrderTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderTemplate', 'OrderTemplateQuery');
	}

	/**
	 * Filter the query by a related AffiliateGroup object
	 * using the affiliates_userGroup table as cross reference
	 *
	 * @param     AffiliateGroup $affiliateGroup the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function filterByAffiliateGroup($affiliateGroup, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAffiliateUserGroupQuery()
				->filterByAffiliateGroup($affiliateGroup, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     AffiliateUser $affiliateUser Object to remove from the list of results
	 *
	 * @return    AffiliateUserQuery The current query, for fluid interface
	 */
	public function prune($affiliateUser = null)
	{
		if ($affiliateUser) {
			$this->addUsingAlias(AffiliateUserPeer::ID, $affiliateUser->getId(), Criteria::NOT_EQUAL);
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
		if (AffiliateUserQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(AffiliateUserPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliateUserPeer::enableSoftDelete();
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
		if (AffiliateUserQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
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
	 * @see AffiliateUserQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return AffiliateUserQuery The current query, for fluid interface
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
		return AffiliateUserPeer::doForceDelete($this, $con);
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
		return AffiliateUserPeer::doForceDeleteAll($con);}
	
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
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(AffiliateUserPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(AffiliateUserPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(AffiliateUserPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(AffiliateUserPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(AffiliateUserPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     AffiliateUserQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(AffiliateUserPeer::CREATED_AT);
	}

} // BaseAffiliateUserQuery
