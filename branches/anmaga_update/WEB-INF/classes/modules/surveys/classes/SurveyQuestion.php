<?php

// The parent class
require_once 'surveys/classes/om/BaseSurveyQuestion.php';

require_once 'SurveyQuestionPeer.php';

require_once 'SurveyAnswerOptionPeer.php';


/**
 * Skeleton subclass for representing a row from the 'surveys_question' table.
 *
 * Pregunta a Encuesta
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package Survey
 */
class SurveyQuestion extends BaseSurveyQuestion {

	/**
	 * Initializes internal state of SurveyQuestion object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	/**
	 * Crea una nueva opcion de respuesta dentro de una pregunta
	 * @param string texto de la opcion de respuesta
	 * @return SurveyAnswerOption instance or false on failure 
	 */
	public function addAnswerOption($answerText) {
	
		require_once('SurveyAnswerOption.php');

		try {		
			$option = new SurveyAnswerOption();
			$option->setSurveyQuestion($this);
			$option->setAnswer($answerText);
			$option->save();
			return $option;
		} catch (PropelException $exp) {
			return false;
		}
		
	}

	/**
	 * Indica si una pregunta soporta multiples respuestas
	 * @return boolean
	 */
	public function acceptsMultipleAnswers() {
		return ($this->getMultipleAnswer() == 1);
	}
	
	/**
	 * Devuelve el total de respuesta que se han acumulado para la pregunta
	 * sin diferenciar la opcion elegida.
	 * @return integer
	 */
	public function getTotalAnswerCount() {

		require_once('SurveyAnswerPeer.php');

		$criteria = new Criteria();
		$criteria->add(SurveyAnswerPeer::QUESTIONID,$this->getId());
		return SurveyAnswerPeer::doCount($criteria);

	}

} // SurveyQuestion
