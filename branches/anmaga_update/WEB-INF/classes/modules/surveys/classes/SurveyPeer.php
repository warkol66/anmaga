<?php

/**
 * Class SurveyPeer
 *
 * @package Survey
 */
class SurveyPeer extends BaseSurveyPeer {

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
	* Crea un survey nuevo.
	*
	* @param array $params Array asociativo con los atributos del objeto
	* @return boolean true si se creo correctamente, false sino
	*/  
	function create($params) {
		try {
			$surveyObj = new Survey();
			foreach ($params as $key => $value) {
				$setMethod = "set".$key;
				if ( method_exists($surveyObj,$setMethod) ) {          
					if (!empty($value) || $value == "0")
						$surveyObj->$setMethod($value);
					else
						$surveyObj->$setMethod(null);
				}
			}
		$surveyObj->setCreatedAt(date("Y-m-d h:m:s"));
			$surveyObj->save();
			return $surveyObj;
		} catch (Exception $exp) {
			return false;
		}         
	}  
	
	/**
	* Actualiza la informacion de un survey.
	*
	* @param array $params Array asociativo con los atributos del objeto
	* @return boolean true si se actualizo la informacion correctamente, false sino
	*/  
	function update($params) {
		try {
			$surveyObj = SurveyPeer::retrieveByPK($params["id"]);    
			if (empty($surveyObj))
				throw new Exception();
			foreach ($params as $key => $value) {
				$setMethod = "set".$key;
				if ( method_exists($surveyObj,$setMethod) ) {          
					if (!empty($value) || $value == "0")
						$surveyObj->$setMethod($value);
					else
						$surveyObj->$setMethod(null);
				}
			}

			$surveyObj->save();
			return true;
		} catch (Exception $exp) {
	var_dump($exp);
			return false;
		}         
	}    

	/**
	* Elimina un survey a partir de los valores de la clave.
	*
	* @param int $id id del survey
	*	@return boolean true si se elimino correctamente el survey, false sino
	*/
	function delete($id) {
		$surveyObj = SurveyPeer::retrieveByPK($id);
		$surveyObj->delete();
		return true;
	}

	/**
	* Obtiene la informacion de un survey.
	*
	* @param int $id id del survey
	* @return array Informacion del survey
	*/
	function get($id) {
		$surveyObj = SurveyPeer::retrieveByPK($id);
		return $surveyObj;
	}

	/**
	* Obtiene todos los surveys.
	*
	*	@return array Informacion sobre todos los surveys
	*/
	function getAll() {
		$cond = new Criteria();
		$alls = SurveyPeer::doSelect($cond);
		return $alls;
	}
	
	/**
	* Obtiene todos los surveys paginados.
	*
	* @param int $page [optional] Numero de pagina actual
	* @param int $perPage [optional] Cantidad de filas por pagina
	*	@return array Informacion sobre todos los surveys
	*/
	function getAllPaginated($page=1,$perPage=-1) {  
		if ($perPage == -1)
			$perPage = 	SurveyPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		$cond = new Criteria();     
		$pager = new PropelPager($cond,"SurveyPeer", "doSelect",$page,$perPage);
		return $pager;
	 }    

	/**
	 * Obtiene la ultima encuesta
	 * @return array Informacion del survey
	 */
	public function getLastActive() {
		
		$criteria = new Criteria();

		$criteria->add(SurveyPeer::ISPUBLIC,1);
		$criteria->add(SurveyPeer::ARTICLEID,NULL,Criteria::EQUAL);
		$criteria->add(SurveyPeer::STARTDATE, date('Y-m-d'), Criteria::LESS_EQUAL);
		$criteria->addDescendingOrderByColumn(SurveyPeer::ENDDATE);

		$surveyObj = SurveyPeer::doSelectOne($criteria);
		return $surveyObj;
		
		
	}


}

