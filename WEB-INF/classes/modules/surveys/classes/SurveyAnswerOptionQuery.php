<?php


/**
 * Skeleton subclass for performing query and update operations on the 'surveys_answerOption' table.
 *
 * Opciones de respuesta para una determinada Pregunta
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.surveys.classes
 */
class SurveyAnswerOptionQuery extends BaseSurveyAnswerOptionQuery {

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
		$query = new self('application', 'SurveyAnswerOption', $modelAlias);
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // SurveyAnswerOptionQuery
