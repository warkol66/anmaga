<?php


/**
 * Base class that represents a query for the 'affiliates_userInfo' table.
 *
 * Information about users by affiliates
 *
 * @method     AffiliateUserInfoQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     AffiliateUserInfoQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AffiliateUserInfoQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     AffiliateUserInfoQuery orderByMailaddress($order = Criteria::ASC) Order by the mailAddress column
 *
 * @method     AffiliateUserInfoQuery groupByUserid() Group by the userId column
 * @method     AffiliateUserInfoQuery groupByName() Group by the name column
 * @method     AffiliateUserInfoQuery groupBySurname() Group by the surname column
 * @method     AffiliateUserInfoQuery groupByMailaddress() Group by the mailAddress column
 *
 * @method     AffiliateUserInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateUserInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateUserInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateUserInfoQuery leftJoinAffiliateUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the AffiliateUser relation
 * @method     AffiliateUserInfoQuery rightJoinAffiliateUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AffiliateUser relation
 * @method     AffiliateUserInfoQuery innerJoinAffiliateUser($relationAlias = null) Adds a INNER JOIN clause to the query using the AffiliateUser relation
 *
 * @method     AffiliateUserInfo findOne(PropelPDO $con = null) Return the first AffiliateUserInfo matching the query
 * @method     AffiliateUserInfo findOneOrCreate(PropelPDO $con = null) Return the first AffiliateUserInfo matching the query, or a new AffiliateUserInfo object populated from the query conditions when no match is found
 *
 * @method     AffiliateUserInfo findOneByUserid(int $userId) Return the first AffiliateUserInfo filtered by the userId column
 * @method     AffiliateUserInfo findOneByName(string $name) Return the first AffiliateUserInfo filtered by the name column
 * @method     AffiliateUserInfo findOneBySurname(string $surname) Return the first AffiliateUserInfo filtered by the surname column
 * @method     AffiliateUserInfo findOneByMailaddress(string $mailAddress) Return the first AffiliateUserInfo filtered by the mailAddress column
 *
 * @method     array findByUserid(int $userId) Return AffiliateUserInfo objects filtered by the userId column
 * @method     array findByName(string $name) Return AffiliateUserInfo objects filtered by the name column
 * @method     array findBySurname(string $surname) Return AffiliateUserInfo objects filtered by the surname column
 * @method     array findByMailaddress(string $mailAddress) Return AffiliateUserInfo objects filtered by the mailAddress column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateUserInfoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAffiliateUserInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AffiliateUserInfo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateUserInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateUserInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateUserInfoQuery) {
			return $criteria;
		}
		$query = new AffiliateUserInfoQuery();
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
	 * @return    AffiliateUserInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateUserInfoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliateUserInfoPeer::USERID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliateUserInfoPeer::USERID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateUserInfoPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserInfoPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the surname column
	 * 
	 * @param     string $surname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserInfoPeer::SURNAME, $surname, $comparison);
	}

	/**
	 * Filter the query on the mailAddress column
	 * 
	 * @param     string $mailaddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateUserInfoPeer::MAILADDRESS, $mailaddress, $comparison);
	}

	/**
	 * Filter the query by a related AffiliateUser object
	 *
	 * @param     AffiliateUser $affiliateUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function filterByAffiliateUser($affiliateUser, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliateUserInfoPeer::USERID, $affiliateUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AffiliateUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function joinAffiliateUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useAffiliateUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAffiliateUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AffiliateUser', 'AffiliateUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AffiliateUserInfo $affiliateUserInfo Object to remove from the list of results
	 *
	 * @return    AffiliateUserInfoQuery The current query, for fluid interface
	 */
	public function prune($affiliateUserInfo = null)
	{
		if ($affiliateUserInfo) {
			$this->addUsingAlias(AffiliateUserInfoPeer::USERID, $affiliateUserInfo->getUserid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAffiliateUserInfoQuery
