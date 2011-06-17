<?php


/**
 * Base class that represents a query for the 'surveys_survey' table.
 *
 * Encuestas
 *
 * @method     SurveyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SurveyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SurveyQuery orderByIspublic($order = Criteria::ASC) Order by the isPublic column
 * @method     SurveyQuery orderByStartdate($order = Criteria::ASC) Order by the startDate column
 * @method     SurveyQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method     SurveyQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     SurveyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SurveyQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     SurveyQuery groupById() Group by the id column
 * @method     SurveyQuery groupByName() Group by the name column
 * @method     SurveyQuery groupByIspublic() Group by the isPublic column
 * @method     SurveyQuery groupByStartdate() Group by the startDate column
 * @method     SurveyQuery groupByEnddate() Group by the endDate column
 * @method     SurveyQuery groupByDeletedAt() Group by the deleted_at column
 * @method     SurveyQuery groupByCreatedAt() Group by the created_at column
 * @method     SurveyQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     SurveyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SurveyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SurveyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SurveyQuery leftJoinSurveyQuestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyQuery rightJoinSurveyQuestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyQuery innerJoinSurveyQuestion($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyQuestion relation
 *
 * @method     Survey findOne(PropelPDO $con = null) Return the first Survey matching the query
 * @method     Survey findOneOrCreate(PropelPDO $con = null) Return the first Survey matching the query, or a new Survey object populated from the query conditions when no match is found
 *
 * @method     Survey findOneById(int $id) Return the first Survey filtered by the id column
 * @method     Survey findOneByName(string $name) Return the first Survey filtered by the name column
 * @method     Survey findOneByIspublic(boolean $isPublic) Return the first Survey filtered by the isPublic column
 * @method     Survey findOneByStartdate(string $startDate) Return the first Survey filtered by the startDate column
 * @method     Survey findOneByEnddate(string $endDate) Return the first Survey filtered by the endDate column
 * @method     Survey findOneByDeletedAt(string $deleted_at) Return the first Survey filtered by the deleted_at column
 * @method     Survey findOneByCreatedAt(string $created_at) Return the first Survey filtered by the created_at column
 * @method     Survey findOneByUpdatedAt(string $updated_at) Return the first Survey filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Survey objects filtered by the id column
 * @method     array findByName(string $name) Return Survey objects filtered by the name column
 * @method     array findByIspublic(boolean $isPublic) Return Survey objects filtered by the isPublic column
 * @method     array findByStartdate(string $startDate) Return Survey objects filtered by the startDate column
 * @method     array findByEnddate(string $endDate) Return Survey objects filtered by the endDate column
 * @method     array findByDeletedAt(string $deleted_at) Return Survey objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return Survey objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Survey objects filtered by the updated_at column
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseSurveyQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Survey', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SurveyQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SurveyQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SurveyQuery) {
			return $criteria;
		}
		$query = new SurveyQuery();
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
	 * @return    Survey|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SurveyPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SurveyPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SurveyPeer::ID, $keys, Criteria::IN);
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
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SurveyPeer::ID, $id, $comparison);
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
	 * @return    SurveyQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SurveyPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the isPublic column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIspublic(true); // WHERE isPublic = true
	 * $query->filterByIspublic('yes'); // WHERE isPublic = true
	 * </code>
	 *
	 * @param     boolean|string $ispublic The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByIspublic($ispublic = null, $comparison = null)
	{
		if (is_string($ispublic)) {
			$isPublic = in_array(strtolower($ispublic), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SurveyPeer::ISPUBLIC, $ispublic, $comparison);
	}

	/**
	 * Filter the query on the startDate column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStartdate('2011-03-14'); // WHERE startDate = '2011-03-14'
	 * $query->filterByStartdate('now'); // WHERE startDate = '2011-03-14'
	 * $query->filterByStartdate(array('max' => 'yesterday')); // WHERE startDate > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $startdate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByStartdate($startdate = null, $comparison = null)
	{
		if (is_array($startdate)) {
			$useMinMax = false;
			if (isset($startdate['min'])) {
				$this->addUsingAlias(SurveyPeer::STARTDATE, $startdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startdate['max'])) {
				$this->addUsingAlias(SurveyPeer::STARTDATE, $startdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyPeer::STARTDATE, $startdate, $comparison);
	}

	/**
	 * Filter the query on the endDate column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEnddate('2011-03-14'); // WHERE endDate = '2011-03-14'
	 * $query->filterByEnddate('now'); // WHERE endDate = '2011-03-14'
	 * $query->filterByEnddate(array('max' => 'yesterday')); // WHERE endDate > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $enddate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByEnddate($enddate = null, $comparison = null)
	{
		if (is_array($enddate)) {
			$useMinMax = false;
			if (isset($enddate['min'])) {
				$this->addUsingAlias(SurveyPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enddate['max'])) {
				$this->addUsingAlias(SurveyPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyPeer::ENDDATE, $enddate, $comparison);
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
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(SurveyPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(SurveyPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyPeer::DELETED_AT, $deletedAt, $comparison);
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
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SurveyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SurveyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyPeer::CREATED_AT, $createdAt, $comparison);
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
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SurveyPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SurveyPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related SurveyQuestion object
	 *
	 * @param     SurveyQuestion $surveyQuestion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function filterBySurveyQuestion($surveyQuestion, $comparison = null)
	{
		if ($surveyQuestion instanceof SurveyQuestion) {
			return $this
				->addUsingAlias(SurveyPeer::ID, $surveyQuestion->getSurveyid(), $comparison);
		} elseif ($surveyQuestion instanceof PropelCollection) {
			return $this
				->useSurveyQuestionQuery()
					->filterByPrimaryKeys($surveyQuestion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySurveyQuestion() only accepts arguments of type SurveyQuestion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyQuestion relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function joinSurveyQuestion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SurveyQuestion');
		
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
			$this->addJoinObject($join, 'SurveyQuestion');
		}
		
		return $this;
	}

	/**
	 * Use the SurveyQuestion relation SurveyQuestion object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuestionQuery A secondary query class using the current class as primary query
	 */
	public function useSurveyQuestionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSurveyQuestion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SurveyQuestion', 'SurveyQuestionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Survey $survey Object to remove from the list of results
	 *
	 * @return    SurveyQuery The current query, for fluid interface
	 */
	public function prune($survey = null)
	{
		if ($survey) {
			$this->addUsingAlias(SurveyPeer::ID, $survey->getId(), Criteria::NOT_EQUAL);
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
		if (SurveyQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(SurveyPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			SurveyPeer::enableSoftDelete();
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
		if (SurveyQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
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
	 * @see SurveyQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return SurveyQuery The current query, for fluid interface
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
		return SurveyPeer::doForceDelete($this, $con);
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
		return SurveyPeer::doForceDeleteAll($con);}
	
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
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SurveyPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SurveyPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SurveyPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SurveyPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SurveyPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SurveyQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SurveyPeer::CREATED_AT);
	}

} // BaseSurveyQuery
