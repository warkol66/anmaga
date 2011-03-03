<?php


/**
 * Skeleton subclass for performing query and update operations on the 'surveys_answer' table.
 *
 * Respuesta seleccionada al realizar una encuesta por un usuario publico o registrado
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.surveys.classes
 */
class SurveyAnswerQuery extends BaseSurveyAnswerQuery {

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
		$query = new self('application', 'SurveyAnswer', $modelAlias);
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // SurveyAnswerQuery
