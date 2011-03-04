<?php


/**
 * Base class that represents a query for the 'surveys_answer' table.
 *
 * Respuesta seleccionada al realizar una encuesta por un usuario publico o registrado
 *
 * @method     SurveyAnswerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SurveyAnswerQuery orderByQuestionid($order = Criteria::ASC) Order by the questionId column
 * @method     SurveyAnswerQuery orderByAnsweroptionid($order = Criteria::ASC) Order by the answerOptionId column
 * @method     SurveyAnswerQuery orderByObjectid($order = Criteria::ASC) Order by the objectId column
 * @method     SurveyAnswerQuery orderByObjecttype($order = Criteria::ASC) Order by the objectType column
 * @method     SurveyAnswerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SurveyAnswerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     SurveyAnswerQuery groupById() Group by the id column
 * @method     SurveyAnswerQuery groupByQuestionid() Group by the questionId column
 * @method     SurveyAnswerQuery groupByAnsweroptionid() Group by the answerOptionId column
 * @method     SurveyAnswerQuery groupByObjectid() Group by the objectId column
 * @method     SurveyAnswerQuery groupByObjecttype() Group by the objectType column
 * @method     SurveyAnswerQuery groupByCreatedAt() Group by the created_at column
 * @method     SurveyAnswerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     SurveyAnswerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SurveyAnswerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SurveyAnswerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SurveyAnswerQuery leftJoinSurveyQuestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyAnswerQuery rightJoinSurveyQuestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyAnswerQuery innerJoinSurveyQuestion($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyQuestion relation
 *
 * @method     SurveyAnswerQuery leftJoinSurveyAnswerOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyAnswerOption relation
 * @method     SurveyAnswerQuery rightJoinSurveyAnswerOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyAnswerOption relation
 * @method     SurveyAnswerQuery innerJoinSurveyAnswerOption($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyAnswerOption relation
 *
 * @method     SurveyAnswer findOne(PropelPDO $con = null) Return the first SurveyAnswer matching the query
 * @method     SurveyAnswer findOneOrCreate(PropelPDO $con = null) Return the first SurveyAnswer matching the query, or a new SurveyAnswer object populated from the query conditions when no match is found
 *
 * @method     SurveyAnswer findOneById(int $id) Return the first SurveyAnswer filtered by the id column
 * @method     SurveyAnswer findOneByQuestionid(int $questionId) Return the first SurveyAnswer filtered by the questionId column
 * @method     SurveyAnswer findOneByAnsweroptionid(int $answerOptionId) Return the first SurveyAnswer filtered by the answerOptionId column
 * @method     SurveyAnswer findOneByObjectid(int $objectId) Return the first SurveyAnswer filtered by the objectId column
 * @method     SurveyAnswer findOneByObjecttype(string $objectType) Return the first SurveyAnswer filtered by the objectType column
 * @method     SurveyAnswer findOneByCreatedAt(string $created_at) Return the first SurveyAnswer filtered by the created_at column
 * @method     SurveyAnswer findOneByUpdatedAt(string $updated_at) Return the first SurveyAnswer filtered by the updated_at column
 *
 * @method     array findById(int $id) Return SurveyAnswer objects filtered by the id column
 * @method     array findByQuestionid(int $questionId) Return SurveyAnswer objects filtered by the questionId column
 * @method     array findByAnsweroptionid(int $answerOptionId) Return SurveyAnswer objects filtered by the answerOptionId column
 * @method     array findByObjectid(int $objectId) Return SurveyAnswer objects filtered by the objectId column
 * @method     array findByObjecttype(string $objectType) Return SurveyAnswer objects filtered by the objectType column
 * @method     array findByCreatedAt(string $created_at) Return SurveyAnswer objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SurveyAnswer objects filtered by the updated_at column
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyAnswerQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSurveyAnswerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'SurveyAnswer', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SurveyAnswerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SurveyAnswerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SurveyAnswerQuery) {
			return $criteria;
		}
		$query = new SurveyAnswerQuery();
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
	 * @return    SurveyAnswer|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SurveyAnswerPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SurveyAnswerPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SurveyAnswerPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SurveyAnswerPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the questionId column
	 * 
	 * @param     int|array $questionid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByQuestionid($questionid = null, $comparison = null)
	{
		if (is_array($questionid)) {
			$useMinMax = false;
			if (isset($questionid['min'])) {
				$this->addUsingAlias(SurveyAnswerPeer::QUESTIONID, $questionid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($questionid['max'])) {
				$this->addUsingAlias(SurveyAnswerPeer::QUESTIONID, $questionid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::QUESTIONID, $questionid, $comparison);
	}

	/**
	 * Filter the query on the answerOptionId column
	 * 
	 * @param     int|array $answeroptionid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByAnsweroptionid($answeroptionid = null, $comparison = null)
	{
		if (is_array($answeroptionid)) {
			$useMinMax = false;
			if (isset($answeroptionid['min'])) {
				$this->addUsingAlias(SurveyAnswerPeer::ANSWEROPTIONID, $answeroptionid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($answeroptionid['max'])) {
				$this->addUsingAlias(SurveyAnswerPeer::ANSWEROPTIONID, $answeroptionid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::ANSWEROPTIONID, $answeroptionid, $comparison);
	}

	/**
	 * Filter the query on the objectId column
	 * 
	 * @param     int|array $objectid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByObjectid($objectid = null, $comparison = null)
	{
		if (is_array($objectid)) {
			$useMinMax = false;
			if (isset($objectid['min'])) {
				$this->addUsingAlias(SurveyAnswerPeer::OBJECTID, $objectid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectid['max'])) {
				$this->addUsingAlias(SurveyAnswerPeer::OBJECTID, $objectid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::OBJECTID, $objectid, $comparison);
	}

	/**
	 * Filter the query on the objectType column
	 * 
	 * @param     string $objecttype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByObjecttype($objecttype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objecttype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objecttype)) {
				$objecttype = str_replace('*', '%', $objecttype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::OBJECTTYPE, $objecttype, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SurveyAnswerPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SurveyAnswerPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SurveyAnswerPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SurveyAnswerPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related SurveyQuestion object
	 *
	 * @param     SurveyQuestion $surveyQuestion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterBySurveyQuestion($surveyQuestion, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyAnswerPeer::QUESTIONID, $surveyQuestion->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyQuestion relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
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
	 * Filter the query by a related SurveyAnswerOption object
	 *
	 * @param     SurveyAnswerOption $surveyAnswerOption  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function filterBySurveyAnswerOption($surveyAnswerOption, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyAnswerPeer::ANSWEROPTIONID, $surveyAnswerOption->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyAnswerOption relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function joinSurveyAnswerOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SurveyAnswerOption');
		
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
			$this->addJoinObject($join, 'SurveyAnswerOption');
		}
		
		return $this;
	}

	/**
	 * Use the SurveyAnswerOption relation SurveyAnswerOption object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerOptionQuery A secondary query class using the current class as primary query
	 */
	public function useSurveyAnswerOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSurveyAnswerOption($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SurveyAnswerOption', 'SurveyAnswerOptionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SurveyAnswer $surveyAnswer Object to remove from the list of results
	 *
	 * @return    SurveyAnswerQuery The current query, for fluid interface
	 */
	public function prune($surveyAnswer = null)
	{
		if ($surveyAnswer) {
			$this->addUsingAlias(SurveyAnswerPeer::ID, $surveyAnswer->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SurveyAnswerPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SurveyAnswerPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SurveyAnswerPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SurveyAnswerPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SurveyAnswerPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SurveyAnswerQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SurveyAnswerPeer::CREATED_AT);
	}

} // BaseSurveyAnswerQuery
