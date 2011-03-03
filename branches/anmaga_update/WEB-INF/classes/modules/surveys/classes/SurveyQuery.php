<?php


/**
 * Skeleton subclass for performing query and update operations on the 'surveys_survey' table.
 *
 * Encuestas
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.surveys.classes
 */
class SurveyQuery extends BaseSurveyQuery {

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
		$query = new self('application', 'Survey', $modelAlias);
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

} // SurveyQuery
