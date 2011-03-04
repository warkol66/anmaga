<?php


/**
 * Base class that represents a query for the 'surveys_answerOption' table.
 *
 * Opciones de respuesta para una determinada Pregunta
 *
 * @method     SurveyAnswerOptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SurveyAnswerOptionQuery orderByQuestionid($order = Criteria::ASC) Order by the questionId column
 * @method     SurveyAnswerOptionQuery orderByAnswer($order = Criteria::ASC) Order by the answer column
 *
 * @method     SurveyAnswerOptionQuery groupById() Group by the id column
 * @method     SurveyAnswerOptionQuery groupByQuestionid() Group by the questionId column
 * @method     SurveyAnswerOptionQuery groupByAnswer() Group by the answer column
 *
 * @method     SurveyAnswerOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SurveyAnswerOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SurveyAnswerOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SurveyAnswerOptionQuery leftJoinSurveyQuestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyAnswerOptionQuery rightJoinSurveyQuestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyQuestion relation
 * @method     SurveyAnswerOptionQuery innerJoinSurveyQuestion($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyQuestion relation
 *
 * @method     SurveyAnswerOptionQuery leftJoinSurveyAnswer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SurveyAnswer relation
 * @method     SurveyAnswerOptionQuery rightJoinSurveyAnswer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SurveyAnswer relation
 * @method     SurveyAnswerOptionQuery innerJoinSurveyAnswer($relationAlias = null) Adds a INNER JOIN clause to the query using the SurveyAnswer relation
 *
 * @method     SurveyAnswerOption findOne(PropelPDO $con = null) Return the first SurveyAnswerOption matching the query
 * @method     SurveyAnswerOption findOneOrCreate(PropelPDO $con = null) Return the first SurveyAnswerOption matching the query, or a new SurveyAnswerOption object populated from the query conditions when no match is found
 *
 * @method     SurveyAnswerOption findOneById(int $id) Return the first SurveyAnswerOption filtered by the id column
 * @method     SurveyAnswerOption findOneByQuestionid(int $questionId) Return the first SurveyAnswerOption filtered by the questionId column
 * @method     SurveyAnswerOption findOneByAnswer(string $answer) Return the first SurveyAnswerOption filtered by the answer column
 *
 * @method     array findById(int $id) Return SurveyAnswerOption objects filtered by the id column
 * @method     array findByQuestionid(int $questionId) Return SurveyAnswerOption objects filtered by the questionId column
 * @method     array findByAnswer(string $answer) Return SurveyAnswerOption objects filtered by the answer column
 *
 * @package    propel.generator.surveys.classes.om
 */
abstract class BaseSurveyAnswerOptionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSurveyAnswerOptionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'anmaga', $modelName = 'SurveyAnswerOption', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SurveyAnswerOptionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SurveyAnswerOptionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SurveyAnswerOptionQuery) {
			return $criteria;
		}
		$query = new SurveyAnswerOptionQuery();
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
	 * @return    SurveyAnswerOption|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SurveyAnswerOptionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SurveyAnswerOptionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SurveyAnswerOptionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SurveyAnswerOptionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the questionId column
	 * 
	 * @param     int|array $questionid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterByQuestionid($questionid = null, $comparison = null)
	{
		if (is_array($questionid)) {
			$useMinMax = false;
			if (isset($questionid['min'])) {
				$this->addUsingAlias(SurveyAnswerOptionPeer::QUESTIONID, $questionid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($questionid['max'])) {
				$this->addUsingAlias(SurveyAnswerOptionPeer::QUESTIONID, $questionid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SurveyAnswerOptionPeer::QUESTIONID, $questionid, $comparison);
	}

	/**
	 * Filter the query on the answer column
	 * 
	 * @param     string $answer The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterByAnswer($answer = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($answer)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $answer)) {
				$answer = str_replace('*', '%', $answer);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SurveyAnswerOptionPeer::ANSWER, $answer, $comparison);
	}

	/**
	 * Filter the query by a related SurveyQuestion object
	 *
	 * @param     SurveyQuestion $surveyQuestion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterBySurveyQuestion($surveyQuestion, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyAnswerOptionPeer::QUESTIONID, $surveyQuestion->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyQuestion relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
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
	 * Filter the query by a related SurveyAnswer object
	 *
	 * @param     SurveyAnswer $surveyAnswer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function filterBySurveyAnswer($surveyAnswer, $comparison = null)
	{
		return $this
			->addUsingAlias(SurveyAnswerOptionPeer::ID, $surveyAnswer->getAnsweroptionid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SurveyAnswer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
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
	 * @param     SurveyAnswerOption $surveyAnswerOption Object to remove from the list of results
	 *
	 * @return    SurveyAnswerOptionQuery The current query, for fluid interface
	 */
	public function prune($surveyAnswerOption = null)
	{
		if ($surveyAnswerOption) {
			$this->addUsingAlias(SurveyAnswerOptionPeer::ID, $surveyAnswerOption->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSurveyAnswerOptionQuery
