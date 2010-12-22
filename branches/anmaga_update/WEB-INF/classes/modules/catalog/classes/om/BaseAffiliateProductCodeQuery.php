<?php


/**
 * Base class that represents a query for the 'catalog_affiliateProductCode' table.
 *
 * Codigos de Productos por Afiliado
 *
 * @method     AffiliateProductCodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AffiliateProductCodeQuery orderByAffiliateid($order = Criteria::ASC) Order by the affiliateId column
 * @method     AffiliateProductCodeQuery orderByProductcode($order = Criteria::ASC) Order by the productCode column
 * @method     AffiliateProductCodeQuery orderByProductcodeaffiliate($order = Criteria::ASC) Order by the productCodeAffiliate column
 *
 * @method     AffiliateProductCodeQuery groupById() Group by the id column
 * @method     AffiliateProductCodeQuery groupByAffiliateid() Group by the affiliateId column
 * @method     AffiliateProductCodeQuery groupByProductcode() Group by the productCode column
 * @method     AffiliateProductCodeQuery groupByProductcodeaffiliate() Group by the productCodeAffiliate column
 *
 * @method     AffiliateProductCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AffiliateProductCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AffiliateProductCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AffiliateProductCodeQuery leftJoinAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Affiliate relation
 * @method     AffiliateProductCodeQuery rightJoinAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Affiliate relation
 * @method     AffiliateProductCodeQuery innerJoinAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the Affiliate relation
 *
 * @method     AffiliateProductCode findOne(PropelPDO $con = null) Return the first AffiliateProductCode matching the query
 * @method     AffiliateProductCode findOneOrCreate(PropelPDO $con = null) Return the first AffiliateProductCode matching the query, or a new AffiliateProductCode object populated from the query conditions when no match is found
 *
 * @method     AffiliateProductCode findOneById(int $id) Return the first AffiliateProductCode filtered by the id column
 * @method     AffiliateProductCode findOneByAffiliateid(int $affiliateId) Return the first AffiliateProductCode filtered by the affiliateId column
 * @method     AffiliateProductCode findOneByProductcode(string $productCode) Return the first AffiliateProductCode filtered by the productCode column
 * @method     AffiliateProductCode findOneByProductcodeaffiliate(string $productCodeAffiliate) Return the first AffiliateProductCode filtered by the productCodeAffiliate column
 *
 * @method     array findById(int $id) Return AffiliateProductCode objects filtered by the id column
 * @method     array findByAffiliateid(int $affiliateId) Return AffiliateProductCode objects filtered by the affiliateId column
 * @method     array findByProductcode(string $productCode) Return AffiliateProductCode objects filtered by the productCode column
 * @method     array findByProductcodeaffiliate(string $productCodeAffiliate) Return AffiliateProductCode objects filtered by the productCodeAffiliate column
 *
 * @package    propel.generator.catalog.classes.om
 */
abstract class BaseAffiliateProductCodeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAffiliateProductCodeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'AffiliateProductCode', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AffiliateProductCodeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AffiliateProductCodeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AffiliateProductCodeQuery) {
			return $criteria;
		}
		$query = new AffiliateProductCodeQuery();
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
	 * @return    AffiliateProductCode|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AffiliateProductCodePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AffiliateProductCodePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AffiliateProductCodePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AffiliateProductCodePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the affiliateId column
	 * 
	 * @param     int|array $affiliateid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByAffiliateid($affiliateid = null, $comparison = null)
	{
		if (is_array($affiliateid)) {
			$useMinMax = false;
			if (isset($affiliateid['min'])) {
				$this->addUsingAlias(AffiliateProductCodePeer::AFFILIATEID, $affiliateid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affiliateid['max'])) {
				$this->addUsingAlias(AffiliateProductCodePeer::AFFILIATEID, $affiliateid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AffiliateProductCodePeer::AFFILIATEID, $affiliateid, $comparison);
	}

	/**
	 * Filter the query on the productCode column
	 * 
	 * @param     string $productcode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByProductcode($productcode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($productcode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $productcode)) {
				$productcode = str_replace('*', '%', $productcode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliateProductCodePeer::PRODUCTCODE, $productcode, $comparison);
	}

	/**
	 * Filter the query on the productCodeAffiliate column
	 * 
	 * @param     string $productcodeaffiliate The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByProductcodeaffiliate($productcodeaffiliate = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($productcodeaffiliate)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $productcodeaffiliate)) {
				$productcodeaffiliate = str_replace('*', '%', $productcodeaffiliate);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AffiliateProductCodePeer::PRODUCTCODEAFFILIATE, $productcodeaffiliate, $comparison);
	}

	/**
	 * Filter the query by a related Affiliate object
	 *
	 * @param     Affiliate $affiliate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function filterByAffiliate($affiliate, $comparison = null)
	{
		return $this
			->addUsingAlias(AffiliateProductCodePeer::AFFILIATEID, $affiliate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Affiliate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
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
	 * @param     AffiliateProductCode $affiliateProductCode Object to remove from the list of results
	 *
	 * @return    AffiliateProductCodeQuery The current query, for fluid interface
	 */
	public function prune($affiliateProductCode = null)
	{
		if ($affiliateProductCode) {
			$this->addUsingAlias(AffiliateProductCodePeer::ID, $affiliateProductCode->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAffiliateProductCodeQuery
