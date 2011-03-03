<?php

// The parent class
require_once 'surveys/classes/om/BaseSurveyAnswer.php';

require_once 'SurveyQuestionPeer.php';


/**
 * Skeleton subclass for representing a row from the 'surveys_answer' table.
 *
 * Respuesta seleccionada al realizar una encuesta por un usuario publico o registrado
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package Survey
 */
class SurveyAnswer extends BaseSurveyAnswer {

	/**
	 * Initializes internal state of SurveyAnswer object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // SurveyAnswer
