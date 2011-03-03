<?php

// The parent class
require_once 'surveys/classes/om/BaseSurvey.php';

require_once 'SurveyQuestionPeer.php';


/**
 * Skeleton subclass for representing a row from the 'surveys_survey' table.
 *
 * Encuestas
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package Survey
 */
class Survey extends BaseSurvey {

	/**
	 * Initializes internal state of Survey object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	/**
	 * Indica si una encuesta es publica o no.
	 * @return boolean
	 */
	public function isPublic() {
		return ($this->getIsPublic() == 1);
	}
	
	/**
	 * Indica si a la fecha de hoy, la encuesta esta vencida o no, de su periodo
	 * @return boolean
	 */
	public function hasExpired() {
		$now = strtotime(date("Y-m-d h:m:s"));

		if (($now >= strtotime($this->getStartDate())) && ($now <= strtotime($this->getEndDate())))
			return false;
		return true;
	}

} // Survey
