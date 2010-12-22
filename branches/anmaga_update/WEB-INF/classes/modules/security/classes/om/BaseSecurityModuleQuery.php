<?php


/**
 * Base class that represents a query for the 'security_module' table.
 *
 * Modulos del sistema
 *
 * @method     SecurityModuleQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     SecurityModuleQuery orderByAccess($order = Criteria::ASC) Order by the access column
 * @method     SecurityModuleQuery orderByAccessaffiliateuser($order = Criteria::ASC) Order by the accessAffiliateUser column
 *
 * @method     SecurityModuleQuery groupByModule() Group by the module column
 * @method     SecurityModuleQuery groupByAccess() Group by the access column
 * @method     SecurityModuleQuery groupByAccessaffiliateuser() Group by the accessAffiliateUser column
 *
 * @method     SecurityModuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SecurityModuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SecurityModuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SecurityModule findOne(PropelPDO $con = null) Return the first SecurityModule matching the query
 * @method     SecurityModule findOneOrCreate(PropelPDO $con = null) Return the first SecurityModule matching the query, or a new SecurityModule object populated from the query conditions when no match is found
 *
 * @method     SecurityModule findOneByModule(string $module) Return the first SecurityModule filtered by the module column
 * @method     SecurityModule findOneByAccess(int $access) Return the first SecurityModule filtered by the access column
 * @method     SecurityModule findOneByAccessaffiliateuser(int $accessAffiliateUser) Return the first SecurityModule filtered by the accessAffiliateUser column
 *
 * @method     array findByModule(string $module) Return SecurityModule objects filtered by the module column
 * @method     array findByAccess(int $access) Return SecurityModule objects filtered by the access column
 * @method     array findByAccessaffiliateuser(int $accessAffiliateUser) Return SecurityModule objects filtered by the accessAffiliateUser column
 *
 * @package    propel.generator.security.classes.om
 */
abstract class BaseSecurityModuleQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSecurityModuleQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'SecurityModule', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SecurityModuleQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SecurityModuleQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SecurityModuleQuery) {
			return $criteria;
		}
		$query = new SecurityModuleQuery();
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
	 * @return    SecurityModule|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SecurityModulePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SecurityModulePeer::MODULE, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SecurityModulePeer::MODULE, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the module column
	 * 
	 * @param     string $module The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function filterByModule($module = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($module)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $module)) {
				$module = str_replace('*', '%', $module);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SecurityModulePeer::MODULE, $module, $comparison);
	}

	/**
	 * Filter the query on the access column
	 * 
	 * @param     int|array $access The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function filterByAccess($access = null, $comparison = null)
	{
		if (is_array($access)) {
			$useMinMax = false;
			if (isset($access['min'])) {
				$this->addUsingAlias(SecurityModulePeer::ACCESS, $access['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($access['max'])) {
				$this->addUsingAlias(SecurityModulePeer::ACCESS, $access['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SecurityModulePeer::ACCESS, $access, $comparison);
	}

	/**
	 * Filter the query on the accessAffiliateUser column
	 * 
	 * @param     int|array $accessaffiliateuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function filterByAccessaffiliateuser($accessaffiliateuser = null, $comparison = null)
	{
		if (is_array($accessaffiliateuser)) {
			$useMinMax = false;
			if (isset($accessaffiliateuser['min'])) {
				$this->addUsingAlias(SecurityModulePeer::ACCESSAFFILIATEUSER, $accessaffiliateuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($accessaffiliateuser['max'])) {
				$this->addUsingAlias(SecurityModulePeer::ACCESSAFFILIATEUSER, $accessaffiliateuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SecurityModulePeer::ACCESSAFFILIATEUSER, $accessaffiliateuser, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SecurityModule $securityModule Object to remove from the list of results
	 *
	 * @return    SecurityModuleQuery The current query, for fluid interface
	 */
	public function prune($securityModule = null)
	{
		if ($securityModule) {
			$this->addUsingAlias(SecurityModulePeer::MODULE, $securityModule->getModule(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSecurityModuleQuery
