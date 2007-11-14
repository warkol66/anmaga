<?php

// The parent class
require_once 'om/BaseBranchPeer.php';

// The object class
include_once 'Branch.php';

/**
 * Class BranchPeer
 *
 * @package Branch
 */
class BranchPeer extends BaseBranchPeer {

  private $searchAffiliateId;
  
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
  * Crea un branch nuevo.
  *
  * @param int $affiliateId affiliateId del branch
  * @param int $number number del branch
  * @param string $name name del branch
  * @param string $phone phone del branch
  * @param string $contact contact del branch
  * @param string $contactEmail contactEmail del branch
  * @param string $memo memo del branch
  * @param string $code code del branch
  * @return boolean true si se creo el branch correctamente, false sino
	*/
	function create($affiliateId,$number,$name,$phone,$contact,$contactEmail,$memo,$code) {
    $branchObj = new Branch();
    $branchObj->setaffiliateId($affiliateId);
		$branchObj->setnumber($number);
		$branchObj->setname($name);
		$branchObj->setphone($phone);
		$branchObj->setcontact($contact);
		$branchObj->setcontactEmail($contactEmail);
		$branchObj->setmemo($memo);
		$branchObj->setCode($code);
		$branchObj->save();
		return true;
	}

  /**
  * Actualiza la informacion de un branch.
  *
  * @param int $id id del branch
  * @param int $affiliateId affiliateId del branch
  * @param int $number number del branch
  * @param string $name name del branch
  * @param string $phone phone del branch
  * @param string $contact contact del branch
  * @param string $contactEmail contactEmail del branch
  * @param string $memo memo del branch
  * @param string $code code del branch
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$affiliateId,$number,$name,$phone,$contact,$contactEmail,$memo,$code) {
  	$branchObj = BranchPeer::retrieveByPK($id);
    $branchObj->setaffiliateId($affiliateId);
    $branchObj->setnumber($number);
    $branchObj->setname($name);
    $branchObj->setphone($phone);
    $branchObj->setcontact($contact);
    $branchObj->setcontactEmail($contactEmail);
    $branchObj->setmemo($memo);    
		$branchObj->setCode($code);    
    $branchObj->save();
		return true;
  }

	/**
	* Elimina un branch a partir de los valores de la clave.
	*
  * @param int $id id del branch
	*	@return boolean true si se elimino correctamente el branch, false sino
	*/
  function delete($id) {
  	$branchObj = BranchPeer::retrieveByPK($id);
    $branchObj->delete();
		return true;
  }

  /**
  * Obtiene la informacion de un branch.
  *
  * @param int $id id del branch
  * @return array Informacion del branch
  */
  function get($id) {
		$branchObj = BranchPeer::retrieveByPK($id);
    return $branchObj;
  }

  /**
  * Obtiene todos los branchs.
	*
	*	@return array Informacion sobre todos los branchs
  */
	function getAll() {
		$cond = new Criteria();
		$alls = BranchPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene un branch a partir de su number.
  *
  * @param int $number Numero de branch  
  * @param int $affiliateId Id del affiliate  
  *	@return Branch Branch
  */
  function getByNumber($number,$affiliateId) {
    $cond = new Criteria();
    $cond->add(BranchPeer::NUMBER, $number);    
    $cond->add(BranchPeer::AFFILIATEID, $affiliateId);    
    $alls = BranchPeer::doSelect($cond);
    return $alls[0];
  }  
  
  /**
  * Obtiene todos los branchs de un affiliate.
  *
  * @param int $affiliateId Id del affiliate
  *	@return array Informacion sobre todos los branchs
  */
  function getAllByAffiliateId($affiliateId) {
    $cond = new Criteria();
    $cond->add(BranchPeer::AFFILIATEID, $affiliateId);
    $alls = BranchPeer::doSelect($cond);
    return $alls;
  }  
  
  function setSearchAffiliateId($affiliateId) {
    $this->searchAffiliateId = $affiliateId;
  }  

  /**
  * Obtiene una busqueda paginada.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  * @return Pager Pager con informacion sobre los branchs
  */
  function getSearchPaginated($page=1,$perPage=-1) {
    if ($perPage == -1)
      $perPage = 	BranchPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
    $cond = new Criteria();
    if (!empty($this->searchAffiliateId))
      $cond->add(BranchPeer::AFFILIATEID, $this->searchAffiliateId);
       
    $pager = new PropelPager($cond,"BranchPeer","doSelect",$page,$perPage);
    return $pager;
  }  
  
}
