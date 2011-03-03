<?php

/**
 * Class SurveyAnswerPeer
 *
 * @package Survey
 */
class SurveyAnswerPeer extends BaseSurveyAnswerPeer {

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
	* Crea un survey answer nuevo.
	*
	* @param array $params Array asociativo con los atributos del objeto
	* @return boolean true si se creo correctamente, false sino
	*/
	function create($params) {
		try {
			$surveyanswerObj = new SurveyAnswer();
			foreach ($params as $key => $value) {
				$setMethod = "set".$key;
				if ( method_exists($surveyanswerObj,$setMethod) ) {
					if (!empty($value) || $value == "0")
						$surveyanswerObj->$setMethod($value);
					else
						$surveyanswerObj->$setMethod(null);
				}
			}
			$surveyanswerObj->setCreatedAt(date("Y-m-d h:m:s"));
			$surveyanswerObj->save();
			return true;
		} catch (Exception $exp) {
			return false;
		}
	}

	/**
	* Actualiza la informacion de un survey answer.
	*
	* @param array $params Array asociativo con los atributos del objeto
	* @return boolean true si se actualizo la informacion correctamente, false sino
	*/
	function update($params) {
		try {
			$surveyanswerObj = SurveyAnswerPeer::retrieveByPK($params["id"]);
			if (empty($surveyanswerObj))
				throw new Exception();
			foreach ($params as $key => $value) {
				$setMethod = "set".$key;
				if ( method_exists($surveyanswerObj,$setMethod) ) {
					if (!empty($value) || $value == "0")
						$surveyanswerObj->$setMethod($value);
					else
						$surveyanswerObj->$setMethod(null);
				}
			}
			$surveyanswerObj->save();
			return true;
		} catch (Exception $exp) {
			return false;
		}
	}

	/**
	* Elimina un survey answer a partir de los valores de la clave.
	*
	* @param int $id id del surveyanswer
	*	@return boolean true si se elimino correctamente el surveyanswer, false sino
	*/
	function delete($id) {
		$surveyanswerObj = SurveyAnswerPeer::retrieveByPK($id);
		$surveyanswerObj->delete();
		return true;
	}

	/**
	* Obtiene la informacion de un survey answer.
	*
	* @param int $id id del surveyanswer
	* @return array Informacion del surveyanswer
	*/
	function get($id) {
		$surveyanswerObj = SurveyAnswerPeer::retrieveByPK($id);
		return $surveyanswerObj;
	}

	/**
	* Obtiene todos los survey answers.
	*
	*	@return array Informacion sobre todos los surveyanswers
	*/
	function getAll() {
		$cond = new Criteria();
		$alls = SurveyAnswerPeer::doSelect($cond);
		return $alls;
	}

	/**
	* Obtiene todos los survey answers paginados.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de filas por pagina
	*	@return array Informacion sobre todos los surveyanswers
	*/
	function getAllPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	SurveyAnswerPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		$cond = new Criteria();
		$pager = new PropelPager($cond,"SurveyAnswerPeer", "doSelect",$page,$perPage);
		return $pager;
	 }

}
