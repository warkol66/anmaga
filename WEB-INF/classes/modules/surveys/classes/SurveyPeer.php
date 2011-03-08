<?php

/**
 * Class SurveyPeer
 *
 * @package Survey
 */
class SurveyPeer extends BaseSurveyPeer {
	
	/**
	* Elimina un survey a partir de los valores de la clave.
	*
	* @param int $id id del survey
	*	@return boolean true si se elimino correctamente el survey, false sino
	*/
	function delete($id) {
		return SurveyQuery::create()->filterByPrimaryKey($id)->delete() > 0;
	}

	/**
	* Obtiene la informacion de un survey.
	*
	* @param int $id id del survey
	* @return array Informacion del survey
	*/
	function get($id) {
		return SurveyQuery::create()->findPk($id);
	}

	/**
	* Obtiene todos los surveys.
	*
	*	@return array Informacion sobre todos los surveys
	*/
	function getAll() {
		return SurveyQuery::create()->find();
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
			$perPage = 	Common::getRowsPerPage();
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
		return SurveyQuery::create()->lastActive();
	}
}
