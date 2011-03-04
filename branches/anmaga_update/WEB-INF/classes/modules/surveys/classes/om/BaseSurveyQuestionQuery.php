<?php


/**
 * Base class that represents a query for the 'surveys_question' table.
 *
 * Pregunta a Encuesta
 *
 * @method     SurveyQuestionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SurveyQuestionQuery orderBySurveyid($order = Criteria::ASC) Order by the surveyId column
 * @method     SurveyQuestionQuery orderByQuestion($order = Criteria::ASC) Order by the question column
 * @method     SurveyQuestionQuery orderByMultipleanswer($order = Criteria::ASC) Order by the multipleAnswer column
 *
 * @method     SurveyQuestionQuery groupById() Group by the id column
 * @method     SurveyQuestionQuery groupBySurveyid() Group by the surveyId column
 * @method     SurveyQuestionQuery groupByQuestion() Group by the question column
 * @method     SurveyQuestionQuery groupByMultipleanswer() Group by the multipleAnswer column
 *
 * @method     SurveyQuestionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SurveyQuestionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SurveyQuestionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SurveyQuestionQuery leftJoinSurvey($relationAlias = null) Adds a LEFT JOIN clause to the query using the Survey relation
 * @method     SurveyQuestionQuery rightJoinSurvey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Survey relation
 * @method     SurveyQuestionQuery innerJoinSurvey($relationAlias = null) Adds a INNER JOIN clause to the query using the Survey relation
 *
 * @method     SurveyQuestionQuery leftJoinSurveyAnswerOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyAnswerOption relation
 * @method     SurveyQuestionQuery rightJoinSurveyAnswerOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyAnswerOption relation
 * @method     SurveyQuestionQuery innerJoinSurveyAnswerOption($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyAnswerOption relation
 *
 * @method     SurveyQuestionQuery leftJoinSurveyAnswer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyAnswer relation
 * @method     SurveyQuestionQuery rightJoinSurveyAnswer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyAnswer relation
 * @method     SurveyQuestionQuery innerJoinSurveyAnswer($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyAnswer relation
 *
 * @method     SurveyQuestion findOne(PropelPDO $con = null) Return the first SurveyQuestion matching the query
 * @method     SurveyQuestion findOneOrCreate(PropelPDO $con = null) Return the first SurveyQuestion matching the query, or a new SurveyQuestion object populated from the query conditions when no match is found
 *
 * @method     SurveyQuestion findOneById(int $id) Return the first SurveyQuestion filtered by the id column
 * @method     SurveyQuestion findOneBySurveyid(int $surveyId) Return the first SurveyQuestion filtered by the surveyId column
 * @method     SurveyQuestion findOneByQuestion(string $question) Return the first SurveyQuestion filtered by the question column
 * @method     SurveyQuestion findOneByMultipleanswer(boolean $multipleAnswer) Return the first SurveyQuestion filtered by the multipleAnswer column
 *
 * @method     array findById(int $id) Return SurveyQuestion objects filtered by the id column
 * @method     array findBySurveyid(int $surveyId) Return SurveyQuestion objects filtered by the surveyId column
 * @method     array findByQuestion(string $question) Return SurveyQuestion objects filtered by the question column
 * @method     array findByMultipleanswer(boolean $multipleAnswer) Return SurveyQuestion objects filtered by the multipleAnswer column
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyQuestionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSurveyQuestionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'SurveyQuestion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SurveyQuestionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SurveyQuestionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SurveyQuestionQuery) {
			return $criteria;
		}
		$query = new SurveyQuestionQuery();
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
	 * @return    SurveyQuestion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SurveyQuestionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SurveyQuestionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SurveyQuestionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SurveyQuestionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the surveyId column
	 * 
	 * @param     int|array $surveyid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterBySurveyid($surveyid = null, $comparison = null)
	{
		if (is_array($surveyid)) {
			$useMinMax = false;
			if (isset($surveyid['min'])) {
				$this->addUsingAlias(SurveyQuestionPeer::SURVEYID, $surveyid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($surveyid['max'])) {
				$this->addUsingAlias(SurveyQuestionPeer::SURVEYID, $surveyid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyQuestionPeer::SURVEYID, $surveyid, $comparison);
	}

	/**
	 * Filter the query on the question column
	 * 
	 * @param     string $question The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterByQuestion($question = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($question)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $question)) {
				$question = str_replace('*', '%', $question);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SurveyQuestionPeer::QUESTION, $question, $comparison);
	}

	/**
	 * Filter the query on the multipleAnswer column
	 * 
	 * @param     boolean|string $multipleanswer The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterByMultipleanswer($multipleanswer = null, $comparison = null)
	{
		if (is_string($multipleanswer)) {
			$multipleAnswer = in_array(strtolower($multipleanswer), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SurveyQuestionPeer::MULTIPLEANSWER, $multipleanswer, $comparison);
	}

	/**
	 * Filter the query by a related Survey object
	 *
	 * @param     Survey $survey  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterBySurvey($survey, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyQuestionPeer::SURVEYID, $survey->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Survey relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function joinSurvey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Survey');
		
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
			$this->addJoinObject($join, 'Survey');
		}
		
		return $this;
	}

	/**
	 * Use the Survey relation Survey object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuery A secondary query class using the current class as primary query
	 */
	public function useSurveyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSurvey($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Survey', 'SurveyQuery');
	}

	/**
	 * Filter the query by a related SurveyAnswerOption object
	 *
	 * @param     SurveyAnswerOption $surveyAnswerOption  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterBySurveyAnswerOption($surveyAnswerOption, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyQuestionPeer::ID, $surveyAnswerOption->getQuestionid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyAnswerOption relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
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
	 * Filter the query by a related SurveyAnswer object
	 *
	 * @param     SurveyAnswer $surveyAnswer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function filterBySurveyAnswer($surveyAnswer, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyQuestionPeer::ID, $surveyAnswer->getQuestionid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyAnswer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function joinSurveyAnswer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SurveyAnswer');
		
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
			$this->addJoinObject($join, 'SurveyAnswer');
		}
		
		return $this;
	}

	/**
	 * Use the SurveyAnswer relation SurveyAnswer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerQuery A secondary query class using the current class as primary query
	 */
	public function useSurveyAnswerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSurveyAnswer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SurveyAnswer', 'SurveyAnswerQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SurveyQuestion $surveyQuestion Object to remove from the list of results
	 *
	 * @return    SurveyQuestionQuery The current query, for fluid interface
	 */
	public function prune($surveyQuestion = null)
	{
		if ($surveyQuestion) {
			$this->addUsingAlias(SurveyQuestionPeer::ID, $surveyQuestion->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSurveyQuestionQuery
