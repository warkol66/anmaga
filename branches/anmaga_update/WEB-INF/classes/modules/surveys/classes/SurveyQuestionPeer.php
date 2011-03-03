<?php

// The parent class
require_once 'surveys/classes/om/BaseSurveyQuestionPeer.php';

// The object class
require_once 'SurveyQuestion.php';

/**
 * Class SurveyQuestionPeer
 *
 * @package Survey
 */
class SurveyQuestionPeer extends BaseSurveyQuestionPeer {

  /**
  * Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
  *
  * @return int Cantidad de filas por pagina
  */
  function getRowsPerPage() {
    global $system;
    return $system["config"]["system"]["rowsPerPage"];
  }
  
  /**
  * Crea un survey question nuevo.
  *
  * @param array $params Array asociativo con los atributos del objeto
  * @return boolean true si se creo correctamente, false sino
  */  
  function create($params) {
    try {
      $surveyquestionObj = new SurveyQuestion();
      foreach ($params as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($surveyquestionObj,$setMethod) ) {          
          if (!empty($value) || $value == "0")
            $surveyquestionObj->$setMethod($value);
          else
            $surveyquestionObj->$setMethod(null);
        }
      }
      $surveyquestionObj->save();
      return $surveyquestionObj;
    } catch (Exception $exp) {

    }         
  }

	/**
	* Crea una pregunta del tipo Yes / No
	* @param array $params Array asociativo con los atributos del objeto
	* @return boolean true si se creo correctamente, false sino
	*/
	public function createYesNoQuestion($params) {
	
		//no soporta opciones multiples
		$params['surveyQuestion']['multipleAnswer'] = 0;
	
		$question = SurveyQuestionPeer::create($params);
		if (!$question)
			return false;
		
		require_once('SurveyAnswerOption.php');
	
		try {
			//opcion NO
			$answerOption = new SurveyAnswerOption();
			$answerOption->setQuestionId($question->getId());
			$answerOption->setAnswer('No');
			$answerOption->save();
		
			//opcion SI
			$answerOption = new SurveyAnswerOption();
			$answerOption->setQuestionId($question->getId());
			$answerOption->setAnswer('Si');
			$answerOption->save();

		} catch (PropelException $exp) {
			return false;
		}
	
		return $question;
	
	}

  /**
  * Actualiza la informacion de un survey question.
  *
  * @param array $params Array asociativo con los atributos del objeto
  * @return boolean true si se actualizo la informacion correctamente, false sino
  */  
  function update($params) {
    try {
      $surveyquestionObj = SurveyQuestionPeer::retrieveByPK($params["id"]);    
      if (empty($surveyquestionObj))
        throw new Exception();
      foreach ($params as $key => $value) {
        $setMethod = "set".$key;
        if ( method_exists($surveyquestionObj,$setMethod) ) {          
          if (!empty($value) || $value == "0")
            $surveyquestionObj->$setMethod($value);
          else
            $surveyquestionObj->$setMethod(null);
        }
      }
      $surveyquestionObj->save();
      return true;
    } catch (Exception $exp) {
      return false;
    }         
  }    

	/**
	* Elimina un survey question a partir de los valores de la clave.
	*
  * @param int $id id del surveyquestion
	*	@return boolean true si se elimino correctamente el surveyquestion, false sino
	*/
  function delete($id) {
  	$surveyquestionObj = SurveyQuestionPeer::retrieveByPK($id);
    $surveyquestionObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un survey question.
  *
  * @param int $id id del surveyquestion
  * @return array Informacion del surveyquestion
  */
  function get($id) {
		$surveyquestionObj = SurveyQuestionPeer::retrieveByPK($id);
    return $surveyquestionObj;
  }

  /**
  * Obtiene todos los survey questions.
	*
	*	@return array Informacion sobre todos los surveyquestions
  */
	function getAll() {
		$cond = new Criteria();
		$alls = SurveyQuestionPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los survey questions paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los surveyquestions
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	SurveyQuestionPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
    $cond = new Criteria();     
    $pager = new PropelPager($cond,"SurveyQuestionPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

}
?>
