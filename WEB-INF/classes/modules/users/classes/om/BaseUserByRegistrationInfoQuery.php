<?php


/**
 * Base class that represents a query for the 'usersByRegistration_userInfo' table.
 *
 * Information about users by registration
 *
 * @method     UserByRegistrationInfoQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 * @method     UserByRegistrationInfoQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     UserByRegistrationInfoQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     UserByRegistrationInfoQuery orderByMailaddress($order = Criteria::ASC) Order by the mailAddress column
 *
 * @method     UserByRegistrationInfoQuery groupByUserid() Group by the userId column
 * @method     UserByRegistrationInfoQuery groupByName() Group by the name column
 * @method     UserByRegistrationInfoQuery groupBySurname() Group by the surname column
 * @method     UserByRegistrationInfoQuery groupByMailaddress() Group by the mailAddress column
 *
 * @method     UserByRegistrationInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserByRegistrationInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserByRegistrationInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserByRegistrationInfoQuery leftJoinUserByRegistrationRelatedByUserid($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserByRegistrationRelatedByUserid relation
 * @method     UserByRegistrationInfoQuery rightJoinUserByRegistrationRelatedByUserid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserByRegistrationRelatedByUserid relation
 * @method     UserByRegistrationInfoQuery innerJoinUserByRegistrationRelatedByUserid($relationAlias = null) Adds a INNER JOIN clause to the query using the UserByRegistrationRelatedByUserid relation
 *
 * @method     UserByRegistrationInfoQuery leftJoinUserByRegistrationRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserByRegistrationRelatedById relation
 * @method     UserByRegistrationInfoQuery rightJoinUserByRegistrationRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserByRegistrationRelatedById relation
 * @method     UserByRegistrationInfoQuery innerJoinUserByRegistrationRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the UserByRegistrationRelatedById relation
 *
 * @method     UserByRegistrationInfo findOne(PropelPDO $con = null) Return the first UserByRegistrationInfo matching the query
 * @method     UserByRegistrationInfo findOneOrCreate(PropelPDO $con = null) Return the first UserByRegistrationInfo matching the query, or a new UserByRegistrationInfo object populated from the query conditions when no match is found
 *
 * @method     UserByRegistrationInfo findOneByUserid(int $userId) Return the first UserByRegistrationInfo filtered by the userId column
 * @method     UserByRegistrationInfo findOneByName(string $name) Return the first UserByRegistrationInfo filtered by the name column
 * @method     UserByRegistrationInfo findOneBySurname(string $surname) Return the first UserByRegistrationInfo filtered by the surname column
 * @method     UserByRegistrationInfo findOneByMailaddress(string $mailAddress) Return the first UserByRegistrationInfo filtered by the mailAddress column
 *
 * @method     array findByUserid(int $userId) Return UserByRegistrationInfo objects filtered by the userId column
 * @method     array findByName(string $name) Return UserByRegistrationInfo objects filtered by the name column
 * @method     array findBySurname(string $surname) Return UserByRegistrationInfo objects filtered by the surname column
 * @method     array findByMailaddress(string $mailAddress) Return UserByRegistrationInfo objects filtered by the mailAddress column
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseUserByRegistrationInfoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserByRegistrationInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'UserByRegistrationInfo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserByRegistrationInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserByRegistrationInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserByRegistrationInfoQuery) {
			return $criteria;
		}
		$query = new UserByRegistrationInfoQuery();
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
	 * @return    UserByRegistrationInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserByRegistrationInfoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserByRegistrationInfoPeer::USERID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserByRegistrationInfoPeer::USERID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserByRegistrationInfoPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserByRegistrationInfoPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the surname column
	 * 
	 * @param     string $surname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserByRegistrationInfoPeer::SURNAME, $surname, $comparison);
	}

	/**
	 * Filter the query on the mailAddress column
	 * 
	 * @param     string $mailaddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserByRegistrationInfoPeer::MAILADDRESS, $mailaddress, $comparison);
	}

	/**
	 * Filter the query by a related UserByRegistration object
	 *
	 * @param     UserByRegistration $userByRegistration  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function filterByUserByRegistrationRelatedByUserid($userByRegistration, $comparison = null)
	{
		return $this
			->addUsingAlias(UserByRegistrationInfoPeer::USERID, $userByRegistration->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserByRegistrationRelatedByUserid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function joinUserByRegistrationRelatedByUserid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserByRegistrationRelatedByUserid');
		
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
			$this->addJoinObject($join, 'UserByRegistrationRelatedByUserid');
		}
		
		return $this;
	}

	/**
	 * Use the UserByRegistrationRelatedByUserid relation UserByRegistration object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationQuery A secondary query class using the current class as primary query
	 */
	public function useUserByRegistrationRelatedByUseridQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserByRegistrationRelatedByUserid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserByRegistrationRelatedByUserid', 'UserByRegistrationQuery');
	}

	/**
	 * Filter the query by a related UserByRegistration object
	 *
	 * @param     UserByRegistration $userByRegistration  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function filterByUserByRegistrationRelatedById($userByRegistration, $comparison = null)
	{
		return $this
			->addUsingAlias(UserByRegistrationInfoPeer::USERID, $userByRegistration->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserByRegistrationRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function joinUserByRegistrationRelatedById($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserByRegistrationRelatedById');
		
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
			$this->addJoinObject($join, 'UserByRegistrationRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the UserByRegistrationRelatedById relation UserByRegistration object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserByRegistrationQuery A secondary query class using the current class as primary query
	 */
	public function useUserByRegistrationRelatedByIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserByRegistrationRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserByRegistrationRelatedById', 'UserByRegistrationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserByRegistrationInfo $userByRegistrationInfo Object to remove from the list of results
	 *
	 * @return    UserByRegistrationInfoQuery The current query, for fluid interface
	 */
	public function prune($userByRegistrationInfo = null)
	{
		if ($userByRegistrationInfo) {
			$this->addUsingAlias(UserByRegistrationInfoPeer::USERID, $userByRegistrationInfo->getUserid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUserByRegistrationInfoQuery
