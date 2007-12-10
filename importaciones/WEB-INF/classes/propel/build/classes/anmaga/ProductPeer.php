<?php

// The parent class
require_once 'anmaga/om/BaseProductPeer.php';

// The object class
include_once 'anmaga/Product.php';

/**
 * Class ProductPeer
 *
 * @package Product
 */
class ProductPeer extends BaseProductPeer {

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
  * Crea un product nuevo.
  *
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param int $supplierId supplierId del product
  * @param int $active active del product
  * @return boolean true si se creo el product correctamente, false sino
	*/
	function create($code,$name,$description,$supplierId) {
		$productObj = new Product();
		$productObj->setcode($code);
		$productObj->setname($name);
		$productObj->setdescription($description);
		$productObj->setsupplierId($supplierId);
		$productObj->setactive('1');
		$productObj->save();
		return true;
	}

  /**
  * Actualiza la informacion de un product.
  *
  * @param int $id id del product
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param int $supplierId supplierId del product
  * @param int $active active del product
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$code,$name,$description,$supplierId,$active) {
    $productObj = ProductPeer::retrieveByPK($id);
    $productObj->setcode($code);
    $productObj->setname($name);
    $productObj->setdescription($description);
    $productObj->setsupplierId($supplierId);
    $productObj->setactive('1');
    $productObj->save();
		return true;
  }

	/**
	* Elimina un product a partir de los valores de la clave.
	*
  * @param int $id id del product
	*	@return boolean true si se elimino correctamente el product, false sino
	*/
  function delete($id) {
  	$productObj = ProductPeer::retrieveByPK($id);	$productObj->setactive('0');
	try {
		$productObj->save();
	}
	catch (Exception $exp) {
		return false;
	}

	return true;
  }

  /**
  * Obtiene la informacion de un product.
  *
  * @param int $id id del product
  * @return array Informacion del product
  */
  function get($id) {
		$productObj = ProductPeer::retrieveByPK($id);
    return $productObj;
  }

  /**
  * Obtiene todos los products.
	*
	*	@return array Informacion sobre todos los products
  */
	function getAll() {
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE,'1');
		$alls = ProductPeer::doSelect($cond);
		return $alls;
  }
  
  /**
  * Obtiene todos los products paginados.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los products
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	ProductPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
    $cond = new Criteria();     
    $cond->add(ProductPeer::ACTIVE,'1');
    $pager = new PropelPager($cond,"ProductPeer", "doSelect",$page,$perPage);
    return $pager;
   }    

}
?>
