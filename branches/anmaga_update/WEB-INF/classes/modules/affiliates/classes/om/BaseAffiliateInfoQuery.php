<?php


/**
 * Base class that represents a query for the 'affiliates_affiliateInfo' table.
 *
 * Informacion del afiliado
 *
 * @method     AffiliateInfoQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     AffiliateInfoQuery orderByAffiliateinternalnumber($order = Criteria::ASC) Order by the affiliateInternalNumber column
 * @method     AffiliateInfoQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     AffiliateInfoQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     AffiliateInfoQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     AffiliateInfoQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     AffiliateInfoQuery orderByContactemail($order = Criteria::ASC) Order by the contactEmail column
 * @method     AffiliateInfoQuery orderByWeb($order = Criteria::ASC) Order by the web column
 * @method     AffiliateInfoQuery orderByMemo($order = Criteria::ASC) Order by the memo column
 *
 * @method     AffiliateInfoQuery groupByAffiliateid() Group by the affiliateId column
 * @method     AffiliateInfoQuery groupByAffiliateinternalnumber() Group by the affiliateInternalNumber column
 * @method     AffiliateInfoQuery groupByAddress() Group by the address column
 * @method     AffiliateInfoQuery groupByPhone() Group by the phone column
 * @method     AffiliateInfoQuery groupByEmail() Group by the email column
 * @method     AffiliateInfoQuery groupByContact() Group by the contact column
 * @method     AffiliateInfoQuery groupByContactemail() Group by the contactEmail column
 * @method     AffiliateInfoQuery groupByWeb() Group by the web column
 * @method     AffiliateInfoQuery groupByMemo() Group by the memo column
 *
 * @method     AffiliateInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateInfoQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     AffiliateInfoQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     AffiliateInfoQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     AffiliateInfo findOne(PropelPDO $con = null) Return the first AffiliateInfo matching the query
 * @method     AffiliateInfo findOneOrCreate(PropelPDO $con = null) Return the first AffiliateInfo matching the query, or a new AffiliateInfo object populated from the query conditions when no match is found
 *
 * @method     AffiliateInfo findOneByAffiliateid(int $affiliateId) Return the first AffiliateInfo filtered by the affiliateId column
 * @method     AffiliateInfo findOneByAffiliateinternalnumber(string $affiliateInternalNumber) Return the first AffiliateInfo filtered by the affiliateInternalNumber column
 * @method     AffiliateInfo findOneByAddress(string $address) Return the first AffiliateInfo filtered by the address column
 * @method     AffiliateInfo findOneByPhone(string $phone) Return the first AffiliateInfo filtered by the phone column
 * @method     AffiliateInfo findOneByEmail(string $email) Return the first AffiliateInfo filtered by the email column
 * @method     AffiliateInfo findOneByContact(string $contact) Return the first AffiliateInfo filtered by the contact column
 * @method     AffiliateInfo findOneByContactemail(string $contactEmail) Return the first AffiliateInfo filtered by the contactEmail column
 * @method     AffiliateInfo findOneByWeb(string $web) Return the first AffiliateInfo filtered by the web column
 * @method     AffiliateInfo findOneByMemo(string $memo) Return the first AffiliateInfo filtered by the memo column
 *
 * @method     array findByAffiliateid(int $affiliateId) Return AffiliateInfo objects filtered by the affiliateId column
 * @method     array findByAffiliateinternalnumber(string $affiliateInternalNumber) Return AffiliateInfo objects filtered by the affiliateInternalNumber column
 * @method     array findByAddress(string $address) Return AffiliateInfo objects filtered by the address column
 * @method     array findByPhone(string $phone) Return AffiliateInfo objects filtered by the phone column
 * @method     array findByEmail(string $email) Return AffiliateInfo objects filtered by the email column
 * @method     array findByContact(string $contact) Return AffiliateInfo objects filtered by the contact column
 * @method     array findByContactemail(string $contactEmail) Return AffiliateInfo objects filtered by the contactEmail column
 * @method     array findByWeb(string $web) Return AffiliateInfo objects filtered by the web column
 * @method     array findByMemo(string $memo) Return AffiliateInfo objects filtered by the memo column
 *
 * @package    propel.generator.affiliates.classes.om
 */
abstract class BaseAffiliateInfoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAffiliateInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'AffiliateInfo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateInfoQuery) {
			return $criteria;
		}
		$query = new AffiliateInfoQuery();
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
	 * @return    AffiliateInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateInfoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliateInfoPeer::AFFILIATEID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliateInfoPeer::AFFILIATEID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateInfoPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the affiliateInternalNumber column
	 * 
	 * @param     string $affiliateinternalnumber The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function filterByAffiliateinternalnumber($affiliateinternalnumber = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($affiliateinternalnumber)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $affiliateinternalnumber)) {
				$affiliateinternalnumber = str_replace('*', '%', $affiliateinternalnumber);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliateInfoPeer::AFFILIATEINTERNALNUMBER, $affiliateinternalnumber, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the contact column
	 * 
	 * @param     string $contact The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::CONTACT, $contact, $comparison);
	}

	/**
	 * Filter the query on the contactEmail column
	 * 
	 * @param     string $contactemail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::CONTACTEMAIL, $contactemail, $comparison);
	}

	/**
	 * Filter the query on the web column
	 * 
	 * @param     string $web The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::WEB, $web, $comparison);
	}

	/**
	 * Filter the query on the memo column
	 * 
	 * @param     string $memo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AffiliateInfoPeer::MEMO, $memo, $comparison);
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliateInfoPeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     AffiliateInfo $affiliateInfo Object to remove from the list of results
	 *
	 * @return    AffiliateInfoQuery The current query, for fluid interface
	 */
	public function prune($affiliateInfo = null)
	{
		if ($affiliateInfo) {
			$this->addUsingAlias(AffiliateInfoPeer::AFFILIATEID, $affiliateInfo->getAffiliateid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAffiliateInfoQuery
