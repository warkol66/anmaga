<?php

// The parent class
require_once 'surveys/classes/om/BaseSurveyAnswerOption.php';

require_once 'SurveyAnswerOptionPeer.php';


/**
 * Skeleton subclass for representing a row from the 'surveys_answerOption' table.
 *
 * Opciones de respuesta para una determinada Pregunta
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package Survey
 */
class SurveyAnswerOption extends BaseSurveyAnswerOption {

	/**
	 * Initializes internal state of SurveyAnswerOption object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	/**
	 * Devuelve el total de respuesta que se han acumulado para la pregunta
	 * para la opcion especifica.
	 * @return integer
	 */
	public function getAnswerCount() {

		require_once('SurveyAnswerPeer.php');

		$criteria = new Criteria();
		$question = $this->getSurveyQuestion();
		$criteria->add(SurveyAnswerPeer::QUESTIONID,$question->getId());
		$criteria->add(SurveyAnswerPeer::ANSWEROPTIONID,$this->getId());
		return SurveyAnswerPeer::doCount($criteria);

	}
} // SurveyAnswerOption
