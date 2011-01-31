<?php


/**
 * Base class that represents a query for the 'affiliates_affiliate' table.
 *
 * Afiliados
 *
 * @method     AffiliateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AffiliateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AffiliateQuery orderByOwnerid($order = Criteria::ASC) Order by the ownerId column
 * @method     AffiliateQuery orderByInternalnumber($order = Criteria::ASC) Order by the internalNumber column
 * @method     AffiliateQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     AffiliateQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     AffiliateQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     AffiliateQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     AffiliateQuery orderByContactemail($order = Criteria::ASC) Order by the contactEmail column
 * @method     AffiliateQuery orderByWeb($order = Criteria::ASC) Order by the web column
 * @method     AffiliateQuery orderByMemo($order = Criteria::ASC) Order by the memo column
 * @method     AffiliateQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     AffiliateQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AffiliateQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AffiliateQuery groupById() Group by the id column
 * @method     AffiliateQuery groupByName() Group by the name column
 * @method     AffiliateQuery groupByOwnerid() Group by the ownerId column
 * @method     AffiliateQuery groupByInternalnumber() Group by the internalNumber column
 * @method     AffiliateQuery groupByAddress() Group by the address column
 * @method     AffiliateQuery groupByPhone() Group by the phone column
 * @method     AffiliateQuery groupByEmail() Group by the email column
 * @method     AffiliateQuery groupByContact() Group by the contact column
 * @method     AffiliateQuery groupByContactemail() Group by the contactEmail column
 * @method     AffiliateQuery groupByWeb() Group by the web column
 * @method     AffiliateQuery groupByMemo() Group by the memo column
 * @method     AffiliateQuery groupByDeletedAt() Group by the deleted_at column
 * @method     AffiliateQuery groupByCreatedAt() Group by the created_at column
 * @method     AffiliateQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     AffiliateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateQuery leftJoinAffiliateUserRelatedByOwnerid($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUserRelatedByOwnerid relation
 * @method     AffiliateQuery rightJoinAffiliateUserRelatedByOwnerid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUserRelatedByOwnerid relation
 * @method     AffiliateQuery innerJoinAffiliateUserRelatedByOwnerid($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUserRelatedByOwnerid relation
 *
 * @method     AffiliateQuery leftJoinAffiliateUserRelatedByAffiliateid($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUserRelatedByAffiliateid relation
 * @method     AffiliateQuery rightJoinAffiliateUserRelatedByAffiliateid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUserRelatedByAffiliateid relation
 * @method     AffiliateQuery innerJoinAffiliateUserRelatedByAffiliateid($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUserRelatedByAffiliateid relation
 *
 * @method     AffiliateQuery leftJoinAffiliateBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateBranch relation
 * @method     AffiliateQuery rightJoinAffiliateBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateBranch relation
 * @method     AffiliateQuery innerJoinAffiliateBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateBranch relation
 *
 * @method     AffiliateQuery leftJoinAffiliateProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateProduct relation
 * @method     AffiliateQuery rightJoinAffiliateProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateProduct relation
 * @method     AffiliateQuery innerJoinAffiliateProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateProduct relation
 *
 * @method     AffiliateQuery leftJoinAffiliateProductCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateProductCode relation
 * @method     AffiliateQuery rightJoinAffiliateProductCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateProductCode relation
 * @method     AffiliateQuery innerJoinAffiliateProductCode($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateProductCode relation
 *
 * @method     AffiliateQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     AffiliateQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     AffiliateQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     AffiliateQuery leftJoinOrderStateChange($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderStateChange relation
 * @method     AffiliateQuery rightJoinOrderStateChange($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderStateChange relation
 * @method     AffiliateQuery innerJoinOrderStateChange($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderStateChange relation
 *
 * @method     AffiliateQuery leftJoinOrderTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplate relation
 * @method     AffiliateQuery rightJoinOrderTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplate relation
 * @method     AffiliateQuery innerJoinOrderTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplate relation
 *
 * @method     Affiliate findOne(PropelPDO $con = null) Return the first Affiliate matching the query
 * @method     Affiliate findOneOrCreate(PropelPDO $con = null) Return the first Affiliate matching the query, or a new Affiliate object populated from the query conditions when no match is found
 *
 * @method     Affiliate findOneById(int $id) Return the first Affiliate filtered by the id column
 * @method     Affiliate findOneByName(string $name) Return the first Affiliate filtered by the name column
 * @method     Affiliate findOneByOwnerid(int $ownerId) Return the first Affiliate filtered by the ownerId column
 * @method     Affiliate findOneByInternalnumber(string $internalNumber) Return the first Affiliate filtered by the internalNumber column
 * @method     Affiliate findOneByAddress(string $address) Return the first Affiliate filtered by the address column
 * @method     Affiliate findOneByPhone(string $phone) Return the first Affiliate filtered by the phone column
 * @method     Affiliate findOneByEmail(string $email) Return the first Affiliate filtered by the email column
 * @method     Affiliate findOneByContact(string $contact) Return the first Affiliate filtered by the contact column
 * @method     Affiliate findOneByContactemail(string $contactEmail) Return the first Affiliate filtered by the contactEmail column
 * @method     Affiliate findOneByWeb(string $web) Return the first Affiliate filtered by the web column
 * @method     Affiliate findOneByMemo(string $memo) Return the first Affiliate filtered by the memo column
 * @method     Affiliate findOneByDeletedAt(string $deleted_at) Return the first Affiliate filtered by the deleted_at column
 * @method     Affiliate findOneByCreatedAt(string $created_at) Return the first Affiliate filtered by the created_at column
 * @method     Affiliate findOneByUpdatedAt(string $updated_at) Return the first Affiliate filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Affiliate objects filtered by the id column
 * @method     array findByName(string $name) Return Affiliate objects filtered by the name column
 * @method     array findByOwnerid(int $ownerId) Return Affiliate objects filtered by the ownerId column
 * @method     array findByInternalnumber(string $internalNumber) Return Affiliate objects filtered by the internalNumber column
 * @method     array findByAddress(string $address) Return Affiliate objects filtered by the address column
 * @method     array findByPhone(string $phone) Return Affiliate objects filtered by the phone column
 * @method     array findByEmail(string $email) Return Affiliate objects filtered by the email column
 * @method     array findByContact(string $contact) Return Affiliate objects filtered by the contact column
 * @method     array findByContactemail(string $contactEmail) Return Affiliate objects filtered by the contactEmail column
 * @method     array findByWeb(string $web) Return Affiliate objects filtered by the web column
 * @method     array findByMemo(string $memo) Return Affiliate objects filtered by the memo column
 * @method     array findByDeletedAt(string $deleted_at) Return Affiliate objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return Affiliate objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Affiliate objects filtered by the updated_at column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseAffiliateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'Affiliate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateQuery) {
			return $criteria;
		}
		$query = new AffiliateQuery();
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
	 * @return    Affiliate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliatePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliatePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the ownerId column
	 * 
	 * @param     int|array $ownerid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByOwnerid($ownerid = null, $comparison = null)
	{
		if (is_array($ownerid)) {
			$useMinMax = false;
			if (isset($ownerid['min'])) {
				$this->addUsingAlias(AffiliatePeer::OWNERID, $ownerid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ownerid['max'])) {
				$this->addUsingAlias(AffiliatePeer::OWNERID, $ownerid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::OWNERID, $ownerid, $comparison);
	}

	/**
	 * Filter the query on the internalNumber column
	 * 
	 * @param     string $internalnumber The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByInternalnumber($internalnumber = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($internalnumber)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $internalnumber)) {
				$internalnumber = str_replace('*', '%', $internalnumber);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::INTERNALNUMBER, $internalnumber, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the contact column
	 * 
	 * @param     string $contact The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByContact($contact = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contact)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contact)) {
				$contact = str_replace('*', '%', $contact);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::CONTACT, $contact, $comparison);
	}

	/**
	 * Filter the query on the contactEmail column
	 * 
	 * @param     string $contactemail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByContactemail($contactemail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contactemail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contactemail)) {
				$contactemail = str_replace('*', '%', $contactemail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::CONTACTEMAIL, $contactemail, $comparison);
	}

	/**
	 * Filter the query on the web column
	 * 
	 * @param     string $web The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByWeb($web = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($web)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $web)) {
				$web = str_replace('*', '%', $web);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::WEB, $web, $comparison);
	}

	/**
	 * Filter the query on the memo column
	 * 
	 * @param     string $memo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByMemo($memo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($memo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $memo)) {
				$memo = str_replace('*', '%', $memo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::MEMO, $memo, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * @param     string|array $deletedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(AffiliatePeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(AffiliatePeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AffiliatePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AffiliatePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(AffiliatePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(AffiliatePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliatePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser $affiliateUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUserRelatedByOwnerid($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::OWNERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUserRelatedByOwnerid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function joinAffiliateUserRelatedByOwnerid($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUserRelatedByOwnerid');
		
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
			$this->addJoinObject($join, 'AffiliateUserRelatedByOwnerid');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUserRelatedByOwnerid relation AffiliateUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserRelatedByOwneridQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAffiliateUserRelatedByOwnerid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUserRelatedByOwnerid', 'AffiliateUserQuery');
	}

	/**
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser $affiliateUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUserRelatedByAffiliateid($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $affiliateUser->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUserRelatedByAffiliateid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function joinAffiliateUserRelatedByAffiliateid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateUserRelatedByAffiliateid');
		
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
			$this->addJoinObject($join, 'AffiliateUserRelatedByAffiliateid');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateUserRelatedByAffiliateid relation AffiliateUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateUserRelatedByAffiliateidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateUserRelatedByAffiliateid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUserRelatedByAffiliateid', 'AffiliateUserQuery');
	}

	/**
	 * Filter the query by a related AffiliateBranch object
	 *
	 * @param     AffiliateBranch $affiliateBranch  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateBranch($affiliateBranch, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $affiliateBranch->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateBranch relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function joinAffiliateBranch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateBranch');
		
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
			$this->addJoinObject($join, 'AffiliateBranch');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateBranch relation AffiliateBranch object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateBranchQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateBranchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateBranch($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateBranch', 'AffiliateBranchQuery');
	}

	/**
	 * Filter the query by a related AffiliateProduct object
	 *
	 * @param     AffiliateProduct $affiliateProduct  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateProduct($affiliateProduct, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $affiliateProduct->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateProduct relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function joinAffiliateProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateProduct');
		
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
			$this->addJoinObject($join, 'AffiliateProduct');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateProduct relation AffiliateProduct object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateProductQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateProduct($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateProduct', 'AffiliateProductQuery');
	}

	/**
	 * Filter the query by a related AffiliateProductCode object
	 *
	 * @param     AffiliateProductCode $affiliateProductCode  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateProductCode($affiliateProductCode, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $affiliateProductCode->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateProductCode relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function joinAffiliateProductCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AffiliateProductCode');
		
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
			$this->addJoinObject($join, 'AffiliateProductCode');
		}
		
		return $this;
	}

	/**
	 * Use the AffiliateProductCode relation AffiliateProductCode object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateProductCodeQuery A secondary query class using the current class as primary query
	 */
	public function useAffiliateProductCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateProductCode($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateProductCode', 'AffiliateProductCodeQuery');
	}

	/**
	 * Filter the query by a related Order object
	 *
	 * @param     Order $order  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByOrder($order, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $order->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Order relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
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
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByOrderStateChange($orderStateChange, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $orderStateChange->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OrderStateChange relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
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
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplate($orderTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliatePeer::ID, $orderTemplate->getAffiliateid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
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
	 * Filter the query by a related Product object
	 * using the catalog_affiliateProduct table as cross reference
	 *
	 * @param     Product $product the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function filterByProduct($product, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAffiliateProductQuery()
				->filterByProduct($product, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Affiliate $affiliate Object to remove from the list of results
	 *
	 * @return    AffiliateQuery The current query, for fluid interface
	 */
	public function prune($affiliate = null)
	{
		if ($affiliate) {
			$this->addUsingAlias(AffiliatePeer::ID, $affiliate->getId(), Criteria::NOT_EQUAL);
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
		if (AffiliateQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(AffiliatePeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			AffiliatePeer::enableSoftDelete();
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
		if (AffiliateQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
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
	 * @see AffiliateQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return AffiliateQuery The current query, for fuid interface
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
		return AffiliatePeer::doForceDelete($this, $con);
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
		return AffiliatePeer::doForceDeleteAll($con);}
	
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
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(AffiliatePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(AffiliatePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(AffiliatePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(AffiliatePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(AffiliatePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     AffiliateQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(AffiliatePeer::CREATED_AT);
	}

} // BaseAffiliateQuery
