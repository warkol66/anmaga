<?php

// The parent class
require_once 'surveys/classes/om/BaseSurveyAnswerOptionPeer.php';

// The object class
require_once 'SurveyAnswerOption.php';

require_once 'SurveyAnswerPeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'surveys_answerOption' table.
 *
 * Opciones de respuesta para una determinada Pregunta
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package Survey
 */
class SurveyAnswerOptionPeer extends BaseSurveyAnswerOptionPeer {
	
	/**
	* Elimina un SurveyAnswerOption a partir de los valores de la clave.
	*
	* @param int $id id del survey
	*	@return boolean true si se elimino correctamente el survey, false sino
	*/
	public function delete($id) {
		$surveyAnswerPeerObj = SurveyAnswerOptionPeer::retrieveByPK($id);
		$surveyAnswerPeerObj->delete();
		return true;
	}


} // SurveyAnswerOptionPeer
