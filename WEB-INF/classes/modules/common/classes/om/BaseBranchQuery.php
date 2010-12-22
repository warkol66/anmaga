<?php


/**
 * Base class that represents a query for the 'branch' table.
 *
 * Sucursales de Afiliados
 *
 * @method     BranchQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BranchQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     BranchQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     BranchQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     BranchQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     BranchQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     BranchQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     BranchQuery orderByContactemail($order = Criteria::ASC) Order by the contactEmail column
 * @method     BranchQuery orderByMemo($order = Criteria::ASC) Order by the memo column
 *
 * @method     BranchQuery groupById() Group by the id column
 * @method     BranchQuery groupByAffiliateid() Group by the affiliateId column
 * @method     BranchQuery groupByNumber() Group by the number column
 * @method     BranchQuery groupByCode() Group by the code column
 * @method     BranchQuery groupByName() Group by the name column
 * @method     BranchQuery groupByPhone() Group by the phone column
 * @method     BranchQuery groupByContact() Group by the contact column
 * @method     BranchQuery groupByContactemail() Group by the contactEmail column
 * @method     BranchQuery groupByMemo() Group by the memo column
 *
 * @method     BranchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BranchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BranchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BranchQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     BranchQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     BranchQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     BranchQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method     BranchQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method     BranchQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method     BranchQuery leftJoinOrderTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderTemplate relation
 * @method     BranchQuery rightJoinOrderTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderTemplate relation
 * @method     BranchQuery innerJoinOrderTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderTemplate relation
 *
 * @method     Branch findOne(PropelPDO $con = null) Return the first Branch matching the query
 * @method     Branch findOneOrCreate(PropelPDO $con = null) Return the first Branch matching the query, or a new Branch object populated from the query conditions when no match is found
 *
 * @method     Branch findOneById(int $id) Return the first Branch filtered by the id column
 * @method     Branch findOneByAffiliateid(int $affiliateId) Return the first Branch filtered by the affiliateId column
 * @method     Branch findOneByNumber(int $number) Return the first Branch filtered by the number column
 * @method     Branch findOneByCode(string $code) Return the first Branch filtered by the code column
 * @method     Branch findOneByName(string $name) Return the first Branch filtered by the name column
 * @method     Branch findOneByPhone(string $phone) Return the first Branch filtered by the phone column
 * @method     Branch findOneByContact(string $contact) Return the first Branch filtered by the contact column
 * @method     Branch findOneByContactemail(string $contactEmail) Return the first Branch filtered by the contactEmail column
 * @method     Branch findOneByMemo(string $memo) Return the first Branch filtered by the memo column
 *
 * @method     array findById(int $id) Return Branch objects filtered by the id column
 * @method     array findByAffiliateid(int $affiliateId) Return Branch objects filtered by the affiliateId column
 * @method     array findByNumber(int $number) Return Branch objects filtered by the number column
 * @method     array findByCode(string $code) Return Branch objects filtered by the code column
 * @method     array findByName(string $name) Return Branch objects filtered by the name column
 * @method     array findByPhone(string $phone) Return Branch objects filtered by the phone column
 * @method     array findByContact(string $contact) Return Branch objects filtered by the contact column
 * @method     array findByContactemail(string $contactEmail) Return Branch objects filtered by the contactEmail column
 * @method     array findByMemo(string $memo) Return Branch objects filtered by the memo column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseBranchQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBranchQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'Branch', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BranchQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BranchQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BranchQuery) {
			return $criteria;
		}
		$query = new BranchQuery();
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
	 * @return    Branch|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BranchPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BranchPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BranchPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BranchPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(BranchPeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(BranchPeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BranchPeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the number column
	 * 
	 * @param     int|array $number The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(BranchPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(BranchPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BranchPeer::NUMBER, $number, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BranchPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BranchPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BranchPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the contact column
	 * 
	 * @param     string $contact The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BranchPeer::CONTACT, $contact, $comparison);
	}

	/**
	 * Filter the query on the contactEmail column
	 * 
	 * @param     string $contactemail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BranchPeer::CONTACTEMAIL, $contactemail, $comparison);
	}

	/**
	 * Filter the query on the memo column
	 * 
	 * @param     string $memo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BranchPeer::MEMO, $memo, $comparison);
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(BranchPeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BranchQuery The current query, for fluid interface
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
	 * Filter the query by a related Order object
	 *
	 * @param     Order $order  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByOrder($order, $comparison = null)
	{
		return $this
			->addUsingAlias(BranchPeer::ID, $order->getBranchid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Order relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function joinOrder($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useOrderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrder($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
	}

	/**
	 * Filter the query by a related OrderTemplate object
	 *
	 * @param     OrderTemplate $orderTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function filterByOrderTemplate($orderTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(BranchPeer::ID, $orderTemplate->getBranchid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OrderTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function joinOrderTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useOrderTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrderTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OrderTemplate', 'OrderTemplateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Branch $branch Object to remove from the list of results
	 *
	 * @return    BranchQuery The current query, for fluid interface
	 */
	public function prune($branch = null)
	{
		if ($branch) {
			$this->addUsingAlias(BranchPeer::ID, $branch->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBranchQuery
